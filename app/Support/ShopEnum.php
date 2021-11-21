<?php

namespace App\Support;

class ShopEnum
{
    public const ALL    = 0;
    public const NORTH  = 10;
    public const SOUTH  = 20;
    public const WEST   = 30;
    public const EAST   = 40;
    public const MIDDLE = 50;

    public const NAMES = [
        self::ALL    => 'Alle',
        self::NORTH  => 'Nord',
        self::SOUTH  => 'Süd',
        self::WEST   => 'West',
        self::EAST   => 'Ost',
        self::MIDDLE => 'Mitte',
    ];
}
