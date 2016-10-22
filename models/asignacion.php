<?php

namespace app\models;
use yii;
use yii\db\ActiveRecord;

class asignacion extends ActiveRecord
{
	
	public static function getDb()
    {
        return Yii::$app->db;
    }
    
    public static function tableName()
    {
        return 'asignacion';
    }

    public function getEstudiante()
    {
    	return $this->hasOne(estudiante::className(), ['carnet' => 'carnet']);
    }
}