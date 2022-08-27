<?php

namespace App\Hash\Util;

class StringGenerator
{
    public function execute (int $len): string
    {
        $chars = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789";

        $size = strlen($chars);
        $string = '';

        for( $x = 0; $x < $len; $x++ ) {
            $caracter = $chars[ rand( 0, $size - 1 ) ];
            $string .= $caracter;
        }

        return $string;
    }
}
