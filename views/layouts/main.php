  
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>
<?php $this->beginPage() ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="description" content="友帮网">
<meta name="author" content="">
<title>友帮网</title>
 
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--link href="css/bootstrap2.min.css" rel="stylesheet"-->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="css/general.css" rel="stylesheet">
 
<link href="css/custom.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/particle-network.css" rel="stylesheet">
<link href="css/discuss.css" rel="stylesheet">
<link rel="stylesheet" href="css/magnific-popup.css">
<script type="text/javascript" src=" /js/jquery-2.1.1.min.js"></script>
<script src="js/modernizr-2.6.2.min.js"></script> 
<script src="js/jquery.bootpag.min.js"></script> 
</head>
<body id="home">
 
<div id="preloader">
<div id="status"></div>
</div>
 
<div class="intro-header" id="particle-canvas">

<div class="col-xs-12 text-center abcen1">
<h1 class="h1_home wow fadeIn" data-wow-delay="0.4s">友帮网</h1>
<h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">连接我们的资源</h3>
<ul class="list-inline intro-social-buttons">
</li>
<li id="download"><a href="#screen" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.2s"><span class="network-name">点击下载APP</span></a>
</li>
</ul>
</div>
 
<div class="col-xs-12 text-center abcen wow fadeIn">
<div class="button_down ">
<a class="imgcircle wow bounceInUp" data-wow-duration="1.5s" href="#whatis"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a>
</div>
</div>
</div>
 
<nav class="navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#home">友帮网</a>
</div>
<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
<ul class="nav navbar-nav">
<li class="menuItem"><a href="#whatis">什么是友帮</a></li>
<li class="menuItem"><a href="#useit">关于我们</a></li>
<li class="menuItem"><a href="#screen">下载</a></li>
<li class="menuItem"><a href="#contact">联系我们</a></li>
<li class="menuItem"><a href="#discuss">说点什么</a></li>
</ul>
</div>
</div>
</nav>
 
<div id="whatis" class="content-section-b" style="border-top: 0">
<div class="container">
<div class="col-md-6 col-md-offset-3 text-center wrap_title">
<h2>什么是友帮</h2>

<p class="lead" style="margin-top:0"></p>
</div>
<div class="row">
<div class="col-sm-4 wow fadeInDown text-center">
<img class="rotate" src="img/life.png" height="110" width="110"  alt="Generic placeholder image">
<h3>衣食住行</h3>
<p class="lead">帮你搜罗周围的好吃、好玩儿，解决各种生活小问题</p>
 
</div> 
<div class="col-sm-4 wow fadeInDown text-center">
<img class="rotate" src="img/peoplefinder.png" height="110" width="110" alt="Generic placeholder image">
<h3>找人</h3>
<p class="lead">帮您发布招工、寻人帮忙信息，找到靠谱的小伙伴</p>
 
</div> 
<div class="col-sm-4 wow fadeInDown text-center">
<img class="rotate" src="img/business.png" height="110" width="110" alt="Generic placeholder image">
<h3>工作商务</h3>
<p class="lead">帮你解决工作难题，抓住商业契机</p>
</div> 

</div> 
<div class="row tworow">
<div class="col-sm-4  wow fadeInDown text-center">
<img class="rotate" src="img/exchange.png" height="110" width="110"  alt="Generic placeholder image">
<h3>资源共享</h3>
<p class="lead">资源分享，信息交换，惠利你我他</p>
 
</div> 
<div class="col-sm-4 wow fadeInDown text-center">
<img class="rotate" src="img/secondhand.png" height="110" width="110"  alt="Generic placeholder image">
<h3>二手转让</h3>
<p class="lead">帮你发布需要转让以及希望找到的二手货源（房、车……）的信息</p>
 
</div> 
<div class="col-sm-4 wow fadeInDown text-center">
<img class="rotate" src="img/more.png" height="110" width="110" alt="Generic placeholder image">
<h3>更多</h3>
<p class="lead">只要您有需求，通过我们的平台都能解决</p>
 
</div> 
</div> 
</div>

</div>
<hr class="seperator" />
<div id="useit" class="content-section-a section-yuanjing">
<div class="container">
<div class="row">
<div class="col-sm-6 pull-right wow fadeInRightBig">
<img class="img-responsive " src="img/World_Map_Icon.png" alt="">
</div>
<div class="col-sm-6 wow fadeInLeftBig" data-animation-delay="200">
<h2 class="section-heading">愿景</h2>
<div class="sub-title lead3"></div>
<p class="lead">
我们致力于打造一个朋友之间互帮互助的平台，在这个平台里有各行各业的人才和精英有任何需要别人帮忙的或者是能帮别人解决的，都可以通过有偿或者无偿的方式在这里得到实现。同时这也是一个渠道/信息平台，通过这个平台，大家可以实现能力、资源、时间的共享。

