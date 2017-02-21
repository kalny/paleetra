<?php

namespace backend\controllers;

use Yii;
use backend\models\Contact;
use backend\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

/**
 * ContactsController implements the CRUD actions for Contact model.
 */
class ContactsController extends Controller
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
     * Lists all Contact models.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionIndex()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contact model.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionView($id)
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionCreate()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $model = new Contact();

        $model->scenario = Contact::SCENARIO_ADMIN_CREATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contact model.
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

        $model->scenario = Contact::SCENARIO_ADMIN_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contact model.
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
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'MES_THE_REQUESTED_PAGE_DOES_NOT_EXIST'));
        }
    }
}
