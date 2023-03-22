<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\TabTipoServicio;
use backend\models\TabAgencias;
use backend\models\TabClaseAutomotor;


/* @var $this yii\web\View */
/* @var $model backend\models\TabPlacas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tab-placas-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="panel panel-default">
        <div class="panel-heading"><h4 style="text-align: center;">Datos de ingreso nueva placa</h4></div>
        <div class="panel-body">

    <div class="col-sm-2">
    <?= $form->field($model, 'placa')->textInput(['readonly' => true]) ?>
    </div>


    <div class="col-sm-3">
    <?= $form->field($model, 'id_servicio')->dropDownList(
    ArrayHelper::map(TabTipoServicio::find()->all(),'id_servicio','descripcion_servicio'),
    ['prompt'=>'','disabled'=>true]) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'id_clase')->dropDownList( 
    ArrayHelper::map(TabClaseAutomotor::find()->all(),'id_clase','descripcion_clase'),
    ['prompt'=>'','disabled'=>true]) ?>
    </div>

    <div class="col-sm-3">
   <?= $form->field($model, 'id_agencia')->dropDownList( 
    ArrayHelper::map(TabAgencias::find()->all(),'id_agencia','descripcion_agencia'),
    ['prompt'=>'','disabled'=>true]) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'fecha_llegada')->textInput(['readonly'=>true]) ?>
    </div>
    
    <div class="col-sm-2">
    <?= $form->field($model, 'estanteria')->textInput(['readonly' => true]) ?>
    </div>

    <div class="col-sm-4">
    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'orden_axis')->textInput(['readonly' => true]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'tramite_axis')->textInput(['readonly' => true]) ?>
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
    <?= $form->field($model, 'disponibilidad_placa')->textInput(['readonly' => true,'value'=>'Entregada']) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'estado_entrega')->textInput(['readonly' => true,'value'=>'SI']) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'tipo_persona_entrega')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'nombre_persona_entrega')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-3">
   <?= $form->field($model, 'usuario_entrega')->textInput(['readonly' => true,'value'=>''.Yii::$app->user->identity->username]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'estado_placa')->textInput(['readonly'=>true, 'value'=>'1']) ?>
    </div>
    
     <div class="col-sm-3">  
       <?= $form->field($model, 'fecha_entrega_usuario')->widget(
    DatePicker::className(),
        [
            'inline'=> false,
            'language'=>'es',
            'clientOptions' => [
                'autoclose'=>true,
                'todayHighlight'=>true,
                'startDate' =>date('2020-04-01'),
                'format' => 'yyyy-mm-dd'
    ]
   ]
) ;?>
    </div>

    <div class="col-sm-3"> 
        <?= $form->field($model, 'fecha_entrega_sistema')->textInput(['readonly'=>true, 'value'=>''. date('yy-m-d H:m:s')]) ?>
    </div>


    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Entregar y acualizar placa', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
