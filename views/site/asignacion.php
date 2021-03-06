<?php

/* @var $this yii\web\View */

$this->title = 'CRUD Asignaciones';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>

<div class="container">

    <h1 align="center">CRUD ASIGNACIONES</h1>

    <h3><?= $msg ?></h3>

    <?php $form = ActiveForm::begin([
        "method" => "post",
        'enableClientValidation' => true,
    ]);
    ?>

    
    <div class="form-group">
     <?= $form->field($model, "nombre_curso")->input("text") ?>   
    </div>

    <div class="form-group">
     <?= $form->field($model, "carnet")->input("text") ?>   
    </div>

    <div class="form-group">
     <?= $form->field($model, "ciclo")->input("text") ?>   
    </div>

    <?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

    <?php $form->end() ?>

    <?= nl2br("\n"); ?>


    <table class="table table-bordered">
        <tr>
            <th><center><B>ID </B></center></th>
            <th><center><B>CURSO</B></center></th>
            <th><center><B>CARNET</B></center></th>
            <th><center><B>CICLO</B></center></th>
            <th><center><B>EDITAR</B></center></th>
            <th><center><B>ELIMINAR</B></center></th>
        </tr>
        <?php foreach ($modell as $row): ?>
            <tr>    
                <td><?= $row->id_asignacion ?></td>
                <td><?= $row->nombre_curso ?></td>
                <td><?= $row->carnet ?></td>         
                <td><?= $row->ciclo ?></td>
                <td>
                    <a href="<?= Url::toRoute(["site/updatea", "id_alumno" => $row->id_asignacion]) ?>">Editar</a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#id_alumno_<?= $row->id_asignacion ?>">Eliminar</a>
                    <div class="modall" role="dialog" aria-hidden="true" id="id_alumno_<?= $row->id_asignacion ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Eliminar Estudiante</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Eliminar Asignacion Estudiante-Curso con id: <?= $row->id_asignacion ?>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::beginForm(Url::toRoute("site/deletea"), "POST") ?>
                                            <input type="hidden" name="id_alumno" value="<?= $row->id_asignacion ?>">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Eliminar</button>
                                        <?= Html::endForm() ?>
                                    </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->       
                </td>
            </tr>
        <?php endforeach ?>
    </table>

</div>
