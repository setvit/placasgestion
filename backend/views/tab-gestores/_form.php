<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TabGestores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tab-gestores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_gestor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres_gestor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos_gestor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'casa_comercial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fotografia_gestor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar datos', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
