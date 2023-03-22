<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use frontend\models\TabTipoServicio;
use frontend\models\TabAgencias;
use frontend\models\TabClaseAutomotor;


/* @var $this yii\web\View */
/* @var $model frontend\models\TabPlacas */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tab-placas-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="panel panel-default">
        <div class="panel-heading"><h4 style="text-align: center;">Datos de ingreso nueva placa</h4></div>
        <div class="panel-body">

    <div class="col-sm-2">
    <?= $form->field($model, 'placa')->textInput(['maxlength' => true,'style'=>"text-transform:uppercase"]) ?>
    </div>


    <div class="col-sm-3">
    <?= $form->field($model, 'id_servicio')->dropDownList(
    ArrayHelper::map(TabTipoServicio::find()->all(),'id_servicio','descripcion_servicio'),
    ['prompt'=>'Escoje el servicio']) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'id_clase')->dropDownList( 
    ArrayHelper::map(TabClaseAutomotor::find()->all(),'id_clase','descripcion_clase'),
    ['prompt'=>'Escoje la clase']) ?>
    </div>

    <div class="col-sm-3">
   <?= $form->field($model, 'id_agencia')->dropDownList( 
    ArrayHelper::map(TabAgencias::find()->all(),'id_agencia','descripcion_agencia'),
    ['prompt'=>'Escoje la agencia']) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'fecha_llegada')->widget(

    DatePicker::classname(), [
        'inline'=> false,
        //'laguage' => 'es',
        //'template'=> '<div class="well well-sm" style="background-color:#fff; width:250px">{input}</div>',
        'clientOptions'=>[
            'autoclose'=> true,
            'format'=>'yyyy-mm-dd',
            'todayHighlight' => true,
            'startDate' => date('2020-05-01'),
            'endDate' => date ('2020-05-31')
        ]
    ]); ?>
    </div>
    
    <div class="col-sm-2">
    <?= $form->field($model, 'estanteria')->textInput(['maxlength' => true, 'style'=>"text-transform:uppercase", 'required'=>true]) ?>
    </div>

    <div class="col-sm-4">
    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'orden_axis')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'tramite_axis')->textInput(['maxlength' => true]) ?>
    </div>
           
    </div>
    </div>

<div class="panel panel-default">
        <div class="panel-heading"><h4 style="text-align: center;">Datos Informativos</h4></div>
        <div class="panel-body">

    
    <div class="col-sm-3">
    <?= $form->field($model, 'fecha_registro_sistema')->textInput(['readonly'=>true, 
                'value'=>''. date('yy-m-d H:m:s')])?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'disponibilidad_placa')->textInput(['readonly' => true,'value'=>'Disponible']) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'estado_entrega')->textInput(['readonly' => true, 'value' =>'NO']) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'tipo_persona_entrega')->textInput(['readonly' => true,'style'=>"text-transform:uppercase", 'value'=> 'Por Definir']) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'nombre_persona_entrega')->textInput(['readonly' => true,'style'=>"text-transform:uppercase",'value'=>'Por Definir']) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'usuario_ingreso')->textInput(['readonly' => true,'value'=>''.Yii::$app->user->identity->username]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'estado_placa')->textInput(['readonly'=>true, 'value'=>'0']) ?>
    </div>
       
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Ingresar placa', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
