<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/estudiante") ?>">Regresar ...</a>

<h1>Editar alumno con id <?= Html::encode($_GET["id_alumno"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "carnet")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "nombre")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "apellido")->input("text") ?>   
</div>


<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>