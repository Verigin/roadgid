<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Short URL';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    '@web/assets/main.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'url')->textInput(['autofocus' => true])->label('URL') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Get', ['class' => 'btn btn-primary ajax-request', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <div class="alert alert-success" style="display:none">
        </div>    

</div>
