<?php

namespace entities;

class Order
{
    /**
     * @var mixed
     */
    private mixed $pdo;

    /**
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $orderId
     * @return array
     */
    public function get_status($orderId): array
    {
        $sql = "SELECT status FROM orders WHERE id=$orderId";
        $stmt = $this->pdo->query($sql);

        return [
            "result" => $stmt->fetchColumn()
        ];
    }
}