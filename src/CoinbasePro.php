<?php

namespace Gbanina\CoinbasePro;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CoinbasePro
{
    use CoinbaseProOrder;
    use CoinbaseProAccount;
    /**
     * @const string
     */
    const BASE_URI = 'https://api.pro.coinbase.com';
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiSecret;

      /**
     * @var string
     */
    private $apiPashphrase;

    /**
     * @var string
     */
    private $time;

    public function __construct()
    {
        $this->apiKey = config('coinbasepro.key');
        $this->apiSecret = config('coinbasepro.secret');
        $this->apiPashphrase = config('coinbasepro.passphrase');
    }

    /**
     * Create signature.
     *
     * @param string $request_path
     * @param string $body
     * @param int    $timestamp
     * @param string $method
     */

    public function makeRequest(string $method, string $uri, array $query = [])
    {
        $time = time();
        $what = $time.$method.$uri.'';
        $sign = base64_encode(hash_hmac("sha256", $what, base64_decode($this->apiSecret), true));
        $headers = [
            'CB-ACCESS-KEY' => $this->apiKey,
            'CB-ACCESS-SIGN' => $sign,
            'CB-ACCESS-PASSPHRASE' => $this->apiPashphrase,
            'CB-ACCESS-TIMESTAMP' => $time,
        ];

        $client = new Client(['headers' => $headers]);

        try {
            $response = $client->request($method, self::BASE_URI.$uri,[]);
            return json_decode((string) $response->getBody(), true);
        } catch (GuzzleException $e) {
            Log::error($e->getMessage());
            dd($e->getMessage());
        }
    }

    public function getProducts(array $query = [])
    {
        return $this->makeRequest('GET', '/products', $query);
    }

    public function getCurrencies(array $query = [])
    {
        return $this->makeRequest('GET', '/currencies', $query);
    }

    public function getTime(array $query = [])
    {
        return $this->makeRequest('GET', '/time', $query);
    }

}
