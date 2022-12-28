<?php

namespace App\Domain\CheckView;

/**
 * 抽象クラス（基盤クラス）
 * 
 * これを継承して各テンプレートの中身の具体的な実装を行う
 * 継承先のクラスで具体的な処理を書く上で、共通化したい処理があればここに書く
 */
abstract class CreateViewBase implements CreateViewInterface
{
    public $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }
}