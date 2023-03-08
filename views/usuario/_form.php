<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */


/*function obtenerFecha() {
    date_default_timezone_set('America/Mexico_City');

    $dia = date('j'); 
    $mesNumero = date('n');
    $anio = date('Y');  
    $hora = date('h:i:s A'); 

    return $anio ."-" . $mesNumero . "-" . $dia . " " . $hora ;    
}*/
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>}

    <div class="form-group field-login-username required">
<label class="control-label" for="login-username">Username</label>
<input type="text" id="login-username" class="form-control" name="Login[username]" maxlength="45" aria-required="true">

<div class="help-block"></div>
</div>
    <div class="form-group field-login-password required">
<label class="control-label" for="login-password">Password</label>
<input type="password" id="login-password" class="form-control" name="Login[password]" maxlength="45" aria-required="true">

    <?= $form->field($model, 'fechaRegis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'habilitado')->dropDownList([ 'Si' => 'Si', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'login_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
