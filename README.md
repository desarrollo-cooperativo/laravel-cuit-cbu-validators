Laravel 5 CUIT CBU Validators for Argentina
============================================

# Installation

To install this package include it in your `composer.json`

```
"require": {
    "cardumen/laravel-cuit-cbu-validator": "v1.0"
}
```

And run `composer update`

Add the Service Provider to the `provider` array in your 
`config/app.php`

```
Cardumen\LaravelCuitCbuValidator\LaravelCuitCbuValidatorServiceProvider::class
```

# Using

Now you have a validator cuit and cbu

```
		$rules = [
            'cbu'=>'required|cbu',
            'cuit'=>'required|cuit',
            ];
```



# Contributors

- Andrés Teszkiewicz - [Github](https://github.com/ateszki)

# Company

- Cardumen         - [Github](https://github.com/desarrollo-cooperativo)

# License

This project is open-sourced software licensed under the [MIT 
license](https://opensource.org/licenses/MIT)
