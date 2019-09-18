<?php

namespace Gbanina\CoinbasePro;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

trait CoinbaseProOrder
{

    public function getOrders(array $query = [])
    {
        return $this->makeRequest('GET', '/orders', $query);
    }

    public function getOrder(int $id, array $query = [])
    {
        return $this->makeRequest('GET', '/orders', $query);
    }

    public function newOrderLimit(array $query = [])
    {
        //TODO implement parameters
        return $this->makeRequest('POST', '/orders', $query);
    }

    public function newOrderMarket(array $query = [])
    {
        //TODO implement parameters
        return $this->makeRequest('POST', '/orders', $query);
    }

    public function cancelOrders(array $query = [])
    {
        return $this->makeRequest('DELETE', '/orders', $query);
    }

}
