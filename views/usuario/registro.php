<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-login-username required">
        <label class="control-label" for="login-username">Username</label>
        <input type="text" id="login-username" class="form-control" name="Login[username]" maxlength="45" aria-required="true">
    </div>

    <div class="form-group field-login-password required">
        <label class="control-label" for="login-password">Password</label>
        <input type="password" id="login-password" class="form-control" name="Login[password]" maxlength="45" aria-required="true">

    <div class="form-group field-login-perfil_id required">
    <!-- <label class="control-label" for="login-perfil_id">Perfil ID</label> -->
        <input type="hidden" id="login-perfil_id" class="form-control" name="Login[perfil_id]" aria-required="true" value="2">

    <?php
        function obtenerFecha() {
            date_default_timezone_set('America/Mexico_City');
            $dia = date('j'); 
            $mesNumero = date('n');
            $anio = date('Y');  
            $hora = date('h:i:s A'); 
            return $anio ."-" . $mesNumero . "-" . $dia . " " . $hora ;    
        }
        
    ?>

    <?= $form->field($model, 'fechaRegis')->hiddenInput(['value' => obtenerFecha()]) ?>

    <?= $form->field($model, 'habilitado')->hiddenInput(['value' => 'Si']) ?>

    <?= $form->field($model, 'login_id')->hiddenInput(['value' => '1']) ?>

    <div class="form-group">
        <?= Html::submitButton('Registrarme', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
