<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TabPlacas;
use frontend\models\TabPlacasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use dosamigos\tableexport\ButtonTableExport;
/**
 * TabPlacasController implements the CRUD actions for TabPlacas model.
 */
class TabPlacasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * Lists all TabPlacas models.
     * @return mixed
     */
    public function actionIndex()
    {
    if(Yii::$app->user->can( 'ver-placas' ))
        {
        $searchModel = new TabPlacasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
        {
        throw new ForbiddenHttpException('No tienes los permisos para acceder a este recurso o ejecutar esta acción.');
        }
    }

    /**
     * Displays a single TabPlacas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    if(Yii::$app->user->can( 'ver-placas' ))
        {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
        {
        throw new ForbiddenHttpException('No tienes los permisos para acceder a este recurso o ejecutar esta acción.');
        }
    }

    /**
     * Creates a new TabPlacas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    if(Yii::$app->user->can( 'crear-placas' ))
        {
        $model = new TabPlacas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) { 

            return $this->redirect(['view', 'id' => $model->id_placa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
        {
        throw new ForbiddenHttpException('No tienes los permisos para acceder a este recurso o ejecutar esta acción.');
        }
    }

    /**
     * Updates an existing TabPlacas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    if(Yii::$app->user->can( 'actualizar-placas' ))
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_placa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
        {
        throw new ForbiddenHttpException('No tienes los permisos para acceder a este recurso o ejecutar esta acción.');
        }
    }
    /**
     * Deletes an existing TabPlacas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    if(Yii::$app->user->can( 'borrar-placas' ))
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
        {
        throw new ForbiddenHttpException ('No tienes los permisos para acceder a este recurso o ejecutar esta acción.');
        }
    }

    /**
     * Finds the TabPlacas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabPlacas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabPlacas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página que solicitaste no existe.');
    }
}
