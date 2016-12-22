<link href="css/spinners.css" rel="stylesheet">
<div class="cover" style="position:absolute;">
    <div class="dots-loader"></div>

</div>
<div class="relationship-content" ondragstart="return false;" ondrop="return false;" unselectable="on" style="-moz-user-select:none;-webkit-user-select:none;" onselectstart="return false;">

    <div class="relationship-bg"> 




         <!-- 代码部分begin -->
        <!--
            r = 460px
            圆形菜单[最多容纳8个最大正方形菜单块, 若需容纳更多的菜单块,则需要缩小菜单块的大小]
            半径 oR = 150px;
            圆心坐标(150,150)
        -->
        <div id="relationship" class="section-relationship ">
       
            <div id="outerDiv" >
                <div id="friend">                   
                </div>           
                <div class = "mine test" style="width: 200px;height: 200px;position: absolute;left:360px;top:360px;">
                </div>
               
            </div>
            <div class="userinfo-bg">
                
            </div> 

            <div class="userinfo-spec">
                <div class="avatar"></div>
                <div class="name"></div>
                <div class="gender"></div>
                <div class="user-relationship"></div>
                <div class="midman">
                    <div class="midman-title">中间人：</div>
                    
                    <div class="midman-avatar"></div>
                    <div class="midman-name"></div>
                </div>
            </div>
            
            <div class="userinfo-order">
                <div class="boss" onclick="sclick(0)"><div class="title">Ta的求助</div><img class="arrow" src="img/relationship-arrow.png"></div>
                <div class="worker" onclick="sclick(1)"><div class="title">Ta的助人</div><img class="arrow" src="img/relationship-arrow.png"></div>
                <div class="qna" onclick="sclick(2)"><div class="title">Ta的提问</div><img class="arrow" src="img/relationship-arrow.png"></div>
                
            </div>
           
            <div class="orderlist">
                <ul class="order list-unstyled board">
                </ul>
                
            </div>
            <div id="listpage"></div>
            <div class="goback" onclick="back()"></div>

  
        </div>
         
        

        <div id='center' style="visibility:hidden;">
        </div>
        <div id='selectid' style="visibility:hidden;"><?php echo $userId?></div>
        <div id='selectindex' style="visibility:hidden;">0</div>
        <div id='totalpage' style="visibility:hidden;">1
        </div>
        <div id='curpage' style="visibility:hidden;">1
        </div>
        <div id='selecttype' style="visibility:hidden;">0
        </div>
        <div id='mouseleft' style="visibility:hidden;">0
        </div>
       
        <!-- 代码部分end -->

    </div>


 <script type="text/javascript">

            
    function hit(ev, right_c, right_o, left_c, left_o) {

       // var or = 300;//区域ban'jing
       // var ir = 100;
       // var mWidth = 108;
       // var mDLen = Math.sqrt(2 * Math.pow(mWidth,2));
        // 判断当前鼠标是否在小球内
      //  mx = e.screenX;
      //  my = e.screenY;
        var or = 460;
        var len = 380;
        var r1 = 65;
        var r2 = 100;
        var e = ev || window.event;
        var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
        var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
        var mx = e.pageX || e.clientX + scrollX;
        var my = e.pageY || e.clientY + scrollY;

        
        for(var i = 0; i < right_c.length; i ++)
        {
            var x = $(".m"+right_o[i]).offset().left + r1;
            var y = $(".m"+right_o[i]).offset().top + r1;
            console.log("x= " +mx + "y= " + my);
            console.log("xx="+$(".m"+right_o[i]).offset().left+ "y="+$(".m"+right_o[i]).offset().top);
            if(Math.pow(mx - x, 2) + Math.pow(my - y, 2) <= Math.pow(r1, 2)) 
                return right_o[i];
        
        }
        for(var i = left_c.length -1; i >= 0; i --)
        {
            var x = $(".m"+left_o[i]).offset().left + r1;
            var y = $(".m"+left_o[i]).offset().top + r1;
            if(Math.pow(mx - x, 2) + Math.pow(my - y, 2) <= Math.pow(r1, 2)) 
                return left_o[i];
        
        }
        var xx = $(".m0").offset().left + r2;
        var yy = $(".m0").offset().top + r2;
        if(Math.pow(mx - xx, 2) + Math.pow(my - yy, 2) <= Math.pow(r2, 2)) 
                return 0;
        return -1;

    }
    function showPanel(json)
    {

        var result = jQuery.parseJSON(json); 
        var data = result.data;
        var user = result.user;
        $("#center").html(user.Id);

        $("#friend").children().remove();
        $(".mine").children().remove();
        for(var i = 0; i < data.length; i ++)
        {
            if(!data[i].hasOwnProperty('Avatar'))
                var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
            else 
                var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + data[i].Avatar;
            z = (i + 1) * 2 - 1;
            $("#friend").append('<div class="group"><div class="m' + (i+1)  + ' m'+ (i + 1)+'normal normal animate" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; width:130px;height:130px;border-radius: 65px;z-index:' + z + '" ></div><div class="m' + (i+1)  + ' '+ 'm' + (i+1)  +'mask animate mask" style="position: absolute; background-color: rgba(255, 255, 255, 0.6);background-size: 100% 100%; background-repeat: no-repeat; width:140px;height:140px;border-radius: 70px;margin-top: -5px;margin-left: -5px; z-index:' + z + '"></div></div>');
            
        }

        if(!user.hasOwnProperty('Avatar'))
                var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
            else 
                var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + user.Avatar;

        $(".mine").append('<div class="m0bg" style="position: absolute; background-image: url(img/rotate.png);background-size: 100% 100%; background-repeat: no-repeat; width:359px;height:350px;margin-top: -78px;margin-left: -80px;z-index:-2"></div><div class="group"><div class="m0 m0normal normal animate" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 100px; width:200px;height:200px;z-index:100000"></div><div class="m0' + ' '+ 'm0mask animate mask" style="position: absolute; background-color: rgba(255, 255, 255, 0.6);background-size: 100% 100%; background-repeat: no-repeat; width:210px;height:210px;border-radius: 105px;margin-top: -5px;margin-left: -5px;z-index:100000"></div></div>');
        $(".mine").append("<p>" +user.Name + "</p>")

       // $(".group").children().css("z-index", 0);
        var z = parseInt($(".m"+$("#selectindex").html() + ".normal").css("z-index"));
        $(".m"+$("#selectindex").html() + ".normal").css("z-index", z + 1);
        
        $('.group').unbind("mouseenter").unbind("mouseleave");

        $(".group").hover(function(){
            if( $("#mouseleft").html() == 1)
                return ;
            var z = parseInt($(this).children(".normal").css("z-index"));
            $(this).children(".normal").stop().animate({"z-index": z + 1}, 0);
        }, function(){
          //  return ;
            if( $("#mouseleft").html() == 1)
                return ;
            var z = parseInt($(this).children(".normal").css("z-index"));
            $(this).children(".normal").stop().animate({"z-index": z - 1}, 0);

        });
        
        $(".avatar").css("background-image", 'url(http://7xldgj.com1.z0.glb.clouddn.com/' + user.Avatar + ')');
        $(".name").html(user.Name);
        if(user.Gender == '男')
            $(".gender").css("background-image", 'url(/img/male.png)');
        else 
            $(".gender").css("background-image", 'url(/img/female.png)');

        $(".midman-avatar").css("visibility", "hidden");
        $(".midman-name").css("visibility", "hidden"); 
        if($("#center").html() != <?php echo $userId?>)
        {
            $(".user-relationship").css("visibility", "visible");
            $(".user-relationship").css("background-image", 'url(/img/r1.png)'); 
            $(".midman-avatar").css("background-image", 'url(http://7xldgj.com1.z0.glb.clouddn.com/' + user.Avatar+ ')')
            $(".midman-name").html(user.Name); 
                 
            $(".goback").fadeIn(300);;
        }
        else
        {    
            $(".user-relationship").css("visibility", "hidden");
            $(".goback").hide();
        } 

        var or = 460;
        var ir = 100;
        var mWidth = 130;
        var len = 295;
        var mDLen = Math.sqrt(2 * Math.pow(mWidth,2));
        var count = data.length;
        var delt = Math.PI * 2 / count;
        var right_o = new Array();
        var right_c = new Array();
        var left_o = new Array();
        var left_c = new Array();
        var origin_right_c = new Array();
        var origin_left_c = new Array();
        var overlap = 0;
        if(count > 10)
        {

            for(var i = 1; i <= 3; i ++)
            {
                delt = Math.PI / 4;
                var x = parseInt( (Math.cos( delt *(2 - i) ) * len) + or - mWidth/2 );
                var y = parseInt( (Math.sin(  delt *(2 - i) ) *  len) + or - mWidth/2 );
              //  $(".m"+i).width(mWidth);
               // $(".m"+i).height(mWidth);
                 $(".m"+i).css("left", x);
                $(".m"+i).css("top", y);
              //  $("#m"+i).offset({top:y, left:x});
                right_o.push(i);
                right_c.push( delt *(2 - i));
                origin_right_c.push( delt *(2 - i));
            }
            for(var i = 4; i <= count ; i ++)
            {
                delt = Math.PI /(count-3 - 1);
                var x = parseInt( (Math.cos( -Math.PI/2 - delt * (i - 4) ) *  len ) + or - mWidth/2 );
                var y = parseInt( (Math.sin( -Math.PI/2 - delt * (i - 4) ) *  len ) + or - mWidth/2 );
               // $(".m"+i).width(mWidth);
                //$(".m"+i).height(mWidth);
                 $(".m"+i).css("left", x);
                $(".m"+i).css("top", y);
              //  $("#m"+i).offset({top:y, left:x});
                left_o.push(i);
                left_c.push(-Math.PI/2 - delt * (i - 4));
                origin_left_c.push(-Math.PI/2 - delt * (i - 4));

            }
            
            overlap = 1;
           
        }
        else 
        {
            for(var i = 1; i <= count; i ++)
            {
                var x = parseInt( (Math.cos( delt *(i - 1) ) * len )  - mWidth/2  + or);
                var y = parseInt( (Math.sin(  delt *(i - 1) ) * len )  - mWidth/2  + or);
               
                $(".m"+i).css("left", x);
                $(".m"+i).css("top", y);
                right_o.push(i);
                right_c.push(delt *(i - 1));

            }
        }
        var x = (Math.cos( right_c[i] ) *  (ir + ((or - ir)/2) ) ) + or;//Math.cos( right_c[i]);
        var y = (Math.sin( right_c[i] ) *  (ir + ((or - ir)/2) ) ) + or;//Math.sin( right_c[i]);
        //===============================================

        var preX,preY;//上一次鼠标点的坐标
        var curX,curY;//本次鼠标点的坐标
        var preAngle;//上一次鼠标点与圆心(150,150)的X轴形成的角度(弧度单位)
        var transferAngle;//当前鼠标点与上一次preAngle之间变化的角度

        var a = 0;
        var b = 0;
        var anti = -1;
        var preAnti = -1;

        $('#outerDiv').unbind('dblclick').click(function () {

        });
        $('#outerDiv').dblclick(function(event) {

             // alert('Handler for .dblclick() called.');
            if($("#center").html() != <?php echo $userId?>)
                return ;
            var index = hit(event, right_c, right_o, left_c, left_o);
            
            if(index != -1)
            {
                if(overlap == 1)
                {
            //        if(index >3)
              //          return ;
                }
                if(index != 0)
                {

                    $.ajax({
                        type: "get",
                        url: "/index.php?r=relationship/friend",
                        data:{"id":data[index - 1].Id},
                        beforeSend:function(){
                            $(".cover").show();
                        },
                        complete:function(){
                            $(".cover").hide();
                        },

                        success: function(json) {
                           // window.alert(html);
                            $("#selectindex").html(0);
                        //    console.log("12121" + json);
                            showPanel(json);


                        }
                    });
                }
                
            }

             

        }); 

        

        $('#outerDiv').unbind('mousedown').click(function () {

        });

        //点击事件
        $("#outerDiv").mousedown(function(event){

            if(event.which != 1)
                return false;
            $("#mouseleft").html(1);
            preX = event.clientX;
            preY = event.clientY;
            var cx = $(".m0").offset().left + 100;
            var cy = $(".m0").offset().top + 100;
            var index = hit(event, right_c, right_o, left_c, left_o);
            console.log(index);
            
            
        
            if(index != -1)
            {
                console.log($("#center").html());
                console.log(<?php echo $userId?>);
                //二度好友
                if($("#center").html() != <?php echo $userId?>)
                {
                    if(index != 0)
                        $(".user-relationship").css("background-image", 'url(/img/r2.png)');
                    else 
                        $(".user-relationship").css("background-image", 'url(/img/r1.png)');
                }
                else 
                {
                    $(".midman-avatar").css("visibility", "hidden");
                    $(".midman-name").css("visibility", "hidden"); 
                    $(".user-relationship").css("background-image", 'url(/img/r1.png)');
                }
                var selectid;
                if(index == 0)
                    selectid = $("#center").html();
                else 
                    selectid = data[index - 1].Id;
                if(selectid != parseInt($("#selectid").html()))
                {
                    $(".userinfo-order").children().removeClass('selected');
                    $(".board").html("");
                    $("#listpage").hide();
                }
                
               // $(".group").children().css("z-index", 0);
               console.log($("#selectindex").html());
               if(parseInt($("#selectindex").html()) != index )
               {
                    var z = parseInt($(".m" + $("#selectindex").html() + "normal").css("z-index"));
                    $(".m" + $("#selectindex").html() + "normal").stop().animate({"z-index": z - 1}, 0);
                    var z = parseInt($(".m" + index + "normal").css("z-index"));
                    $(".m" + index + "normal").stop().animate({"z-index": z + 1}, 0);
                   // $(".m"+index + "mask").css("z-index", -10);
                  //  console.log($(".m"+index + " mask animate"));
                    $("#selectid").html(selectid);
                    $("#selectindex").html(index);
               }
                
                if(index == 0)
                {
                    $(".name").html(user.Name);

                    $(".midman-avatar").css("visibility", "hidden");
                    $(".midman-name").css("visibility", "hidden");       
                    
                    if(user.Gender == '男')
                        $(".gender").css("background-image", 'url(/img/male.png)');
                    else 
                        $(".gender").css("background-image", 'url(/img/female.png)');
                    if(user.Id == <?php echo $userId?>)
                    {
                        $(".user-relationship").css("visibility", "hidden");
                    }
                    else 
                       $(".user-relationship").css("visibility", "visible");
                    if(!user.hasOwnProperty('Avatar'))
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                    else 
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + user.Avatar;
                    $(".avatar").css("background-image", 'url(' + avatar + ')');
                }
                else 
                {
                    if($("#center").html() != <?php echo $userId?>)
                    {
                        $(".midman-avatar").css("visibility", "visible");
                    $(".midman-name").css("visibility", "visible"); 
                    }
                       
                    if(data[index - 1].Id == <?php echo $userId?>)
                    {
                        $(".user-relationship").css("visibility", "hidden");
                    }
                    else 
                        $(".user-relationship").css("visibility", "visible");
                    if(data[index - 1].FNickName)
                    {
                        $(".name").html(data[index - 1].FNickName + "(" + data[index - 1].Name + ")");
                    }
                    else 
                        $(".name").html(data[index - 1].Name);
                    if(data[index - 1].Gender == '男') 
                        $(".gender").css("background-image", 'url(/img/male.png)');
                    else 
                        $(".gender").css("background-image", 'url(/img/female.png)');
                    if(!data[index - 1].hasOwnProperty('Avatar'))
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                    else 
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + data[index - 1].Avatar;
                    

                    $(".avatar").css("background-image", 'url(' + avatar + ')');

                }
                
            }
            //计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
            preAngle = Math.atan2(preY - cy, preX - cx);

            $('#html').unbind('mousemove').click(function () {

            });
            //移动事件
            $("html").mousemove(function(event){

             //   console.log(1212);
                curX = event.clientX;
                curY = event.clientY;

                //计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
                var curAngle = Math.atan2(curY - cy, curX - cx);
                transferAngle = curAngle - preAngle;
                if(transferAngle >= Math.PI )
                    transferAngle -= Math.PI * 2;
                if(transferAngle <= -Math.PI)
                    transferAngle += Math.PI * 2;
                if(transferAngle < 0)
                    anti = 1;
                else if(transferAngle > 0)
                    anti = 0;
                a = (transferAngle * 180 / Math.PI)/100;
                b = a * 4.0 / 9.0;
                var antiCross = 0;
                var clockwiseCross = 0;

                //逆时针
                if(Math.cos(right_c[right_c.length - 1]) * Math.cos(right_c[right_c.length - 1] + a) < 0 && Math.sin(right_c[right_c.length - 1] < 0))
                {
                    antiCross =1;
                }
                else if(Math.cos(right_c[0]) * Math.cos(right_c[0] + a) < 0 && Math.sin(right_c[0]) > 0)
                {
                    clockwiseCross = 1;
                }
                for(var i = 0; i < right_o.length; i++) 
                {
                  

                    var x = parseInt( (Math.cos( right_c[i] + a) *  len ) + or - mWidth/2 );
                    var y = parseInt( (Math.sin( right_c[i] + a) *  len ) + or - mWidth/2 );
                   // $("#m"+right_o[i]).offset( {top:y,left:x} );
                    $(".m"+right_o[i]).css("left", x);
                    $(".m"+right_o[i]).css("top", y);

                    right_c[i] += a;
                }

                for(var i = 0; i < left_o.length ; i++) 
                {
                //  console.log(left_c[i], Math.cos(left_c[i]),  Math.sin(left_c[i]));
                    var x = parseInt( (Math.cos( left_c[i] + b) *  len ) + or - mWidth/2 );
                    var y = parseInt( (Math.sin( left_c[i] + b) *  len ) + or - mWidth/2 );
                    if(i == left_o.length - 1 || i == 0)
                    {
                        //在第一象限
                        if(Math.cos(left_c[i]) >= 0)
                            left_c[i] += a;
                        else 
                            left_c[i] += b;
                    }
                    else 
                        left_c[i] += b;
                        $(".m"+left_o[i]).css("left", x);
                        $(".m"+left_o[i]).css("top", y);
                }

                if(overlap == 1)
                {


                    if(antiCross == 1)
                    {

                        right_c[right_o.length - 1] = -Math.PI / 2;
                        var tmp_right_o = right_o[right_o.length - 1];
                        var tmp_right_c = right_c[right_o.length - 1];
                        for(var i = right_o.length - 1; i > 0; i --)
                        {
                            right_o[i] = right_o[i - 1];
                            right_c[i] = origin_right_c[i];
                            x = parseInt( (Math.cos( right_c[i] ) *  len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( right_c[i] ) *  len ) + or - mWidth/2 );   
                            //$("#m"+right_o[i]).offset({top:y,left:x});
                            $(".m"+right_o[i]).css("left", x);
                            $(".m"+right_o[i]).css("top", y);
                        }
                        var tmp_left_o = left_o[left_o.length - 1];
                        var tmp_left_c = left_c[left_o.length - 1];
                        for(var i = left_o.length - 1; i > 0 ; i --)
                        {
                            left_o[i] = left_o[i - 1];
                            left_c[i] = origin_left_c[i];
                            x = parseInt( (Math.cos( left_c[i] ) *  len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( left_c[i] ) *  len ) + or - mWidth/2 );    
                           // $("#m"+left_o[i]).offset({top:y,left:x});
                            $(".m"+left_o[i]).css("left", x);
                            $(".m"+left_o[i]).css("top", y);
                        }
                        left_o[0] = tmp_right_o;
                        left_c[0] = origin_left_c[0];
                        x = parseInt( (Math.cos( left_c[0] ) * len ) + or - mWidth/2 );
                        y = parseInt( (Math.sin( left_c[0] ) * len ) + or - mWidth/2 );    
                     //   $("#m"+left_o[0]).offset({top:y,left:x});
                        $(".m"+left_o[0]).css("left", x);
                        $(".m"+left_o[0]).css("top", y);
                        right_o[0] = tmp_left_o;
                        right_c[0] = origin_right_c[0];
                        x = parseInt( (Math.cos( right_c[0] ) * len ) + or - mWidth/2 );
                        y = parseInt( (Math.sin( right_c[0] ) *  len ) + or - mWidth/2 );   
                        //$("#m"+right_o[i]).offset({top:y,left:x});
                        $(".m"+right_o[i]).css("left", x);
                        $(".m"+right_o[i]).css("top", y);
                    }
                    else if(clockwiseCross == 1 )
                    {
                        var tmp_right_o = right_o[0];
                        var tmp_right_c = right_c[0];
                        for(var i = 0; i < right_o.length - 1; i ++)
                        {
                            right_o[i] = right_o[i + 1];
                            right_c[i] = origin_right_c[i];
                            x = parseInt( (Math.cos( right_c[i] ) *  len) + or - mWidth/2 );
                            y = parseInt( (Math.sin( right_c[i] ) *  len ) + or - mWidth/2 );   
                          //  $("#m"+right_o[i]).offset({top:y,left:x});
                            $(".m"+right_o[i]).css("left", x);
                            $(".m"+right_o[i]).css("top", y);
                        }
                        var tmp_left_o = left_o[0];
                        var tmp_left_c = left_c[0];
                        for(var i = 0; i < left_o.length - 1; i ++)
                        {
                            left_o[i] = left_o[i + 1];
                            left_c[i] = origin_left_c[i];
                            x = parseInt( (Math.cos( left_c[i] ) *  len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( left_c[i] ) *  len ) + or - mWidth/2 );    
                          // $("#m"+left_o[i]).offset({top:y,left:x});
                            $(".m"+left_o[i]).css("left", x);
                            $(".m"+left_o[i]).css("top", y);
                        }
                        left_o[left_o.length - 1] = tmp_right_o;
                        left_c[left_o.length - 1] = origin_left_c[left_o.length - 1];
                        x = parseInt( (Math.cos( left_c[left_o.length - 1] ) *  len ) + or - mWidth/2 );
                        y = parseInt( (Math.sin( left_c[left_o.length - 1] ) *  len) + or - mWidth/2 );    
                       // $("#m"+left_o[left_o.length - 1]).offset({top:y,left:x});
                        $(".m"+left_o[left_o.length - 1]).css("left", x);
                        $(".m"+left_o[left_o.length - 1]).css("top", y);

                        right_o[right_o.length - 1] = tmp_left_o;
                        right_c[right_o.length - 1] = origin_right_c[right_o.length - 1];
                        x = parseInt( (Math.cos( right_c[right_o.length - 1] ) * len ) + or - mWidth/2 );
                        y = parseInt( (Math.sin( right_c[right_o.length - 1] ) * len ) + or - mWidth/2 );  
                        //$("#m"+right_o[right_o.length - 1]).offset({top:y,left:x});
                        $(".m"+right_o[right_o.length - 1]).css("left", x);
                        $(".m"+right_o[right_o.length - 1]).css("top", y);
                        a = 0;
                        b = 0;
                        
                    }
                }
                preX = curX;
                preY = curY;
                preAngle = curAngle;
                preAnti = anti;
            });
            //释放事件
            $("html").mouseup(function(event){
                $("html").unbind("mousemove");
                $("#mouseleft").html(0);
            });
        });
    }

    
    $(document).ready(function(){

        
        $.ajax({
            type: "get",
            url: "/index.php?r=relationship/friend",
            data:{"id":<?php echo $userId?>},
            beforeSend:function(){
                $(".cover").show();
            },
            complete:function(){
                $(".cover").hide();
            },
            success: function(json) {
               // window.alert(html);
                
                showPanel(json);


            }
        });
    });

    

    
