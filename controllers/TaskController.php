<?php

namespace app\controllers;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use app\models\filters\TasksFilter;
use Yii;
use app\models\events\EventUserRegistrationComplete;
use app\models\forms\RegisterUserForm;
use app\models\Subscribe;
use app\models\SubscribeBehavior;
use app\models\tables\Tasks;
use app\models\Test;
use yii\base\Event;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


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


    public function actionIndex()
    {
        $month = Yii::$app->request->post('TasksFilter')['create_time'];
        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //var_dump($month);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'month' => $month
        ]);
    }

    public function actionOne($id)
    {
        $model = $this->findModel($id);
        $status = TaskStatuses::getStatusesList();
        $responsible = Users::getUsersList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['one', 'id' => $model->id]);
        }
        return $this->render("one", [
            'model' => $model,
            'status' => $status,
            'responsible' => $responsible
            ]);
    }



    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}