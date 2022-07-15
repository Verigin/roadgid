<?php
namespace app\backend\jobs;
 
use yii\base\BaseObject;
use app\models\ShortUrl;
use app\models\Log;

class BotJob extends \yii\base\BaseObject implements \yii\queue\JobInterface
{
    public $url;
    public $userAgent;
    
    public function execute($queue)
    {
        $data = file_get_contents('https://qnits.net/api/checkUserAgent?userAgent='.urlencode($this->userAgent));
        $arr = json_decode($data, true);
        if (!$arr['isBot']) {
            $model = new Log();
            $model->url =  $this->url;
            $model->date = date('Y-m-d h:i:s');
            $model->save();
        }
    }
}
