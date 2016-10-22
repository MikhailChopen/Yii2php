<?php

namespace app\models;
use yii;
use \yii\base\Model;

class FormEstudiante extends model
{

	public $carnet;
	public $nombre;
	public $apellido;

	public function rules()
	{
		return
		[	
			['carnet','required','message'=>'Campo requerido'],
			['carnet', 'integer', 'message' => 'Id incorrecto'],
		   	['nombre', 'required', 'message' => 'Campo requerido'],
		   	['nombre', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
		   	['nombre', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
		   	['apellido', 'required', 'message' => 'Campo requerido'],
		   	['apellido', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
		   	['apellido', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
		];
	}
}