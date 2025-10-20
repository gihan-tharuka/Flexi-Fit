<?php

namespace App\Enums;
use PhpParser\Node\Scalar\String_;

enum Role: int {
    case admin = 1;
    case customer = 2;
    case suppliyer = 3;

    public static function fromValue(int $value): ?self{

        return match ($value){
            1 => self::admin,
            2 => self::customer,
            3 => self::suppliyer,
            default => null,
        };
    }

    public static function fromkey(String $key): ?self{

        return match ($key) {
            'admin' => self::admin,
            'customer' => self::customer,
            'suppliyer'=> self::suppliyer,
            default=>null,
        };
    }
}
