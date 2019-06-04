<?php

namespace app\controllers;
use app\models\events\EventUserRegistrationComplete;
use app\models\forms\RegisterUserForm;
use app\models\Subscribe;
use app\models\SubscribeBehavior;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\Test;
use yii\base\Event;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;

class TaskController extends Controller
{
   // public $layout = false;

    public function actionTest()
    {
        $model = new RegisterUserForm([
           'login' => 'vasechkin',
           'password' => '123456789',
           'email' => 'vasya@test.ru',
        ]);

      /*  $handler = function(EventUserRegistrationComplete $event){
            (new Subscribe())->attache($event->userId);
        };

        $model->on(
            RegisterUserForm::EVENT_REGISTRATION_COMPLETE,
            $handler
        );
*/

        /*Event::on(
            RegisterUserForm::class,
            RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
            $handler);

       /* $model->on(RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS, 'foo');

        $model->on(
            RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
            [$this, 'handler']
        );

        $model->off(
            RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
            [TaskController::class, 'handler']
        );*/

        $model->register();
exit();
    }

    public static function handler()
    {
   echo "Я обработчик";

        /*Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();*/
    }

    public function actionIndex()
    {
        $model = new Tasks();
        $model->on(Tasks::EVENT_AFTER_INSERT,'handler');
        $dataProvider = new ActiveDataProvider([
           'query' => Tasks::find()
        ]);

        return $this->render('index', [
        'dataProvider' => $dataProvider,
        'model' => $model
        ]);
    }

    public function one($id)
    {

    }
}