<?php


namespace app\commands;


use app\models\tables\Tasks;
use yii\console\Controller;

/**
 * Class TaskController
 * @package app\commands
 */
class TaskController extends Controller
{
    public function actionDeadline()
    {
        /** @var Tasks[] $tasks */
        $tasks = Tasks::findDeadline();

        foreach ($tasks as $task){
            $responsible = $task->responsible;
            \Yii::$app->mailer->compose()
                ->setTo($responsible->email)
                ->setFrom('Yii-admin@test.ru')
                ->setSubject('Deadline')
                ->setTextBody("Dear {$responsible->login}, new task {$task->id} created")
                ->send();
        }
    }


}