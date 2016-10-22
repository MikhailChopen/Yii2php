<?php

/* @var $this yii\web\View */

$this->title = 'CRUD Estudiantes';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>

<div class="container">

    <h1 align="center">CRUD ESTUDIANTES</h1>

    <h3><?= $msg ?></h3>

    <?php $form = ActiveForm::begin([
        "method" => "post",
        'enableClientValidation' => true,
    ]);
    ?>

    <div class="form-group">
     <?= $form->field($model, "carnet")->input("text") ?>   
    </div>

    <div class="form-group">
     <?= $form->field($model, "nombre")->input("text") ?>   
    </div>

    <div class="form-group">
     <?= $form->field($model, "apellido")->input("text") ?>   
    </div>

    <?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

    <?php $form->end() ?>

    <?= nl2br("\n"); ?>


    <table class="table table-bordered" >
        <tr>
            <th ><center><B>CARNET</B></center></th>
            <th ><center><B>NOMBRE</B></center></th>
            <th ><center><B>APELLIDO</B></center></th>
            <th ><center><B>Editar</B></center></th>
            <th ><center><B>Eliminar</B></center></th>
        </tr>
        <?php foreach ($modell as $row): ?>
            <tr>    
                <td><?= $row->carnet ?></td>
                <td><?= $row->nombre ?></td>
                <td><?= $row->apellido ?></td>
                <td>
                    <a href="<?= Url::toRoute(["site/updatee", "id_alumno" => $row->carnet]) ?>">Editar</a>
                </td>
                    
                    <td>
                        <a href="#" data-toggle="modal" data-target="#id_alumno_<?= $row->carnet ?>">Eliminar</a>
                        <div class="modal" role="dialog" aria-hidden="true" id="id_alumno_<?= $row->carnet ?>">
                                  <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Eliminar Estudiante</h4>
                                          </div>
                                          <div class="modal-body">
                                                <p>¿Eliminar Estudiante con carnet: <?= $row->carnet ?>?</p>
                                          </div>
                                          <div class="modal-footer">
                                          <?= Html::beginForm(Url::toRoute("site/deletee"), "POST") ?>
                                                <input type="hidden" name="id_alumno" value="<?= $row->carnet ?>">
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
