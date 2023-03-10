<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Perfil $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-form col-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,]) ?>
    
    <br>

    <div class="form-group">
        <?= Html::submitButton('Aceptar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
