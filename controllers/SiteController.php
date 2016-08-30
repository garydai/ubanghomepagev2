<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Discuss;
class SiteController extends Controller
{
   // public $enableCsrfValidation = false;
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
        
        $discuss = Discuss::find()->orderBy('createTime desc')->limit(20)->all();
        $count = Discuss::find()->count()/20+1;
      //  var_dump($news);
        //echo $news[0]->title;
        return $this->render('index', ['discuss'=>$discuss, 'count'=>$count]);
    }

    public function actionGetcomment()
    {
         $num = $_POST['num'];
         $num -= 1;
         $discuss =  Discuss::find()->orderBy('createTime desc')->offset($num*20)->limit(20)->all();
         $result = '';
         foreach ($discuss as $m) {

               $html = '<li>
                    <p>
                        <span class="username"></span>'.$m->ip.'<br />
                    </p>
                    <p>
                        <span >'.$m->message.'</span>
                    </p>
                    <p class="no-pad-bottom date-posted">Posted <span />'.$m->createTime.'</p>
                </li>';
                $result .= $html;
          } 
          return $result;
    }

    public function actionAdd_comment()
    {
        
        
        $discuss = new Discuss();
        $ip = Yii::$app->getRequest()->getUserIP();
        //echo $ip;
        date_default_timezone_set('Asia/Shanghai');
        $discuss->createTime =  date('Y-m-d H:i:s');
        $discuss->message = $_POST['msg'];
        $discuss->ip = $ip;
        $discuss->save();
        $html = '<li>
                    <p>
                        <span class="username"></span>'.$ip.'<br />
                    </p>
                    <p>
                        <span >'.$discuss->message.'</span>
                    </p>
                    <p class="no-pad-bottom date-posted">Posted <span />'.$discuss->createTime.'</p>
                </li>';
        return $html;
        //$discusses = Discuss::find()->orderBy('createTime desc')->all();
      //  var_dump($news);
        //echo $news[0]->title;
        //return $this->actionIndex();
    }
    public function actionEmail()
    {
        $name = $_POST['InputName'];
        $email = $_POST['InputEmail'];
        $message = $_POST['InputMessage'];
        
        $cmd = 'echo '.$message.' | mailx -s '.$name.','.$email.' contact@ubangwang.com';
        system($cmd);
        echo $cmd;
       // echo $cmd;
      //  echo '已发送';
           // return $this->render('index', ['discuss'=>$discuss, 'count'=>$count]);
    }


}
