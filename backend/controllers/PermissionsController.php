<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Permission;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class PermissionsController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        
        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $permissions = Permission::find();

        return $this->render('index', [
            'permissions' => $permissions,
        ]);
    }

    public function actionCreate()
    {
        
        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $model = new Permission();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($name)
    {
        
        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }


        $auth = \Yii::$app->authManager;
        $permission = $auth->getPermission($name);
        $auth->remove($permission);

        return $this->redirect(['index']);

    }

    public function actionView($name)
    {
        
        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        return $this->render('view', [
            'model' => $this->findModel($name),
        ]);
    }

    protected function findModel($name)
    {
        if (($model = Permission::findOne($name)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
