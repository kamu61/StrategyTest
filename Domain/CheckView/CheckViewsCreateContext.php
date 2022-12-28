<?php

namespace App\Domain\CheckView;

use App\Domain\Enums\CheckViewType;
use App\Models\Survey;

/**
 * Controllerからこれを呼び出す
 * 
 * StrategyパターンとFactoryパターン使用
 */
class CheckViewsCreateContext
{
    /** @var CreateViewInterface[] */
    private $views;

    public function __construct(Survey $survey)
    {
        $this->views = [];
        $this->setViews($survey);
    }

    public function setViews(Survey $survey)
    {
        // 回答内容を全て１つの配列に格納
        $inputs = array_merge(
            $survey->q1 ?? [],
            $survey->q2 ?? [],
            $survey->q3 ?? [],
            $survey->q4 ?? [],
            $survey->q5 ?? [],
            $survey->q6 ?? []
        );

        /**
         * ここで条件判定
         * 
         * Viewを呼び出す時にマジックナンバーを書かない,CheckViewTypeから呼び出す
         * どこまで自動でやりたいかでcreateViewメソッドの初期化引数調整（modelを渡すかループ内のvalueを渡すかなど）
         */
        // foreach ($inputs as $key => $value) {
        //     if (xxxxxxxxxxx) {
        //         $type = CheckViewType::RADIO1;
        //     }
        //     $this->views[] = CreateViewFactory::createView($type, $value);
        // }

        $value = [];
        $this->views[] = CreateViewFactory::createView(CheckViewType::RADIO1, $value);
        $this->views[] = CreateViewFactory::createView(CheckViewType::RADIO2, $value);
        $this->views[] = CreateViewFactory::createView(CheckViewType::CHECKBOX1, $value);
    }

    /**
     * ループの中身が膨らむなら判定処理を切り出す
     *
     * 組み合わせを配列で定義してissetやらin_arrayを使えばifを減らせる
     */
    public function getType($key, $value): int
    {
        $type = [
            1 => CheckViewType::RADIO1,
            2 => CheckViewType::RADIO2,
        ];
        if (!isset($type[$key])) {
            throw new \Exception('値が存在しません');
        }
        return $type[$key];
    }

    public function excute()
    {
        foreach ($this->views as $view) {
            echo $view->displayView();
        }
    }
}