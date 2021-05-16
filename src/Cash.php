<?php

namespace Merqueo;

class Cash
{
    private static $cash = [];

    public static function loadCash(array $array)
    {
        self::$cash = $array;
    }

    public static function emptyCash(): array
    {
        return self::$cash = [];
    }

    public static function enterCash(int $denomination, int $number): void
    {
        self::$cash[$denomination] = $number;
    }

    public static function all(): array
    {
        return self::$cash;
    }

    public static function getCash(int $denomination): int
    {
        return self::$cash[$denomination];
    }
}
