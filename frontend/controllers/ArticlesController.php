<?php
namespace frontend\controllers;

use frontend\models\Article;
use common\models\ArticleSearch;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class ArticlesController extends Controller
{
    public $layout = 'inner';

    private $lastArticlesCount = 10;

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
        $article = Article::findOne(['slug' => $slug]);
        $lastArticles = Article::find()
            ->orderBy('created_at DESC')
            ->limit($this->lastArticlesCount)
            ->all();

        return $this->render('view', [
            'article' => $article,
            'lastArticles' => $lastArticles,
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $lastArticles = Article::find()
            ->orderBy('created_at DESC')
            ->limit($this->lastArticlesCount)
            ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'lastArticles' => $lastArticles,
        ]);
    }
    
}
