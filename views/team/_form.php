<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap4\ActiveForm;
use app\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-team">
    <div class="hint-block">All (<span class="text-danger">*</span>) fields are required</div>
    <?php
    $form = ActiveForm::begin(['options' => ['class' => '',],
                'fieldConfig' => [
                    'options' => ['class' => 'form-group col-md-6'],
                ],]);
    ?>
    <div class="row">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

        <?php // $form->field($model, 'date_joined')->textInput() ?>
        <?=
        $form->field($model, 'joined_date', ['options' => ['class' => 'col-md-6']])->widget(DatePicker::className(), [
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ]);
        ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => 4]) ?>

        <div class="form-group col-md-12 text-right">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-info']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
