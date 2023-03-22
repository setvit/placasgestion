<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TabPlacas */

//$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Placas EPM', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-placas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
