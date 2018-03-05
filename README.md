Laravel 5 CUIT CBU Validators for Argentina
============================================

# Installation

To install this package include it in your `composer.json`

```
composer require cardumen/cuit-cbu-validator:>=v2.1
```

Add the Service Provider to the `provider` array in your `config/app.php`

```
Cardumen\LaravelCuitCbuValidator\LaravelCuitCbuValidator::class
```

# Using

Now you have a validator cuit and cbu

```
		$rules = [
            'cbu'=>['required',new \App\Rules\Cbu()],
            'cuit'=>['required',new \App\Rules\Cuit()],
            ];
```



# Contributors

- Andrés Teszkiewicz - [Github](https://github.com/ateszki)

# Company

- Cardumen         - [Github](https://github.com/desarrollo-cooperativo)

# License

This project is open-sourced software licensed under the [MIT 
license](https://opensource.org/licenses/MIT)
