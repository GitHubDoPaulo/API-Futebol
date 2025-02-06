<?php
class FootballAPI {
    private $apiKey = "550e65ed2d0b4b7b91a6aea45542b88e";
    private $apiUrl = "https://api.football-data.org/v4/";

    public function fetchFromAPI($endpoint) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->apiUrl . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ["X-Auth-Token: $this->apiKey"],
            CURLOPT_FAILONERROR => true,
            CURLOPT_TIMEOUT => 10,
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);
        curl_close($curl);

        if ($httpCode === 200) {
            return json_decode($response, true);
        } else {
            return ["error" => "Erro na requisição à API (HTTP $httpCode). Detalhes: $error"];
        }
    }
}
?>
