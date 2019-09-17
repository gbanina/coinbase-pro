<?php

namespace Gbanina\CoinbasePro;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CoinbaseProMarket
{


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
