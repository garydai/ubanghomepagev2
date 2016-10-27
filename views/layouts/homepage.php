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
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->beginContent('@app/views/layouts/header.php'); ?>
	<?php $this->endContent(); ?>
</head>
<body>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/img/brand.png"; class="img-responsive">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '什么是友帮', 'url' => ['/site/about']],
        ['label' => '我的帮友', 'url' => ['/site/contact']],
        ['label' => 'APP下载', 'url' => ['/site/contact']],
        ['label' => '关于友帮', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
       // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
      
        <?= $content ?>
    </div>
</div>

<?php $this->beginContent('@app/views/layouts/footer.php'); ?>
<?php $this->endContent(); ?>




</body>
</html>
<?php $this->endPage() ?>