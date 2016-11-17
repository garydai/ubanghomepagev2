<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php $this->beginContent('@app/views/layouts/header.php'); ?>
<?php $this->endContent(); ?>

<body>


<div class="wrap">

<header class="header">
    <div class="menu clear">
        <a class="logo" href="/">
            <img src="/img/brand.png"  alt="logo"/>
        </a>
        <i class="menu_mobile" onclick="menu_mobile_switch(this);"></i>
        <div class="blockeasing-warpp">
            <ul class="blockeasing">
            
                <li <?php if( strpos( Yii::$app->request->getUrl(), 'site' ) !== false || Yii::$app->request->getUrl() == "/") echo 'class=" current"';?> >
                    <span class="menu_hover"></span>
                    <a href="/">首页</a>
                </li>
                
                 <li <?php if(strpos( Yii::$app->request->getUrl(), 'relationship') !== false) echo 'class=" current"';?>>
                    <span class="menu_hover"></span>
                    <a href="/index.php?r=relationship">我的帮友</a>
                </li>
                
                <li <?php if(strpos( Yii::$app->request->getUrl(), 'contact') !== false) echo 'class=" current"';?>>
                    <span class="menu_hover"></span>
                    <a href="/index.php?r=contact">关于友帮</a>
                </li>
                
            </ul>
            <div class="login" >
                    
                    <?php if(!Yii::$app->user->isGuest) echo  '<a href="/index.php?r=login/logout">登出</a>'; else echo '<a href="/index.php?r=login/login"><img src="../img/login.png"></a>'; ?>
            </div>
        </div>
    </div>
</header>



    <div class="view">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
      
        <?= $content ?>
    </div>


<?php $this->beginContent('@app/views/layouts/footer.php'); ?>
<?php $this->endContent(); ?>

</div>

<script type="text/javascript">

$(".nav_menu").click(function(event){
       //event就是点击对象
       console.log(2);
});
</script>

</body>
</html>
<?php $this->endPage() ?>