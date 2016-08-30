
    <link type="text/css" rel="Stylesheet" href="/css/Base/PageBase.css" />
    <link type="text/css" rel="Stylesheet" href="/css/News/Page.css" />
    <script type="text/javascript" src="/javascript/Base/jquery.js"></script>
    <script type="text/javascript" src="/javascript/Base/PageBase.js"></script>
    <script type="text/javascript" src="/javascript/News/Page.js"></script>

        <div class="middle">
            <h3><?php echo $article->title ?></h3>     
            <div class="show">
                <span>来源：</span>
                <em>华谊</em>
                <span>作者：</span>
                <em>华谊</em>
                <span>发布日期：</span>
                <em><?php echo $article->createTime?></em>
                <tt><script type="text/javascript" src="../VisitRead-ID=12001504150000.aspx.html"></script></tt>
                <span>次阅读</span>
                <input id="NID" type="hidden" value="12001504150000" />
                <input id="PN" type="hidden" value="1" />
            </div>
            <div class="text"><?php  echo $article->content ?></div>
           <div class="read">
            <div class="page">&nbsp;</div>
            <div class="fun"> 
                <span>&nbsp;</span> 
                <em onclick="window.scrollTo(0, 0);" class="r_print">返回顶部</em>|
                <em onclick="window.print();" class="r_print">打印本页</em>|
                <em onclick="window.opener = null;window.close();" class="r_click">关闭窗口</em> 
            </div> 
           </div>
            <div class="tag">
                <span>标签：</span>
                <span><span class="spTag" onclick="searchTag('华谊')">华谊</span></span>
            </div>
        </div>
    
﻿
<!-- Localized -->