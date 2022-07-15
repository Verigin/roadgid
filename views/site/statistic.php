<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use \yii\widgets\LinkPager;

$this->title = 'Statistic';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    SET @pos = 0;
select 
`url`,`count`,
@pos:=CASE
        WHEN @month_no = concat(year,'-',month) THEN @pos + 1
        ELSE 1
    END AS pos,
    @month_no:=concat(year,'-',month) as date
from ( 
        SELECT year(`date`) as year, month(`date`) as month, `url`, count(*) as count 
        FROM `log` group by year(`date`),month(`date`),`url` 
    ) as stat 
order by `month`,`count` desc;
    </p>    

    <table class="table">
    <thead>
        <tr>
        <th scope="col">date</th>
        <th scope="col">url</th>
        <th scope="col">count</th>
        <th scope="col">pos</th>
        </tr>
    </thead>
    <tbody>
    <?foreach ($model as $item):?>
        <tr>
        <th scope="row"><?=$item['date'];?></th>
        <td><?=$item['url'];?></td>
        <td><?=$item['count']?></td>
        <td><?=$item['pos']?></td>
        </tr>
    <?endforeach;?>   
    </tbody> 
    </table>

   



</div>
