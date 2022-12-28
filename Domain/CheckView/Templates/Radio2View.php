<?php

namespace App\Domain\CheckView\Templates;

use App\Domain\CheckView\CreateViewBase;
use App\Domain\Enums\CheckViewType;

class Radio2View extends CreateViewBase
{
    public static function type(): int
    {
        return CheckViewType::RADIO2;
    }

    public function displayView(): string
    {
        $answer = $this->values[0] ?? 'testtesttest';

        $html = <<<EOF
<section class="">
  <h3 class="bl_question_ttl_lv1">問2. xxxxは、いつからはじまるものと思いますか。</h3>
  <div class="bl_answer_box">
    <p>$answer</p>
  </div>
</section>
EOF;
        return $html;
    }
}