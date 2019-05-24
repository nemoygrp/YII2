<?php
/**
 * Created by PhpStorm.
 * User: NEMOY
 * Date: 24.05.2019
 * Time: 19:20
 */

namespace app\models;
use yii\base\Model;

class Test extends Model
{
    public $content;
    public $title;
    public $count;

    public function rules()
    {
        return [
            [['title','content'], 'required'],
            ['count','myValidate']
        ];
    }

    public function myValidate($attr)
    {
        if(!in_array($this->$attr,[3,4,5])){
            $this->addError($attr, 'Шляпа полная');
        }
    }

}