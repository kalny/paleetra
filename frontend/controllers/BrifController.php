<?php
namespace frontend\controllers;

use frontend\models\Brif;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class BrifController extends Controller
{
    public $layout = 'inner';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays form page.
     *
     * @return mixed
     */
    public function actionForm()
    {
        $model = new Brif();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', 'Ваш запрос принят, наш специалист свяжется с вами в ближайшее время.');

            return $this->redirect(['site/home']);
        } else {
            return $this->render('form', [
                'model' => $model,
            ]);
        }
    }
    
}
