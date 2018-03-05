<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cuit implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
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
        $verificador = 11 - ($acumulado % 11);
        if ($verificador == 11) $verificador = 0;
        if ($verificador == 10) $verificador = 9;
        return (end($digitos) == $verificador);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El :attribute ingresado no es válido.';
    }
}