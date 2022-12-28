<?php

namespace App\Domain\CheckView\Templates;

use App\Domain\CheckView\CreateViewBase;
use App\Domain\Enums\CheckViewType;

class Checkbox1View extends CreateViewBase
{
    public static function type(): int
    {
        return CheckViewType::CHECKBOX1;
    }

    public function displayView(): string
    {
        $html = [];
        $html[] = '<section>';
        $html[] = '<h3 class="bl_question_ttl_lv1">問3. aaaaaaaaaaaaaaaaaaaaaaaaa</h3>';
        $html[] = '<div class="bl_answer_box">';
        $html[] = "<p>ccc</p>";
        $html[] = '</div>';
        $html[] = '</section>';

        return implode('', $html);
    }
}