<?php
namespace frontend\controllers;

use frontend\models\Work;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class PortfolioController extends Controller
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionView($slug)
    {
        $work = Work::findOne(['slug' => $slug]);

        return $this->render('view', ['work' => $work]);
    }
    
}
