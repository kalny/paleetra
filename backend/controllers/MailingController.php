<?php

namespace backend\controllers;

use backend\models\IndustriesSearch;
use Yii;
use backend\models\Companies;
use backend\models\CompaniesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * MailingController implements the CRUD actions for Companies model.
 */
class MailingController extends Controller
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
     * Lists all Companies models.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionIndex()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }
        
        $searchModel = new CompaniesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Industries models.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionIndustries()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }

        $searchModel = new IndustriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('industries', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Companies model.
     * @param integer $id
     * @throws ForbiddenHttpException if the permissions denied
     * @return mixed
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
     * Finds the Companies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Companies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Companies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'MES_THE_REQUESTED_PAGE_DOES_NOT_EXIST'));
        }
    }
}
