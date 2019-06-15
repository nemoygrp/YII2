<?php
namespace app\models;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Test extends Model
{
    public $content;
    public $title;
    public $count;
    /** @var  UploadedFile */
    public $upload;


    public function rules()
    {
        return[
            [['title', 'content'],  'required'],
            [['count'], 'safe'],
            ['upload', 'file', 'extensions' => 'jpg, png']
        ];
    }

    public function save()
    {
        if($this->validate('upload')){
            $filepath = \Yii::getAlias("@img/{$this->upload->name}");
            $this->upload->saveAs($filepath);

            Image::thumbnail($filepath, 100, 100)
                ->save(\Yii::getAlias("@img/small/{$this->upload->name}"));
        }
    }

    public function attributeLabels()
    {
        return [
            'content' => \Yii::t("app", 'test_content')
        ];
    }


    public function myValidate($attr, $params)
    {
        if(!in_array($this->$attr,[3 , 4, 5])){
            $this->addError($attr,  "Неверный диапазон");
        }
    }


}