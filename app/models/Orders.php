<?php

namespace app\models;

class Orders
{

    /**
     * @param $queryUrl
     * @return bool|string
     */
    private function sendRestApiRequest($queryUrl): bool|string
    {
        $entryUrl = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/projects/REST/index.php";
        $partsQueryUrl = parse_url($queryUrl);
        $pathParams = explode('/', $partsQueryUrl['path']);

        $postFields = [
            'id' => $pathParams[6],
            'method' => $pathParams[4],
            'entity' => ucfirst($pathParams[3])
        ];
        $queryBody = http_build_query($postFields);
        $entryUrl .= '?' . $queryBody;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $entryUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

    public function getOrderStatus($orderId): string
    {
        $queryUrl = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/projects/REST/order/get_status/id/$orderId";
        $status = $this->sendRestApiRequest($queryUrl);

        return $status;
    }
}