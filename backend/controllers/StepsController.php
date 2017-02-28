<?php

namespace backend\controllers;

use Yii;
use backend\models\Step;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class StepsController extends \yii\web\Controller
{
    /**
     * Updates an existing Trust model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws ForbiddenHttpException if the permissions denied
     */
    public function actionUpdate()
    {
        if (! \Yii::$app->user->can('manageArticles')) {
            throw new ForbiddenHttpException;
        }

        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['update']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    protected function findModel()
    {
        if (($model = Step::find()->one()) === null) {
            $model = new Step();
        }

        return $model;

    }

}
