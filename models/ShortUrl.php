<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class ShortUrl extends ActiveRecord
{
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['url'], 'required'],
            [['url'], 'url'],
        ];
    }

    public static function tableName() {
        return '{{shorturl}}';
    }

}
