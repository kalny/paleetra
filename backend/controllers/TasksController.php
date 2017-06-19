<?php

namespace backend\controllers;

use Yii;
use backend\models\Task;
use backend\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use backend\models\Companies;

/**
 * TasksController implements the CRUD actions for Task model.
 */
class TasksController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Task models.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionIndex()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionView($id)
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model,
            'completedCompanies' => $model->getStates()->count(),
            'allCompanies' => Companies::find()->count()
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionCreate()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $model = new Task();

        $model->rate = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionUpdate($id)
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionDelete($id)
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Set stopped status.
     * If action is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionStop($id)
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }

        $this->findModel($id)->stop();

        return $this->redirect(['index']);
    }

    /**
     * Set active status.
     * If action is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionStart($id)
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }

        $this->findModel($id)->start();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'MES_THE_REQUESTED_PAGE_DOES_NOT_EXIST'));
        }
    }
}