</script>


<script type="text/javascript">  

    $(".cover").hide();
    $('#listpage').bootpag({

                total:3,
                maxVisible: 8,
                page:1
            }).on("page", function(event, /* page number here */ num){
                $.ajax({
                    type: "get",
                    url: "/index.php?r=relationship/openorder",
                    data:{"id":$("#selectid").html(), "index":$("#selecttype").html(), "page":num},
                    beforeSend:function(){
                        $(".cover").show();
                    },
                    complete:function(){
                        $(".cover").hide();
                    },
                    success: function(json) {
                       var j = JSON.parse(json);
                       // console.log(j.count);
                       // console.log(j.count);
                        //console.log(parseInt(j.count/8 + 1));
                       $('#listpage').bootpag({

                            total: parseInt(j.count/8 + 1),
                           
                        });

                       $("#totalpage").html(j.count);
                        if(j.count > 8)
                        {
                            $("#listpage").fadeIn(300);
                        }
                        else 
                        {
                             $("#listpage").hide();
                        }
                        $("#totalpage").html(j.count);
                        $(".board").html(j.html);


                    }
                });
            });

    
function back() {

    $.ajax({
            type: "get",
            url: "/index.php?r=relationship/friend",
            data:{"id":<?php echo $userId?>},
            beforeSend:function(){
                $(".cover").show();
            },
            complete:function(){
                $(".cover").hide();
            },
            success: function(json) {
               // window.alert(html);
                $("#selectindex").html(0);
                showPanel(json);


            }
        });

   // parent.location.reload();
}


