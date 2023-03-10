<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Perfil $model */

$this->title = 'Actualiazar perfil de: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
