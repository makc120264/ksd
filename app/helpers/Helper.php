<?php

namespace app\helpers;

use PDO;

class Helper
{
    /**
     * @return PDO
     */
    public function connectDb(): PDO
    {
        $config = $this->getConfig();
        try {
            $db = new PDO(
                "mysql:host={$config["db"]["host"]};dbname={$config["db"]["db_name"]}",
                $config["db"]["user"],
                $config["db"]["pass"]
            );
        } catch (\pdoexception $e) {
            die("database error: " . $e->getmessage());
        }
        $db->query("SET names {$config["db"]["charset"]}");

        return $db;
    }

    private function getConfig(): array
    {
        $dir = str_replace('helpers', '', __DIR__);

        return include $dir . 'etc/env.php';
    }

}