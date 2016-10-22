<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FormEstudiante;
use app\models\FormAsignacion;
use app\models\estudiante;
use app\models\asignacion;
use app\models\ValidarFormulario;
use app\models\ValidarFormularioAjax;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\helpers\Url;


class SiteController extends Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    

    /**
     * Displays Estudiantes.
     *
     * @return highlight_string(str)
     */
    public function actionEstudiante()
    {

        $model = new FormEstudiante;
        $msg = null;        

        if($model->load(Yii::$app->request->post()))
        {

            if($model->validate())
            {
                $table = new Estudiante;
                $table->carnet = $model->carnet;
                $table->nombre = $model->nombre;
                $table->apellido = $model->apellido;
                
                ;
                if ($table->insert())
                {
                    $msg = "Se ha registrado exitosamente";
                    $model->carnet = null;
                    $model->nombre = null;
                    $model->apellido = null;
                    
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }



        $modell = estudiante::find()->orderBy('carnet')->all();
        return $this->render('estudiante',["modell"=> $modell, "model" => $model,"msg"=> $msg]);
    }
  
    public function actionDeletee()
    {
        if(Yii::$app->request->post())
        {
            $id_alumno = Html::encode($_POST["id_alumno"]);
            if((int) $id_alumno)
            {
                if(Estudiante::deleteAll("carnet=:id_alumno", [":id_alumno" => $id_alumno]))
                {
                    $msg = "que hongs";
                    return $this->redirect(['estudiante','msg' => $msg]);
                }
                else
                {
                    return $this->redirect(["estudiante"]);
                }
            }
            else
            {
                return $this->redirect(["estudiante"]);
            }
        }
        else
        {
            return $this->redirect(["estudiante"]);
        }
    }

    public function actionUpdatee()
    {
        $model = new FormEstudiante;
        $msg = null;
        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Estudiante::findOne($model->carnet);
                if($table)
                {
                    $table->carnet = $model->carnet;
                    $table->nombre = $model->nombre;
                    $table->apellido = $model->apellido;
                    
                    if ($table->update())
                    {
                        $msg = "El estudiante ha sido actualizado";
                    }
                    else
                    {
                        $msg = "El estudiante no se ha podido actualizar";
                    }
                }
                else
                {
                    $msg = "No se ha encontrado al estudiante";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("id_alumno"))
        {
            $id_alumno = Html::encode($_GET["id_alumno"]);
            if ((int) $id_alumno)
            {
                $table = Estudiante::findOne($id_alumno);
                if($table)
                {
                    $model->carnet = $table->carnet;
                    $model->nombre = $table->nombre;
                    $model->apellido = $table->apellido;
                    
                }
                else
                {
                    return $this->redirect(["site/updatee"]);
                }
            }
            else
            {
                return $this->redirect(["site/updatee"]);
            }
        }
        else
        {
            return $this->redirect(["site/updatee"]);
        }
        return $this->render("updatee", ["model" => $model, "msg" => $msg]);
    }





    /**
     * Displays Estudiantes.
     *
     * @return string
     */
    public function actionAsignacion()
    {

        $model = new FormAsignacion;
        $msg = null;        

        if($model->load(Yii::$app->request->post()))
        {
            $model->id_asignacion = 100;
            if($model->validate())
            {
                $table = new Asignacion;
                $table->carnet = $model->carnet;
                $table->nombre_curso = $model->nombre_curso;
                $table->carnet = $model->carnet;
                $table->ciclo = $model->ciclo;
                
                ;
                if ($table->insert())
                {
                    $msg = "Se ha registrado exitosamente";
                    $model->carnet = null;
                    $model->nombre_curso = null;
                    $model->carnet = null;
                    $model->ciclo = null;
                    
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }

        $modell = Asignacion::find()->orderBy('id_asignacion')->all();
        return $this->render('asignacion',["modell"=> $modell, "model" => $model,"msg"=> $msg]);
    }

    public function actionDeletea()
    {
        if(Yii::$app->request->post())
        {
            $id_alumno = Html::encode($_POST["id_alumno"]);
            if((int) $id_alumno)
            {
                if(Asignacion::deleteAll("id_asignacion=:id_alumno", [":id_alumno" => $id_alumno]))
                {
                    $msg = "que hongs";
                    return $this->redirect(['asignacion','msg' => $msg]);
                }
                else
                {
                    return $this->redirect(["asignacion"]);
                }
            }
            else
            {
                return $this->redirect(["asignacion"]);
            }
        }
        else
        {
            return $this->redirect(["asignacion"]);
        }
    }



    public function actionUpdatea()
    {
        $model = new FormAsignacion;
        $msg = null;
        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Asignacion::findOne($model->id_asignacion);
                if($table)
                {
                    $table->id_asignacion = $model->id_asignacion;
                    $table->nombre_curso = $model->nombre_curso;
                    $table->carnet = $model->carnet;
                    $table->ciclo = $model->ciclo;
                    
                    if ($table->update())
                    {
                        $msg = "Se ha modificado la asignacion";
                    }
                    else
                    {
                        $msg = "La asignacion no se ha podido actualizar";
                    }
                }
                else
                {
                    $msg = "No existe la asignacion";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("id_alumno"))
        {
            $id_alumno = Html::encode($_GET["id_alumno"]);
            if ((int) $id_alumno)
            {
                $table = Asignacion::findOne($id_alumno);
                if($table)
                {
                    $model->id_asignacion = $table->id_asignacion;
                    $model->nombre_curso = $table->nombre_curso;
                    $model->carnet = $table->carnet;
                    $model->ciclo = $table->ciclo;
                    
                }
                else
                {
                    return $this->redirect(["site/updatea"]);
                }
            }
            else
            {
                return $this->redirect(["site/updatea"]);
            }
        }
        else
        {
            return $this->redirect(["site/updatea"]);
        }
        return $this->render("updatea", ["model" => $model, "msg" => $msg]);
    }

    public function actionShit()
    {

        $model = asignacion::find()->joinWith(['estudiante'])->orderBy('carnet')->all();
        
        return $this->render('shit',["model" => $model]);
    }


}
