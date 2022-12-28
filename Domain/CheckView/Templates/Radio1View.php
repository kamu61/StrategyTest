<?php

namespace App\Domain\CheckView\Templates;

use App\Domain\CheckView\CreateViewBase;
use App\Domain\Enums\CheckViewType;

/**
 * 各個別の具体的な実装
 */
class Radio1View extends CreateViewBase
{
    public static function type(): int
    {
        // マジックナンバーを書かない、定数化して返す
        // return 1; NG
        return CheckViewType::RADIO1;
    }

    public function displayView(): string
    {
        // これも対応表など用意で抽象化可能
        $questionTitle = '問1. xxxxxは、いつからはじまるものと思いますか。';
        $answer = $this->values['radio'] ?? 'aaaaaaaaaaaaaaaaa';

        $html = [];
        $html[] = '<section>';
        $html[] = '<h3 class="bl_question_ttl_lv1">' . $questionTitle . '</h3>';
        $html[] = '<div class="bl_answer_box">';
        $html[] = '<p>' . $answer . '</p>';
        $html[] = '</div>';
        $html[] = '</section>';

        return implode('', $html);
    }
}