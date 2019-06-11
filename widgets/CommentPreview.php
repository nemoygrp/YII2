<?php


namespace app\widgets;


use app\models\tables\Comments;
use app\models\tables\Tasks;
use yii\base\Widget;

class CommentPreview extends Widget
{
    public $model;
    public $linked = false;

    public function run()
    {
        if(is_a($this->model, Comments::class)){
            return $this->render('comment_preview', [
                'model' => $this->model,
                'linked' => $this->linked
            ]);
        }
       throw new \Exception("Модель должна быть класса таск!");
    }
}