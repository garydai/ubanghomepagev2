
    <link type="text/css" rel="Stylesheet" href="../css/News/Default.css" />
    <script type="text/javascript" src="../javascript/News/Default.js"></script>
    <div class="middle">
    <div class="left"><div class="banner"><a href="http://www.hbstars.com/News/20150415/1504150000.shtml" target="_blank"><img src="http://www.hbstars.com/UserFile/News/2015/04/15/164322501.jpg" alt="" border="0" /></a></div>
        



<?php for ($i = 5*($page-1); $i < count($news) && $i < 5*$page; $i ++) {?>
    <h3 class="new_title">
<a href="<?php echo '/index.php?r=news/article&id='."{$news[$i]->id}" ?>" target="_blank"><?php echo $news[$i]->title?></a></h3>
<div class="show"><span class="data"><?php echo $news[$i]->createTime ?></span>|
<span class="num"><script type="text/javascript" src="x"></script></span>x次阅读</div>
<div class="text"><?php echo mb_substr(strip_tags($news[$i]->content), 0, 100, "utf-8");?></div>
<div class="read">
<span>Tag：</span>
<span class="tagSpan" onclick=""></span>
<a href="http://www.hbstars.com/News/20150415/1504150000.shtml" target="_blank">阅读全文..</a>
</div>
<?php }?>

<div class="lc_B">
<div class="lc_P_Page_Area">
<div class="lc_P_Page_Pre_No">《</div>

<?php $pageCount = ceil(count($news)/5) ; for($i = 0; $i < $pageCount && $i < 6; $i++) { if($i + 1 == $page ) {?>
<div class="lc_P_Page_Num_Cur1"><?php echo $page?></div><?php continue;}?>
<div class="lc_P_Page_Num1" onmouseover="this.className='lc_P_Page_Num_Act1';" onmouseout="this.className='lc_P_Page_Num1';" onclick=" <?php $t = $i + 1;echo 'window.location='."'".'/index.php?r=news/index&page='."{$t}"."';"?>" > <?php echo $i + 1 ?></div>
<?php }?>
<?php   if($pageCount > 8){?>
<div class="lc_P_Page_Num_Dot">...</div>
<?php }?>
<?php if($pageCount >8) for($i = $pageCount - 1; $i < $pageCount; $i ++){?>
<div class="lc_P_Page_Num2" onmouseover="this.className='lc_P_Page_Num_Act2';" onmouseout="this.className='lc_P_Page_Num2';" onclick="window.location='Default_10.shtml';"><?php echo $i + 1?></div>
<?php }?>
<div class="lc_P_Page_Next" onmouseover="this.className='lc_P_Page_NextActived';" onmouseout="this.className='lc_P_Page_Next';" onclick="window.location='Default_1.shtml';">》</div>
<div class="lc_P_PageChange">到第<input id="_Input" type="text" class="lc_P_PageNumber" value='<?php echo $page;?>' maxPN="<?php echo ceil(count($news)/5);?>" curPN="<?php echo $page;?>" />页<span class="btn_out_page" onmouseover="this.className='btn_over_page'" onmouseout="this.className='btn_out_page'" onclick="changePageNumber();" >确定</span></div>
</div>
</div></div>
        <div class="right">            
                <h3>新闻搜索</h3>
             <div class="r_type">
                <input id="SchIpt" type="text" value="请输入关键字..." class="schIptNor" maxlength="20" />
                <span id="SchBtn" class="btnNor">搜索</span>
            </div>
           ﻿<h3>热点新闻</h3>
<div class="r_type">
<ul>

</ul></div>
           
        </div><br class="clear" />   
    </div>
</div>﻿