function sclick(index) {


    $(".orderlist").hide();
    if(index == 0)
    {
       $(".boss").addClass("selected");
       $(".worker").removeClass("selected");
       $(".qna").removeClass("selected");
       $(".orderlist").css("margin-top", "-150px");
     
    }
    else if(index == 1)
    {
        $(".worker").addClass("selected");
        $(".boss").removeClass("selected");
        $(".qna").removeClass("selected");
        $(".orderlist").css("margin-top", "-100px");
    }
    else if(index == 2)
    {
        $(".qna").addClass("selected");
        $(".worker").removeClass("selected");
        $(".boss").removeClass("selected");
        $(".orderlist").css("margin-top", "-50px");
    }
    $("#curpage").html(1);
    $("#selecttype").html(index);
    $.ajax({
        type: "get",
        url: "/index.php?r=relationship/openorder",
        data:{"id":$("#selectid").html(), "index":index, "page":1},
        beforeSend:function(){
            $(".cover").show();
        },
        complete:function(){
            $(".cover").hide();
        },
        success: function(json) {
           // window.alert(html);
            $(".orderlist").fadeIn(1000);
            var j = JSON.parse(json);
         //   console.log(j.count);
           // console.log(j.count);
           // console.log(parseInt(j.count/8 + 1));
            $('#listpage').bootpag({

                total: parseInt(j.count/8 + 1),
               
            });

            $("#totalpage").html(j.count);
            if(j.count > 8)
            {
                $("#listpage").fadeIn(1000);;
            }
            else 
            {
                 $("#listpage").hide();
            }
            $("#totalpage").html(j.count);
            $(".board").html(j.html);
           // $(".board").fadeIn(1000);


        }
    });
    
    function loading(){ 
        $(".cover").show();
      //  $('#loading_img').html('<img src="images/loading.gif"/>'); 
    } 


    

}






</script>


   
</div>
    