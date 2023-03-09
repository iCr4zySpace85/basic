<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sensor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sensor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accion')->dropDownList([ 'Apagado' => 'Apagado', 'Encendido' => 'Encendido', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
