<?php

namespace app\models\tables;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $user_id
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_id'], 'integer'],
            [['content'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
    public static function getCommentsFromID($id)
    {
        $comments = static::find()
            ->select(['id','parent_id','user_id', 'content','create_time'])
            ->where(['parent_id' => $id]);
            //->asArray()
            //->all();
        //$usersAr = ArrayHelper::map($comments, 'parent_id','name', 'content','create_time');
       // var_dump($comments);

        return $comments;
    }
    public function getUser($id)
    {
        return $this->hasOne(Users::class, ['id' => $id]);
    }

}
