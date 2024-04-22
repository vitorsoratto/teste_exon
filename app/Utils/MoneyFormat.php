<?php

namespace App\Utils;

class MoneyFormat
{
    public static function formatBRL($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
