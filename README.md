# Coinbase Pro API Laravel Library

This is the client library for the [Coinbase Pro API][1]. We provide an intuitive, stable interface to integrate Coinbase Pro into your Laravel project.

## Installation

Install the library using Composer. Please read the [Composer Documentation](https://getcomposer.org/doc/01-basic-usage.md) if you are unfamiliar with Composer or dependency managers in general.

```json
composer require gbanina/coinbase-pro
```

Once installed, if you are not using automatic package discovery, then you need to register the `Gbanina\CoinbasePro\CoinbaseProServiceProvider` in your `config/app.php`.

        'providers' => [
                Gbanina\CoinbasePro\CoinbaseProServiceProvider::class,
            ],

You can also optionally alias our facade:

```php
'CoinbasePro' => Gbanina\CoinbasePro\CoinbasePro::class,
```

Copy the package config to your local config with the publish command:

    php artisan vendor:publish --provider="Gbanina\CoinbasePro\CoinbaseProServiceProvider"

## Authentication

You need to add the following to your `.env` file:

    COINBASEPRO_KEY=<your_key_here>
    COINBASEPRO_SECRET=<your_secret_here>
    COINBASEPRO_PASSPHRASE=<your_passphrase_here>


## Usage

This is not intended to provide complete documentation of the API. For more detail, please refer to the [official documentation](https://docs.pro.coinbase.com).

### Orders

List your current open orders. Only open or un-settled orders are returned. As soon as an order is no longer open and settled, it will no longer appear in the default request.

```php
$service = new CoinbasePro();
$orders = $service->getOrders();
```

### Accounts

Get a list of trading accounts.

```php
$service = new CoinbasePro();
$accounts = $service->getAccounts();
```

### Products

Get a list of available currency pairs for trading.

```php
$service = new CoinbasePro();
$products = $service->getProducts();
```

### Currencies

List known currencies.

```php
$service = new CoinbasePro();
$currencies = $service->getCurrencies();
```
------------




## Contributing

Feel free to submit pull requests, fix any bugs, or add missing functions.

[1]: https://docs.pro.coinbase.com/
[2]: https://packagist.org/packages/coinbase/coinbase
[3]: https://developers.coinbase.com/docs/wallet/coinbase-connect#two-factor-authentication
[4]: https://developers.coinbase.com/api/v2#pagination
[5]: https://packagist.org/search/?q=oauth2%20client
[6]: https://packagist.org/packages/league/oauth2-client
