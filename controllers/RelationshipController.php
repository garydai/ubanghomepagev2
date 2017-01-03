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
                return $this->render('index', ['userId'=>$id, 'userinfo'=>Yii::$app->user->identity->attributes]);

        }
        $session = Yii::$app->session;
        $session['ubangwangrelationship'] = 1;
        $this->redirect(array('login/index'));
    }

    public function actionFriend()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $curl = curl_init(); 
            $header = array ("Authorization:AppFrame ".Yii::$app->user->identity->attributes['AuthToken']);
            // 设置你需要抓取的URL 
        	curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1338/contact/'.$id.'/first.json'); 
          // echo '139.224.59.235:1337/contact/'.$id.'/first.json'; 
	        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            // 设置header 响应头是否输出
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1338/profile/'.$id.'.json');
            $userret = curl_exec($curl);
            // 关闭URL请求 
            curl_close($curl); 
            $info = json_decode($ret,true);
            $info2 = json_decode($userret, true);
            $data  = $info['Data'];
            $user = $info2['Data'];
            $result = array();
            if($_GET['id'] == Yii::$app->user->identity->attributes['Id'])
            {
                $session = Yii::$app->session;
                $r1friend  = array();
                foreach ($data as $t) {
                    array_push($r1friend, $t['Id']);
                }
               
                $session['r1friend'] = $r1friend;
                $result = $data;
            }
            else 
            {
                $session = Yii::$app->session;
                $r1friend =  $session['r1friend'];
                //var_dump($data);
                if(count($r1friend) > 0)
                {
                    for ($i = count($data) - 1; $i >= 0 ; $i--) {
                        if(!in_array($data[$i]['Id'], $r1friend) && $data[$i]['Id'] != Yii::$app->user->identity->attributes['Id'])
                            array_push($result, $data[$i]);
                    }
                }

            }
            return  \yii\helpers\Json::encode(array('data'=>$result, 'user'=>$user));
        }
        
    }
    //后台返回缺少order总数字段，默认最多20个order
    public function actionOpenorder()
    {
        if(isset($_GET['id']))
        {

            $id = $_GET['id'];
            $index = $_GET['index'];
            $page = $_GET['page'];
            $type = -1;
            $url = '';
            $count_url = '';
            if($index == 0)
            {
                $type = 2;
                $url = '139.224.59.235:1338/order/getopenorderwithuserid.json?Id='.$id.'&Page='.$page.'&Size='.'8&Type='.$type;
                $count_url = '139.224.59.235:1338/order/getopenorderwithuserid.json?Id='.$id.'&Page=1&Size=20&Type='.$type;
            }
            else if($index == 1)
            {
                $type = 1;
                $url = '139.224.59.235:1338/order/getopenorderwithuserid.json?Id='.$id.'&Page='.$page.'&Size='.'8&Type='.$type;
                $count_url = '139.224.59.235:1338/order/getopenorderwithuserid.json?Id='.$id.'&Page=1&Size=20&Type='.$type;
            }
            else if($index == 2)
            {
                $url = '139.224.59.235:1338/profile/'.$id.'/question.json?Page='.$page.'&Size='.'8&questionStatus=1';
                $count_url = '139.224.59.235:1338/profile/'.$id.'/question.json?Page=1&Size=20&questionStatus=1';
            }

           // $type = $_GET['Type'];
            $curl = curl_init(); 
            $header = array ("Authorization:AppFrame 2-693ad9c3d0c54adf87fed7cf6dc44f3f");

            curl_setopt($curl, CURLOPT_URL, $count_url); 
          // echo '139.224.59.235:1337/contact/'.$id.'/first.json'; 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            // 设置header 响应头是否输出
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            $info = json_decode($ret,true);
            $html = '';
            $count = 0;
            if($info  && array_key_exists('Data', $info))
            {
                $data = $info['Data'];
                $count = count($data);
                if($count > 6 && $page != 1)
                {
                    // 设置你需要抓取的URL 
                    curl_setopt($curl, CURLOPT_URL, $url); 
                  // echo '139.224.59.235:1337/contact/'.$id.'/first.json'; 
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                    // 设置header 响应头是否输出
                    curl_setopt($curl, CURLOPT_HEADER, 0); 
                    // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
                    // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
                    // 运行cURL，请求网页 
                    $ret = curl_exec($curl); 
                    
                    curl_close($curl); 
                    $info = json_decode($ret,true);
                }
                if($info && array_key_exists('Data', $info))
                {
                    $data  = $info['Data'];
                    $temp = 0;
                    foreach ($data as $order) {
                        $temp += 1;
                        if($temp > 6)
                            break;
                        $html .= '<li class="row">
                            <p>
                                <span class="ordertitle">'.$order["Title"].'</span>
                                <span class="orderreward">¥'.$order["Bounty"].'</span>
                            
                                
                            </p> 
                        </li>';
                       // echo $html;
                    }
                     return  \yii\helpers\Json::encode(array('html'=>$html, 'count'=>$count));

               # var_dump($info['Data']);
                }

            }
            else 
            {
                return  \yii\helpers\Json::encode(array('html'=>$html, 'count'=>$count));
                 // return  $html;
            }

        }

    }

    public function actionGetmidman()
    {
        if(isset($_GET['id']))
        {
            $selfid = Yii::$app->user->identity->attributes['Id'];
            $id = $_GET['id'];
            $curl = curl_init(); 
            $header = array ("Authorization:AppFrame ".Yii::$app->user->identity->attributes['AuthToken']);
            // 设置你需要抓取的URL 
            curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1338/contact/'.$selfid.'/middleman.json?FriendId='.$id); 
          // echo '139.224.59.235:1337/contact/'.$id.'/first.json'; 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            // 设置header 响应头是否输出
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            
            curl_close($curl); 
            $info = json_decode($ret,true);
            $data  = $info['Data'];
           // var_dump($data);
            return  \yii\helpers\Json::encode(array('data'=>$data));
        }

    }


}
