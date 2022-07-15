<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ShortUrl;
use app\models\Log;
use app\backend\jobs\BotJob;
use yii\data\Pagination;

class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLog()
    {   
        $query = Log::find()
        ->orderBy(['id' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        return $this->render('log', [
            'model' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionStatistic()
    {   
        $query = Yii::$app->db->createCommand(
            "select 
            `url`,`count`,
            @pos:=CASE
                    WHEN @month_no = CONCAT(year,'-',month) THEN @pos + 1
                    ELSE 1
                END AS pos,
                @month_no:=CONCAT(year,'-',month) as date
            from ( 
                    SELECT year(`date`) as year, month(`date`) as month, `url`, count(*) as count 
                    FROM `log` group by year(`date`),month(`date`),`url` 
                ) as stat 
            order by `month`,`count` desc;"
        )
        ->queryAll();
        return $this->render('statistic', [
            'model' => $query,
        ]);
    }

    public function actionShorturl()
    {   
        $model = new ShortUrl();
        return $this->render('shorturl', [
            'model' => $model
        ]);
    }

  
    public function actionGetshorturl()
    {   

        $model = new ShortUrl();
        $model->url = Yii::$app->request->get('url');
        $model->shorturl = Yii::$app->security->generateRandomString(5);
        $model->save();
        if (!$model->errors) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $model;
        }
       
    }

    public function actionReadshorturl($shorturl)
    {   

        $model = ShortUrl::find()
        ->where(['shorturl' => $shorturl])
        ->one();

        if ($model) {
            Yii::$app->queue->push(new BotJob([
                'url' => $model->url,
                'userAgent' => Yii::$app->request->userAgent
            ]));
            return $this->redirect($model->url);
        }

    }

}
