<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */



if (!Yii::$app->user->isGuest) {

    $this->title = 'Registrar usuario';

    $this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    // $this->title = 'Registrate';
}
   
?>
<div class="usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>
     
    

    <?= 
        Yii::$app->user->isGuest 
        ? $this->render('registro', ['model' => $model,])   

        : $this->render('_form', ['model' => $model,]) 
    ?> 
    
   

</div>
