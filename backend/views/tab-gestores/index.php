<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TabGestoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de gestores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-gestores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_gestor',
            'cedula_gestor',
            'nombres_gestor',
            'apellidos_gestor',
            'casa_comercial',
            //'celular',
            'correo',
            //'fotografia_gestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
