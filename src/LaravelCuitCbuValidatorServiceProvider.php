<?php

namespace Cardumen\CuitCbuValidator;

use Validator;
use Illuminate\Support\ServiceProvider;

class CuitCbuValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('cuit', function($attribute, $value, $parameters, $validator) {
            
            $cuit = str_replace("-", "",(string) $value);
            if(strlen($cuit) != 11 ){
                return false;
            }
            $digitos = str_split($cuit);
            $base = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

            $acumulado = 0;
            foreach($base as $k=>$v ){
                $acumulado += $digitos[$k]*$v;
            }
            $verificador = 11 - ($acum % 11);
            if ($verificador == 11) $verificador = 0;
            if ($verificador == 10) $verificador = 9;
            return (end($digitos) == $verificador);
        });

        Validator::extend('cbu', function($attribute, $value, $parameters, $validator) {
            $cbu = $value;
            if (!preg_match('/[0-9]{22}/', $cbu))
                return false;
            
            $arr = str_split($cbu);
            if ($arr[7] <> self::getDigitoVerificador($arr, 0, 6))
                return false;
            if ($arr[21] <> self::getDigitoVerificador($arr, 8, 20))
                return false;
            
            return true;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private static function getDigitoVerificador($numero, $pos_inicial, $pos_final)
    {
        $ponderador = array(3,1,7,9);
        $suma = 0;
        $j = 0;
        for ($i = $pos_final; $i >= $pos_inicial; $i--)
        {
            $suma = $suma + ($numero[$i] * $ponderador[$j % 4]);
            $j++;
        }
        return (10 - $suma % 10) % 10;
    }
}
