<?php

namespace app\models;

use app\helpers\Helper;

if (!session_id()) {
    session_start();
}

class User
{
    const PARTICIPANTS_TABLE = 'participants';
    private mixed $username;
    private $db;
    private int $user_id;

    /**
     * @var bool
     */
    private bool $is_authorized;
    /**
     * @var mixed
     */
    private mixed $password;
    /**
     * @var mixed
     */
    private mixed $remember;

    public function __construct(
        private readonly Helper $helper
    ) {
        $this->db = $this->helper->connectDb();
        $this->is_authorized = $this->isAuthorized();
        $this->username = empty($_REQUEST["user"]["email"]) ? '' : $_REQUEST["user"]["email"];
        $this->password = empty($_REQUEST["user"]["password"]) ? '' : $_REQUEST["user"]["password"];
        $this->remember = true; //!empty($_REQUEST["user"]["remember"]);
        if (!empty($this->username) && !empty($this->password)) {
            $this->authorize();
        }
    }

    /**
     * @return array
     */
    public function getUserProjects(): array
    {
        $userProjects = [];
        $table = self::PARTICIPANTS_TABLE;
        $linkTable = "prodject_to_participant";
        $query = "SELECT p.name FROM $table p LEFT JOIN $linkTable ptp ON p.id = ptp.patrticipants_id";
        try {
            $sth = $this->db->prepare($query);
            $res = $sth->execute();
            $users = $sth->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $PDOException) {
            $PDOException->getMessage();
        }

        foreach ($users as $user) {
            if (empty($userProjects[$user["name"]])) {
                $userProjects[$user["name"]] = 1;
            } else {
                $userProjects[$user["name"]]++;
            }
        }
        arsort($userProjects);

        return $userProjects;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        if (!empty($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
            $this->unsetCookie('sid');
        }
    }

    /**
     * @param $name
     * @return void
     */
    public function unsetCookie($name): void
    {
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', -1, '/');
        }
    }

    /**
     * @param bool $remember
     * @param bool $http_only
     * @param int $days
     * @return void
     */
    private function saveSession(bool $remember = false, bool $http_only = true, int $days = 7): void
    {
        $_SESSION["user_id"] = $this->user_id;

        if ($remember) {
            // Save session id in cookies
            $sid = session_id();

            $expire = time() + $days * 24 * 3600;
            $domain = ""; // default domain
            $path = "/";

            setcookie("sid", $sid, $expire, $path, $domain, false, $http_only);
        }
    }

    /**
     * @param $password
     * @param $salt
     * @return array
     */
    private function passwordHash($password, $salt = null): array
    {
        $salt || $salt = uniqid();
        $hash = md5(md5($password . md5(sha1($salt))));

        $i = 0;
        do {
            $hash = md5(md5(sha1($hash)));
            $i++;
        } while ($i < 10);

        return ['hash' => $hash, 'salt' => $salt];
    }

    /**
     * @param $username
     * @return mixed
     */
    private function getSalt($username): mixed
    {
        $table = self::PARTICIPANTS_TABLE;
        $query = "SELECT salt FROM $table WHERE email = :email";
        $sth = $this->db->prepare($query);
        $sth->execute(
            [
                ":email" => $username
            ]
        );

        $row = $sth->fetchObject();
        if (!$row) {
            $result = false;
        } else {
            $result = $row->salt;
        }

        return $result;
    }

    /**
     * @return void
     */
    private function authorize(): void
    {
        $table = self::PARTICIPANTS_TABLE;
        $query = "SELECT id, name FROM $table WHERE email = :username AND password_hash = :password";

        $sth = $this->db->prepare($query);
        $salt = $this->getSalt($this->username);

        if (!$salt) {
            return;
        }

        $hashes = $this->passwordHash($this->password, $salt);
        $res = $sth->execute(
            [
                ":username" => $this->username,
                ":password" => $hashes['hash'],
            ]
        );
        $user = $sth->fetchObject();

        if (!$user) {
            $this->is_authorized = false;
        } else {
            $this->is_authorized = true;
            $this->user_id = $user->id;
            $this->saveSession($this->remember);
        }

    }

    /**
     * @return bool
     */
    public function isAuthorized(): bool
    {
        if (!empty($_SESSION["user_id"])) {
            return (bool)$_SESSION["user_id"];
        }

        return false;
    }

//    /**
//     * @return $this|void
//     */
//    public function connectDb()
//    {
//        $config = $this->getConfig();
//        try {
//            $this->db = new \PDO(
//                "mysql:host={$config["db"]["host"]};dbname={$config["db"]["db_name"]}",
//                $config["db"]["user"],
//                $config["db"]["pass"]
//            );
//        } catch (\pdoexception $e) {
//            die("database error: " . $e->getmessage());
//        }
//        $this->db->query("SET names {$config["db"]["charset"]}");
//
//        return $this;
//    }
//
//    private function getConfig(): array
//    {
//        $dir = str_replace('models', '', __DIR__);
//
//        return include $dir . 'etc/env.php';
//    }

    /**
     * @param $username
     * @param $password
     * @return void
     */
    public function create($username, $password): void
    {
        $table = self::PARTICIPANTS_TABLE;
        $query = "INSERT INTO $table (login, name, email, password_hash, salt) 
                               VALUES(:login, :name, :email, :password, :salt)";

        $hashes = $this->passwordHash($password);
        $sth = $this->db->prepare($query);

        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                [
                    ':login' => $username,
                    ':name' => $username,
                    ':email' => $username,
                    ':password' => $hashes['hash'],
                    ':salt' => $hashes['salt']
                ]
            );
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollback();
            die("Database error: " . $e->getMessage());
        }

        if (!$result) {
            $info = $sth->errorInfo();
            $errorMessage = sprintf("Database error %d %s", $info[1], $info[2]);
            die($errorMessage);
        }
    }

}