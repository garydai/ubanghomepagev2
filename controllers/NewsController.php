<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $count = News::find()->count();
        $news = News::find()->orderBy("createTime desc")->all();
        $page = 1;
        if(isset($_GET['page']))
            $page = $_GET['page'];
        return $this->render('index', ["news"=>$news, 'page'=>$page]);
    }

    public function actionArticle()
    {
        $id = $_GET['id'];
        $article = News::find()->where(["id"=>$id])->one();
       // echo $id;
        return $this->render('article', ['article'=>$article]);
    }


}
