<?php


namespace app\widgets;
use yii\base\Widget;

class MyWidget extends Widget
{
    public $comments;

    public function run()
    {
        return $this->render('my', ['comments' => $this->comments]);
    }
}