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
            <img src="http://www.miservice.cn/common/images/cache/logo225X45.png" width="225" height="45" alt="logo"/>
        </a>
        <i class="menu_mobile" onclick="menu_mobile_switch(this);"></i>
        <div class="blockeasing-warpp">
            <ul class="blockeasing">
                <li class="current">
                    <span class="menu_hover"></span>
                    <a href="/">首页</a>
                </li>
                <li >
                    <span class="menu_hover"></span>
                    <a href="/statistics/index.html">域名报表</a>
                </li>
                <li >
                    <span class="menu_hover"></span>
                    <a href="/product/index.html">我的Mi</a>
                </li>
                <li >
                    <span class="menu_hover"></span>
                    <a href="/domain/index.html">Mi查询</a>
                </li>
                <li >
                    <span class="menu_hover"></span>
                    <a href="/article/index.html">关于域名</a>
                </li>
                <li >
                    <span class="menu_hover"></span>
                    <a href="/about/index.html">关于我们</a>
                </li>
            </ul>
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


</body>
</html>
<?php $this->endPage() ?>