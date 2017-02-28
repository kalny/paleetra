<?php
namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Contact;
use frontend\models\Motivation;
use frontend\models\Step;
use frontend\models\Trust;
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
        $motivations = Motivation::find()->all();
        $trusts = Trust::find()->all();
        $prices = Price::find()->all();
        $categories = Category::find()->all();
        $works = Work::find()->orderBy('pos ASC')->all();
        $contacts = Contact::find()->orderBy('pos ASC')->all();
        $reviews = Review::find()->all();
        $step = Step::find()->one();
        
        return $this->render('home', [
            'motivations' => $motivations,
            'trusts' => $trusts,
            'step' => $step,
            'prices' => $prices,
            'categories' => $categories,
            'works' => $works,
            'contacts' => $contacts,
            'reviews' => $reviews,
        ]);
    }
    
}
