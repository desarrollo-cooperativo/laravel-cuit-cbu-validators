<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cbu implements Rule
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
        $cbu = $value;
        
        if (!preg_match('/[0-9]{22}/', $cbu))
            return false;
        
        $arr = str_split($cbu);
        
        if ($arr[7] <> self::getDigitoVerificador($arr, 0, 6))
            return false;
        
        if ($arr[21] <> self::getDigitoVerificador($arr, 8, 20))
            return false;
        
        return true;
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
