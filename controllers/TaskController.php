<?php

namespace app\controllers;

use app\models\forms\TaskAttachmentsAddForm;
use app\models\tables\TaskComments;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class TaskController extends Controller
{
    // public $layout = false;

    public function actionIndex()
    {
        $month = 5;
        $query = Tasks::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOne($id){
        return $this->render("one", [
            'model' => Tasks::findOne($id),
            'statusesList' => TaskStatuses::getStatusesList(),
            'usersList' => Users::getUsersList(),
            'taskCommentForm' => new TaskComments(),
            'taskAttachmentForm' => new TaskAttachmentsAddForm(),
            'userId' => \Yii::$app->user->id
        ]);
    }
   /* public function actionSend()
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

            return ;
    }*/

    public function actionSave($id)
    {
        if ($model = Tasks::findOne($id)) {
            $model->load(\Yii::$app->request->post());
            $model->save();
            \Yii::$app->session->setFlash('success', "Изменения сохранены");
        } else {
            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения");
        }
        $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionAddComment()
    {
        $model = new TaskComments();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', "Комментарий добавлен");
        } else {
            \Yii::$app->session->setFlash('error', "Не удалось добавить комментарий");
        }
        $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionAddAttachment()
    {
        $model = new TaskAttachmentsAddForm();
        $model->load(\Yii::$app->request->post());
        $model->attachment = UploadedFile::getInstance($model, 'attachment');
        if ($model->save()) {
            \Yii::$app->session->setFlash('success', "Файл добавлен");
        } else {
            \Yii::$app->session->setFlash('error', "Не удалось добавить файл");
        }
        $this->redirect(\Yii::$app->request->referrer);
    }
}