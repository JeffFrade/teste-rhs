<?php

namespace App\Helpers;

class StringHelper
{
    public static function removeAccents(string $text)
    {
        $text = preg_replace('/(@|#|\$|ª|º|\"|\'|\r|\t|\n)/i', '', $text);
        $text = trim(preg_replace(array(
            '/(á|à|ã|â|ä)/',
            '/(Á|À|Ã|Â|Ä)/',
            '/(é|è|ê|ë)/',
            '/(É|È|Ê|Ë)/',
            '/(í|ì|î|ï)/',
            '/(Í|Ì|Î|Ï)/',
            '/(ó|ò|õ|ô|ö)/',
            '/(Ó|Ò|Õ|Ô|Ö)/',
            '/(ú|ù|û|ü)/',
            '/(Ú|Ù|Û|Ü)/',
            '/(ñ)/',
            '/(Ñ)/',
            '/(ç)/',
            '/(Ç)/'
        ), explode(' ', 'a A e E i I o O u U n N c C'), $text));

        return strtoupper($text);
    }
}
