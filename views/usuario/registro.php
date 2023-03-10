<?php

use Codeception\Command\Shared\Style;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */

?>

<style>
    dody{
        background-color: #E8ECF2;
    }

    .imagen{
        background-image: url('img/global.jpg');
        background-position: center ;
        background-size: cover;
    }
</style>

<div class="usuario-form container w-75 mt-3 rounded shadow-lg">

    <div class="row align-items-stretch">

        <div class="col-12 p-5 mx-3">

             <div class="text-center"> 
                <img src="../img/logo.png" width="70" alt="" srcset="">
            </div>

            <h1 class="fw-bold text-center">Bienvenido</h1>
            
            <p class="text-center">Ingrese los siguientes datos personales(Respetando el orden y formato)</p>

                <?php $form = ActiveForm::begin(
                ); ?>

                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

                <div class="form-group field-login-username required">
                    <label class="control-label mr-lg-3 text-center" for="login-username">Username</label>
                    <input type="text" id="login-username" class="form-control m-0 text-center " name="Login[username]" maxlength="45" aria-required="true">
                </div>

                <div class="form-group field-login-password required">
                <label class="control-label mr-lg-3 text-center" for="login-password">Password</label>
                <input type="password" id="login-password" class="form-control m-0 text-center" name="Login[password]" maxlength="45" aria-required="true">

                <div class="form-group field-login-perfil_id required">
                <!-- <label class="control-label" for="login-perfil_id">Perfil ID</label> -->
                    <input type="hidden" id="login-perfil_id" class="form-control m-0" name="Login[perfil_id]" aria-required="true" value="2">

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

                <div class="form-group field-usuario-habilitado required">
                <!-- <label class="control-label" for="usuario-habilitado">Habilitado</label> -->
                <input type="hidden" id="usuario-habilitado" class="form-control m-0" name="Usuario[habilitado]" value="Si">

                <div class="form-group field-usuario-login_id required">
                <!-- <label class="control-label" for="usuario-login_id">Login ID</label> -->
                <input type="hidden" id="usuario-login_id" class="form-control m-0" name="Usuario[login_id]" value="1">

                <div class="form-group">
                    <div class="text-center mt-2">
                        <?= Html::submitButton('Registrarme', ['class' => 'btn btn-success mt-3']) ?>
                        <?= Html::a('Iniciar Sesión', ['/site/login'], ['class' => 'btn btn-primary mt-3']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
        </div>

         <!-- <div class="col imagen d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"></div>  -->
        
    </div>
</div>
