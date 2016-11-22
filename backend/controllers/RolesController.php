<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Role;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class RolesController extends \yii\web\Controller
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

        $roles = Role::find();

        return $this->render('index', [
            'roles' => $roles,
        ]);
    }

    public function actionCreate()
    {
        
        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $model = new Role();

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
        $role = $auth->getRole($name);
        $auth->remove($role);

        return $this->redirect(['index']);

    }

    public function actionView($name)
    {
        
        if (! \Yii::$app->user->can('managePermissions')) {
            throw new ForbiddenHttpException;
        }

        $permissions = Role::permissions($name);

        return $this->render('view', [
            'model' => $this->findModel($name),
            'permissions' => $permissions
        ]);
    }

    protected function findModel($name)
    {
        if (($model = Role::findOne($name)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'MES_THE_REQUESTED_PAGE_DOES_NOT_EXIST'));
        }
    }

}
