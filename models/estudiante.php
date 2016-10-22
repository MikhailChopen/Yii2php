<?php

namespace app\models;
use yii;
use yii\db\ActiveRecord;


class estudiante extends ActiveRecord
{
	
	public static function getDb()
    {
        return Yii::$app->db;
    }
    
    public static function tableName()
    {
        return 'estudiante';
    }

    public function getAsignacion()
    {
    	return $this->hasOne(asignacion::className(), ['carnet' => 'carnet']);
    }

  
}