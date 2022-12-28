<?php

namespace App\Domain\Enums;

final class CheckViewType extends Enum
{
    const RADIO1 = 1;
    const RADIO2 = 2;
    const CHECKBOX1 = 3;

    protected static $list = [
        self::RADIO1        => '～～の時',
        self::RADIO2        => '～～のパターン',
        self::CHECKBOX1     => '～～～のパターン',
    ];
}
