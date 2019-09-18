<?php

namespace Gbanina\CoinbasePro;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

trait CoinbaseProAccount
{

    public function getAccounts(array $query = [])
    {
        return $this->makeRequest('GET', '/accounts', $query);
    }

    public function getAccount(string $accountId, array $query = [])
    {
        return $this->makeRequest('GET', '/accounts//'.$accountId, $query);
    }

    public function getAccountHistory(string $accountId, array $query = [])
    {
        return $this->makeRequest('GET', '/accounts//'.$accountId.'/ledger', $query);
    }

    public function getAccountHolds(string $accountId, array $query = [])
    {
        return $this->makeRequest('GET', '/accounts//'.$accountId.'/holds', $query);
    }

}
