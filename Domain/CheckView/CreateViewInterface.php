<?php

namespace App\Domain\CheckView;

/**
 * 共通メソッドを定義
 * 
 * ここに最低限実装させるべきメソッドを定義
 */
interface CreateViewInterface
{
    public static function type(): int;
    public function displayView(): string;
}