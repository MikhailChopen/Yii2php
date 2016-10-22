<?php

namespace app\models;
use yii;
use \yii\base\Model;

class FormAsignacion extends model
{

    public $id_asignacion;
    public $nombre_curso;
    public $carnet;
    public $ciclo;

    public function rules()
    {
        return
        [   
            ['id_asignacion','required','message'=>'Campo requerido'],
            ['id_asignacion', 'integer', 'message' => 'Id incorrecto'],
            ['carnet','required','message'=>'Campo requerido'],
            ['carnet', 'integer', 'message' => 'Id incorrecto'],
            ['nombre_curso', 'required', 'message' => 'Campo requerido'],
            ['nombre_curso', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
            ['nombre_curso', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
            ['ciclo','required','message'=>'Campo requerido'],
            ['ciclo', 'integer', 'message' => 'Id incorrecto'],
        ];
    }
}