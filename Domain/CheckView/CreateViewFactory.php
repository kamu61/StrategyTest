<?php

namespace App\Domain\CheckView;

use App\Domain\CheckView\Templates\Checkbox1View;
use App\Domain\CheckView\Templates\Radio1View;
use App\Domain\CheckView\Templates\Radio2View;

/**
 * Factoryパターン
 * 
 * インスタンス生成の処理のみを行う
 */
class CreateViewFactory
{
    private static array $views = [
        Radio1View::class,
        Radio2View::class,
        Checkbox1View::class,
    ];

    public static function createView(int $checkViewType, array $values): CreateViewInterface
    {
        foreach (self::$views as $view) {
            if ($view::type() === $checkViewType) {
                return new $view($values);
            }
        }
    }
}