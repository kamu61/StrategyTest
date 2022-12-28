<?php

namespace App\Domain\Enums;

/**
 * 実態はただの定数クラス
 * @see ENUM::USER                  1
 * @see ENUM::USER()                ユーザー
 * @see ENUM::value(ENUM::USER)     ユーザー
 */
abstract class Enum
{
    protected static $list = [];
    protected $value;

    public function __construct($key)
    {
        $this->value = static::$list[$key];
    }

    public static function value($value)
    {
        return static::$list[$value];
    }

    public static function all()
    {
        return static::$list;
    }

    public static function __callStatic($label, $args)
    {
        $class = get_called_class();
        $const = constant("$class::$label");
        return new $class($const);
    }

    public function __toString()
    {
        return static::$list[$this->value];
    }
}
