<?php
namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Contact;
use frontend\models\PhoneForm;
use frontend\models\Price;
use frontend\models\Review;
use frontend\models\Work;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'main';

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
    public function actionHome()
    {
        $prices = Price::find()->all();
        $categories = Category::find()->all();
        $works = Work::find()->all();
        $contacts = Contact::find()->all();
        $reviews = Review::find()->all();
        
        return $this->render('home', [
            'prices' => $prices,
            'categories' => $categories,
            'works' => $works,
            'contacts' => $contacts,
            'reviews' => $reviews,
        ]);
    }
    
}
