<?php
namespace News;
use GuzzleHttp\Client;


class ApiServiss
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => 'C:/CA certificates/cacert.pem',
        ]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchNewsByCountry($country): array
    {
        $apiKey = $_ENV['API_KEY'];
        if ($country) {
            $url = "https://newsapi.org/v2/top-headlines?country=$country&category=business&apiKey=$apiKey";
            $response = $this->client->get($url);

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true);

                if (!empty($data['articles'])) {
                    return $data['articles'];
                }
            }
        }
        return [];
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchNewsByDateAndPost($article, $fromDate, $toDate): array
    {

        if (empty($article) && ($fromDate || $toDate)) {
            $url = "https://newsapi.org/v2/everything?q=from=$fromDate&to=$toDate&sortBy=popularity&apiKey=45c28deca60947fd9ec4d8db2b2c4a81";
        } else {
            $url = "https://newsapi.org/v2/everything?q=$article&from=$fromDate&to=$toDate&sortBy=popularity&apiKey=45c28deca60947fd9ec4d8db2b2c4a81";
        }

        $response = $this->client->get($url);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);

            if (!empty($data['articles'])) {
                return $data['articles'];
            }
        }

        return [];
    }
}