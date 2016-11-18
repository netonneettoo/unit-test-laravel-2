<?php

namespace App\Domain;

class UnitTestLaravel
{
    const ENDS_WITH_LETTER = [
        'a' => ['red', 'yellow'],
        'o' => ['green', 'blue'],
    ];

    public static function check($name, $color)
    {
        $name = strtolower($name);
        $color = strtolower($color);

        $countLetters = strlen($name);
        if ($countLetters) {
            $nameInArray = in_array($name[$countLetters-1], array_keys(self::ENDS_WITH_LETTER));
            if ($nameInArray) {
                $nameColors = self::ENDS_WITH_LETTER[$name[$countLetters-1]];
                $colorInArray = in_array($color, $nameColors);
                if (! $colorInArray) {
                    return [
                        'result' => $name.' não combina com '.$color,
                        'success' => false
                    ];
                }
            }
        }
        return [
            'result' => $name.' combina com '.$color,
            'success' => true
        ];
    }
}