<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use dosamigos\exportable\ExportableButton; 
use dosamigos\exportable\behaviors\ExportableBehavior; 
use dosamigos\grid\GridView;
use dosamigos\grid\behaviors\LoadingBehavior;
use dosamigos\grid\behaviors\ToolbarBehavior;
use dosamigos\grid\buttons\ReloadButton;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TabPlacasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de placas EPM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-placas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar nueva placa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget(

[
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model -> estado_placa == '1')
            {
                return['class' => 'read'];

            }elseif ($model -> estado_placa == '0') 
            {
                return['class' => 'success'];
            }
        },
        'columns' => [

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'visibleButtons' => 
                [
                    'update' => function ($model, $key, $index) 
                {
                    return $model->estado_placa == 0;
                },
                    'view' => function ($model) 
                    {
                        return \Yii::$app->user->can('ver-placas', ['TabPlacas' => $model]);
                    },

                    'delete' => function ($model) 
                    {
                        return \Yii::$app->user->can('borrar-placas', ['TabPlacas' => $model]);
                    }
                ]
            ],

            'placa',
            //'id_servicio',
            //'id_clase',
            [
                'label' => 'Nombre Agencia',
                'attribute' => 'agencia.descripcion_agencia',
            ],

            [
                'attribute' => 'fecha_llegada',
                'value' => 'fecha_llegada',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute' => 'fecha_llegada',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',

                    ]


                ])

            ],
            //'fecha_registro_sistema',
            //'fecha_entrega_usuario',
            'disponibilidad_placa',
            //'observacion',
            'estanteria',
            'estado_entrega',
            //'fecha_entrega_sistema',
            //'tipo_persona_entrega',
            //'nombre_persona_entrega',
            //'usuario_ingreso',
            //'usuario_entrega',
            //'estado_placa',
            //'orden_axis',
            'tramite_axis',
        ],
    ]
//inicio grid antiguo
); ?>


</div>
