<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/asignacion") ?>">Regresar ...</a>

<h1>Editar asignacion con id <?= Html::encode($_GET["id_alumno"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "id_asignacion")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "nombre_curso")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "carnet")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "ciclo")->input("text") ?>   
</div>


<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>