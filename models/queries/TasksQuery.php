<?php


namespace app\models\queries;


use app\models\tables\Tasks;
use yii\db\ActiveQuery;
use yii\db\Query;

class TasksQuery extends ActiveQuery
{
    public function init()
    {

    }

    public function getDeadline()
    {
        return Tasks::find()
            ->where("DATEDIFF(NOW(), tasks.deadline) <= 1")
            ->with('responsible')
            ->all();
    }
}