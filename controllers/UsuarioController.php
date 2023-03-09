<?php

namespace app\controllers;

use app\models\Usuario;
use app\models\UsuarioSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Login;
use app\models\LoginSearch;

use app\controllers\SiteController;
/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Usuario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuario();
        $login = new Login();

       $v = $this->request->post();
       $v['Usuario']['login_id']='';
       

        if ($this->request->isPost) {
            if ($login->load( $v) && $login->save()) {
                 $v['Usuario']['login_id']= $login->id;
                if ($model->load($v) && $model->save()) {
                }             
            }   
        } else {
            $login->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        /*
        $valores = $this->request->isPost;
        var_dump($valores);
        if( isset($valores['Usuario']) ){
            // Se integra el nombre de persona para su registro
            //$valores['Login']['nombre'] = $valores['Estudiante']['Nombre'];
            }
          // Incluye primero la alta de la persona
          if ($login->load($valores) && $login->save()) {
                // Se integra el id de persona para el registro del estudiante
                $valores['usuario']['login_id'] = $login->id;
                if ($model->load($valores) && $model->save()) {
                 //   return $this->redirect(['view', 'id' => $model->id]);         
                 return null;     
                }
            }  

         if ($this->request->isPost) {
             if ($model->load($this->request->post()) && $model->save()) {
                // return $this->redirect(['view', 'id' => $model->id]);
                return null;
             }
         } else {
             $model->loadDefaultValues();
         }

        return $this->render('create', [
            'model' => $model,
        ]);
        */
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
