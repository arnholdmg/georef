<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Coordinate implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $invalid = false;
        $coord = explode(',', $value);

        if(count($coord) != 2){
            $invalid = true;
        } else if(!is_numeric($coord[0]) || $coord[0] < -90 || $coord[0] > 90){
            $invalid = true;
        } else if(!is_numeric($coord[1]) || $coord[1] < -180 || $coord[1] > 180){
            $invalid = true;
        }
        
        if($invalid){
            $fail('Coordenada deve seguir o formato "latitude,longitude".');
        }
    }
}
