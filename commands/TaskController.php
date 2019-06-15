<?php


namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\console\Controller;
use yii\helpers\Console;

class TaskController extends Controller
{

    public $message = 'hello';

    /**
     * jhdxjkjkxjjxkjkhjk
     */
    public function actionTest($id)
    {
        if($user = Users::findOne($id)){
             ;
            $this->stdout("{$this->message}, {$user->login}!!!!", Console::BG_BLUE);
            return static::EXIT_CODE_NORMAL;
        }
        return static::EXIT_CODE_ERROR;
    }

    public function actionHandler()
    {
        $count = 100;
        Console::startProgress(1, $count);
        for($i = 1; $i< $count; $i++){
            sleep(1);
            Console::updateProgress($i, $count);
        }
        Console::endProgress();
    }

    /**
     * Send mail to creator
     */
    public function actionSend()
    {
        $model = Tasks::getDeadlineIsOver();
        if (!empty($model)) {
            foreach ($model as $key) {
                $user = $key->creator;
                \Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    ->setFrom('Yii-admin@test.ru')
                    ->setSubject('New Task')
                    ->setTextBody("Dear {$user->login}, task {$key->id} it's time to start doing it! 
                     It was created {$key->create_time},and today {$key->deadline}!
                    Running for work")
                    ->send();
            }
        }
        return static::EXIT_CODE_ERROR;
    }

    public function options($actionId)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return [
          'm' => 'message'
        ];
    }


}