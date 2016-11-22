<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthAssignment;
use backend\models\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\IntegrityException;
use yii\web\ForbiddenHttpException;

/**
 * AssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AssignmentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $assignments = AuthAssignment::find()->all();

        return $this->render('index', [
            'assignments' => $assignments
        ]);
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionView($item_name, $user_id)
    {

        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
        ]);
    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $model = new AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {

            try {
                $model->save();
            } catch (IntegrityException $exception) {
                //flash message
                Yii::$app->getSession()->setFlash('warning', 'Already have such assignment!');

                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionUpdate($item_name, $user_id)
    {

        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $model = $this->findModel($item_name, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionDelete($item_name, $user_id)
    {

        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $this->findModel($item_name, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'MES_THE_REQUESTED_PAGE_DOES_NOT_EXIST'));
        }
    }
}
