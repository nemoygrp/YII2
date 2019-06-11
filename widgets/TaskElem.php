<?php


namespace app\widgets;
use yii\base\Widget;

class TaskElem extends Widget
{
    public $id;
    public $nameTask;
    public $description;
    public $deadline;
    public $comments;

    public function run()
    {

        return $this->render('taskElem', [
            'id' => $this->id,
            'nameTask' => $this->nameTask,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'comments' => $this->comments
        ]);
    }
}