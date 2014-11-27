<?php

class PersonaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'gestion', 'eliminar', 'create', 'actualizar'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	// ------------------ ACCIONES HITO 2
	public function actionIndex(){
		if(isset($_REQUEST['ajax'])){
			$this->renderPartial("index");
		}else{
			$this->render("index");
		}
	}
	public function actionGestion(){
		$personas = Persona::model()->findAll();
		if(isset($_REQUEST['ajax'])){
			$this->renderPartial("gestion", array("personas"=>$personas));
		}else{
			$this->render("gestion", array("personas"=>$personas));
		}
	}
	
	public function actionEliminar($id){
		$this->loadModel($id)->delete();
	}
	
	public function actionActualizar(){
		$id = $_POST['id'];
		$model=$this->loadModel($id);
		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if(!isset($model->estudiante)) $model->estudiante="off";
			if($model->save()){
				$personas = Persona::model()->findAll();
				$this->renderPartial("lista", array("personas"=>$personas));
			}
				
		}else{
            echo "else";
        }
	}
	
	public function actionCreate()
	{
		$model=new Persona;
		if(isset($_POST['Persona'])){
			
			$model->attributes = $_POST['Persona'];
			
			if(!isset($model->estudiante)) $model->estudiante="off";
			if($model->save())
                $this->renderPartial('_ver', array('persona'=> $model));
		}else{
            echo "else";
        }
	}
	
	// -------------------------  ACCIONES CREADAS POR YII
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionAdmin()
	{
		$model=new Persona('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persona']))
			$model->attributes=$_GET['Persona'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	// ------------------------- METODOS NECESARIOS
	public function loadModel($id)
	{
		$model=Persona::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='persona-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
