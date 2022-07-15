<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use \yii\widgets\LinkPager;

$this->title = 'Log';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">url</th>
        <th scope="col">date</th>
        </tr>
    </thead>
    <tbody>
    <?foreach ($model as $item):?>
        <tr>
        <th scope="row"><?=$item->id;?></th>
        <td><?=$item->url;?></td>
        <td><?=$item->date;?></td>
        </tr>
    <?endforeach;?>   
    </tbody> 
    </table>

    <?
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>



</div>
