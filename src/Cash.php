<?php

namespace Merqueo;

use Exception;

class Cash
{
    private const ALLOWED_DENOMINATIONS = [
        50,
        100,
        200,
        500,
        1000,
        2000,
        3000,
        5000,
        10000,
        20000,
        50000,
        100000
    ];

    private static $cash = [];

    public static function enterCash(int $denomination, int $number = 1): array
    {
        if (! in_array($denomination, self::ALLOWED_DENOMINATIONS)) {
            throw new Exception("The denomination entered on the bill is not valid [$denomination]");
        }

        self::$cash[$denomination] = $number;

        return self::$cash;
    }

    public static function emptyCash(): array
    {
        return self::$cash = [];
    }

    public static function all(): array
    {
        return self::$cash;
    }

    public static function getCash(int $denomination): int
    {
        if (! in_array($denomination, self::ALLOWED_DENOMINATIONS)) {
            throw new Exception("The denomination entered on the bill is not valid [$denomination]");
        }

        return self::$cash[$denomination];
    }

    public static function substractCash(array $bills): void
    {
        foreach ($bills as $denomination => $amount) {
            self::$cash[$denomination] = self::$cash[$denomination] - $amount;
        }
    }
}