</div>
</div>
</div>

</div>
<hr class="seperator" />

<div id="screen" class="content-section-b section-xiazai ">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 text-center wrap_title">
<h2>下载</h2>

<p class="lead" style="margin-top:0"></p>
</div>
<div class="row">
<div class="col-sm-4 wow fadeInDown text-center">
<img class="" src="img/iosqrcode.png" height="200" width="200"  alt="Generic placeholder image">
<h3><a href="https://itunes.apple.com/us/app/you-wen-you-bang/id1125870151?l=zh&ls=1&mt=8">ios版</a></h3>

</div>


</div>
</div>
</div>

</div>
<hr class="seperator" />
 
<div id="contact" class="content-section-a">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 text-center wrap_title">
<h2>联系我们</h2>
<p class="lead" style="margin-top:0"></p>
</div>
<form  id="contactForm1" role="form" action="index.php?r=site/email" method="post">
<div class="col-md-6">
<div class="form-group">
<label for="InputName">Your Name</label>
<div class="input-group">
<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
</div>
</div>
<div class="form-group">
<label for="InputEmail">Your Email</label>
<div class="input-group">
<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required>
<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
</div>
</div>
<div class="form-group">
<label for="InputMessage">Message</label>
<div class="input-group">
<textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
</div>
</div>
<input type="submit" name="submit" id="submit" value="Submit" class="btn wow tada btn-embossed btn-primary pull-right">
</div>
</form>

<div class="col-md-5 col-md-push-1 address">
<address>
<h3>公司地址</h3>
<p class="lead">浙江省杭州市江干区艮山西路102号杭州创意设计中心B幢3027室<br>
微信: you_qiubiying<br>
邮箱: contact@ubangwang.com</p>
</address>
</div>
</div>
</div>

</div>
<hr class="seperator" />

<script type="text/javascript">
    var frm = $('#contactForm1');
    frm.submit(function (ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert('ok');
            }
        });

        ev.preventDefault();
    });
</script>

 <?php echo $content; ?>
<div id="footer"><div class="section bg footer">
    <p>杭州烛龙科技有限公司 2016 © 版权所有</p>
    <p><img class="" src="img/beian.jpg" height="20" width="20"  alt="Generic placeholder image">浙公网安备 33010402002536号</p>
</div>
<script>
    var _hmt = _hmt || [];
    (function() {
    var hm = document.createElement("script");
    hm.src = "//hm.baidu.com/hm.js?5346617a684de92c86ffde20e3585b65";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
    })();
</script>
</div>
 
<footer>footer</footer>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/script.js"></script>
 
<script src="js/stickUp.min.js"></script>
<script src="js/particle-network.min.js"></script>

<script type="text/javascript">
    jQuery(function($) {
    $(document).ready( function() {
      $('.navbar-default').stickUp();

      var canvasDiv = document.getElementById('particle-canvas');
      var options = {
        particleColor: '#fff',
      
        interactive: true,
        speed: 'medium',
        density: 'medium'
      };
      var particleCanvas = new ParticleNetwork(canvasDiv, options);
          
function footerPosition(){
        $("footer").removeClass("fixed-bottom");
        var contentHeight = document.body.scrollHeight,//网页正文全文高度
            winHeight = window.innerHeight;//可视窗口高度，不包括浏览器顶部工具栏
        if(!(contentHeight > winHeight)){
            //当网页正文高度小于可视窗口高度时，为footer添加类fixed-bottom
            $("footer").addClass("fixed-bottom");
        } else {
            $("footer").removeClass("fixed-bottom");
        }
    }
    footerPosition();
    $(window).resize(footerPosition);


	});
          
	

	});
  </script>
 
<script type="text/javascript" src="js/jquery.corner.js"></script>
<script src="js/wow.min.js"></script>
<script>
   new WOW().init();
  </script>
<script src="js/classie.js"></script>
<script src="js/uiMorphingButton_inflow.js"></script>
 
<script src="js/jquery.magnific-popup.js"></script>
</body>
</html>
<?php $this->endPage() ?>
<!-- Localized -->
