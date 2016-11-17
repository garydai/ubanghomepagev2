<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Discuss;
use app\models\LoginForm;
class RelationshipController extends Controller
{
   // public $enableCsrfValidation = false;
	public $layout='homepage';
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
        
        if (!\Yii::$app->user->isGuest) {

            $id = Yii::$app->user->identity->attributes['Id'];
            if($id != 0)
                return $this->render('index', ['userId'=>$id]);

        }
        $model = new LoginForm(); 
       // var_dump(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
             

             $this->redirect(array('site/index'));
         } else {
         //   echo 'end';
           $this->redirect(array('login/index'));
            //echo 12;
        }
 
    }

    public function actionFriend()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $curl = curl_init(); 
            $header = array ("Authorization:AppFrame 2-693ad9c3d0c54adf87fed7cf6dc44f3f");
            // 设置你需要抓取的URL 
        	curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1337/contact/'.$id.'/first.json'); 
          // echo '139.224.59.235:1337/contact/'.$id.'/first.json'; 
	        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            // 设置header 响应头是否输出
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1337/profile/'.$id.'.json');
            $userret = curl_exec($curl);
            // 关闭URL请求 
            curl_close($curl); 
            $info = json_decode($ret,true);
            $info2 = json_decode($userret, true);
            $data  = $info['Data'];
            $user = $info2['Data'];
            //$b = $info['b'];
           // return $this->render('index', ['data'=>$data, 'user'=>$user]);
           // return \yii\helpers\Json::encode($test);
            return  \yii\helpers\Json::encode(array('data'=>$data, 'user'=>$user));
        }
        
       // echo ['data'=>$data, 'user'=>$user];
    }


}
