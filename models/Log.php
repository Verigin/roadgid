<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Log extends ActiveRecord
{
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['url', 'date'], 'required'],
        ];
    }

    public static function tableName() {
        return '{{log}}';
    }

}
