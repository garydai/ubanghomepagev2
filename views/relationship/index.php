<div class="relationship-content" ondragstart="return false;" ondrop="return false;">

    <div class="relationship-bg"> 




         <!-- 代码部分begin -->
        <!--
            r = 460px
            圆形菜单[最多容纳8个最大正方形菜单块, 若需容纳更多的菜单块,则需要缩小菜单块的大小]
            半径 oR = 150px;
            圆心坐标(150,150)
        -->
        <div id="relationship" class="section-relationship ">
       
            <div id="outerDiv">
                <div id="friend">                   
                </div>           
                <div id = "mine" style="width: 240px;height: 240px;position: absolute;left:340px;top:340px;">
                </div>
               
            </div>
       
  
        </div>
         <div id="spec">
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
                var r1 = 80;
                var r2 = 120;
                var e = ev || window.event;
                var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
                var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
                var mx = e.pageX || e.clientX + scrollX;
                var my = e.pageY || e.clientY + scrollY;
              //  console.log(mx);
               // console.log(my);
              //  console.log(mx, my);
                for(var i = 0; i < right_c.length; i ++)
                {
                    var x = $("#m"+right_o[i]).offset().left + 80;
                    var y = $("#m"+right_o[i]).offset().top + 80;
                  //  $("#m"+left_o[0]).css("left", x);
                   // var x = (Math.cos( right_c[i] ) *  len ) + or ;//Math.cos( right_c[i]);
                   // var y = (Math.sin( right_c[i] ) * len ) + or;//Math.sin( right_c[i]);
                   // console.log(x, y);
                    if(Math.pow(mx - x, 2) + Math.pow(my - y, 2) <= Math.pow(r1, 2)) 
                        return right_o[i];
                
                }
                for(var i = 0; i < left_c.length; i ++)
                {
                    var x = $("#m"+left_o[i]).offset().left + 80;
                    var y = $("#m"+left_o[i]).offset().top + 80;

                  //  var x = (Math.cos( left_c[i] ) * len ) + or;//Math.cos( right_c[i]);
                   // var y = (Math.sin( left_c[i] ) *  len ) + or;//Math.sin( right_c[i]);

                    if(Math.pow(mx - x, 2) + Math.pow(my - y, 2) <= Math.pow(r1, 2)) 
                        return left_o[i];
                
                }
                var xx = $("#m0").offset().left + 120;
                var yy = $("#m0").offset().top + 120;
                if(Math.pow(mx - xx, 2) + Math.pow(my - yy, 2) <= Math.pow(r2, 2)) 
                        return 0;
                return -1;

            }
            function showPanel(json)
            {
                var result = jQuery.parseJSON(json); 
              //  console.log(result);
                var data = result.data;
                var user = result.user;
                $("#friend").children().remove();
                $("#mine").children().remove();
                for(var i = 0; i < data.length; i ++)
                {
                    if(!data[i].hasOwnProperty('Avatar'))
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                    else 
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + data[i].Avatar;
                    $("#friend").append('<div id="m' + (i+1)  + '" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 80px;"></div>');
                    
                }

                if(!user.hasOwnProperty('Avatar'))
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                    else 
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + user.Avatar;

                $("#mine").append('<div id="m0" style="position: relative; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 120px; width:240px;height:240px;"></div>');
                $("#mine").append("<p>" +user.Name + "</p>")
               // console.log('<div id="m0" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 54px; width:108px;height:108px;top:246px;left:246px"></div>');
                $("#spec").html("<p>昵称：" +user.Name + "</p>");
                $("#spec").append("<p>手机号码：" +user.Mobile + "</p>");
                

                var or = 460;
                var ir = 100;
                var mWidth = 160;
                var len = 380;
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
                        $("#m"+i).width(mWidth);
                        $("#m"+i).height(mWidth);
                         $("#m"+i).css("left", x);
                        $("#m"+i).css("top", y);
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
                        $("#m"+i).width(mWidth);
                        $("#m"+i).height(mWidth);
                         $("#m"+i).css("left", x);
                        $("#m"+i).css("top", y);
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
                       
                        $("#m"+i).width(mWidth);
                        $("#m"+i).height(mWidth);
                        $("#m"+i).css("left", x);
                        $("#m"+i).css("top", y);
                      //  $("#m"+i).position.top = y;
                       // $("#m"+i).position.left = x;
                        //$("#m"+i).offset({top:0, left:0});
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
                    var index = hit(event, right_c, right_o, left_c, left_o);
                  // console.log('test');
                    if(index != -1)
                    {
                        if(overlap == 1)
                        {
                            if(index >3)
                                return ;
                        }
                        if(index != 0)
                        {

                            $.ajax({
                                type: "get",
                                url: "/index.php?r=relationship/friend",
                                data:{"id":data[index - 1].Id},
                                success: function(json) {
                                   // window.alert(html);
                                    
                                    showPanel(json);


                                }
                            });
                        }
                        
                    }

                     

                }); 
                //点击事件
                $("#outerDiv").mousedown(function(event){

                    if(event.which != 1)
                        return false;

                    preX = event.clientX;
                    preY = event.clientY;
                    var cx = $("#m0").offset().left + 120;
                    var cy = $("#m0").offset().top + 120;
                   var index = hit(event, right_c, right_o, left_c, left_o);

                   if(index != -1)
                   {
                        if(index == 0)
                        {
                          //  console.log(user);
                            $("#spec").html("<p>昵称：" +user.Name + "</p>");
                            $("#spec").append("<p>手机号码：" +user.Mobile + "</p>");
                        }
                        else 
                        {
                            if(overlap == 0)
                            {
                                $("#spec").html("<p>昵称：" +data[index - 1].Name + "</p>");
                                $("#spec").append("<p>手机号码：" +data[index - 1].Mobile + "</p>");
                            //console.log(data[index - 1].Name);
                            }  
                            else 
                            {
                               // if(index <= 3)
                                //{
                                 //   $("#spec").html("<p>" +data[index - 1].Name + "</p>");
                               // }
                               // else 
                                //{
                                    $("#spec").html("<p>昵称：" +data[index - 1].Name + "</p>");
                                    $("#spec").append("<p>手机号码：" +data[index - 1].Mobile + "</p>");
                               // }
                            }
                        }
                        
                   }
                    //计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
                    preAngle = Math.atan2(preY - cy, preX - cx);

                    //preAngle += Math.PI * 2;
                    //移动事件
                    $("html").mousemove(function(event){

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
                        a = (transferAngle * 180 / Math.PI)/10;
                        b = a * 4.0 / 9.0;
                        var antiCross = 0;
                        var clockwiseCross = 0;
                        //$('#outerDiv').rotate(a);
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
                            $("#m"+right_o[i]).css("left", x);
                            $("#m"+right_o[i]).css("top", y);

                            right_c[i] += a;
                        }

                        //if(right_c[2] + a <= -Math.PI / 2)
                        
                        for(var i = 0; i < left_o.length ; i++) 
                        {
                        //  console.log(left_c[i], Math.cos(left_c[i]),  Math.sin(left_c[i]));
                            var x = parseInt( (Math.cos( left_c[i] + b) *  len ) + or - mWidth/2 );
                            var y = parseInt( (Math.sin( left_c[i] + b) *  len ) + or - mWidth/2 );
                            if(anti == 1 && i == left_o.length - 1 && Math.cos(left_c[i]) >= 0 && Math.sin(left_c[i]) >=0 )
                            {
                                x = parseInt( (Math.cos( left_c[i] + a) *  len ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( left_c[i] + a) *  len ) + or - mWidth/2 ); 
                                left_c[i] += a;
                            }
                            else if(anti == 0 && i == 0 && Math.cos(left_c[i]) >= 0 && Math.sin(left_c[i]) <=0)
                            {
                                
                                x = parseInt( (Math.cos( left_c[i] + a) * len ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( left_c[i] + a) * len ) + or - mWidth/2 ); 
                                left_c[i] += a;                         
                            }
                            else 
                                left_c[i] += b;
                            //left_c[i] -= Math.PI / 8;
                               // $("#m"+left_o[i]).offset( {top:y,left:x} );
                                $("#m"+left_o[i]).css("left", x);
                                $("#m"+left_o[i]).css("top", y);
                        }

                        if(overlap == 1)
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
                                $("#m"+right_o[i]).css("left", x);
                                $("#m"+right_o[i]).css("top", y);
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
                                $("#m"+left_o[i]).css("left", x);
                                $("#m"+left_o[i]).css("top", y);
                            }
                            left_o[0] = tmp_right_o;
                            left_c[0] = origin_left_c[0];
                            x = parseInt( (Math.cos( left_c[0] ) * len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( left_c[0] ) * len ) + or - mWidth/2 );    
                         //   $("#m"+left_o[0]).offset({top:y,left:x});
                            $("#m"+left_o[0]).css("left", x);
                            $("#m"+left_o[0]).css("top", y);
                            right_o[0] = tmp_left_o;
                            right_c[0] = origin_right_c[0];
                            x = parseInt( (Math.cos( right_c[0] ) * len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( right_c[0] ) *  len ) + or - mWidth/2 );   
                            //$("#m"+right_o[i]).offset({top:y,left:x});
                            $("#m"+right_o[i]).css("left", x);
                            $("#m"+right_o[i]).css("top", y);
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
                                $("#m"+right_o[i]).css("left", x);
                                $("#m"+right_o[i]).css("top", y);
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
                                $("#m"+left_o[i]).css("left", x);
                                $("#m"+left_o[i]).css("top", y);
                            }
                            left_o[left_o.length - 1] = tmp_right_o;
                            left_c[left_o.length - 1] = origin_left_c[left_o.length - 1];
                            x = parseInt( (Math.cos( left_c[left_o.length - 1] ) *  len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( left_c[left_o.length - 1] ) *  len) + or - mWidth/2 );    
                           // $("#m"+left_o[left_o.length - 1]).offset({top:y,left:x});
                            $("#m"+left_o[left_o.length - 1]).css("left", x);
                            $("#m"+left_o[left_o.length - 1]).css("top", y);

                            right_o[right_o.length - 1] = tmp_left_o;
                            right_c[right_o.length - 1] = origin_right_c[right_o.length - 1];
                            x = parseInt( (Math.cos( right_c[right_o.length - 1] ) * len ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( right_c[right_o.length - 1] ) * len ) + or - mWidth/2 );  
                            //$("#m"+right_o[right_o.length - 1]).offset({top:y,left:x});
                            $("#m"+right_o[right_o.length - 1]).css("left", x);
                            $("#m"+right_o[right_o.length - 1]).css("top", y);
                            a = 0;
                            b = 0;
                            
                        }
                        
                        preX = curX;
                        preY = curY;
                        preAngle = curAngle;
                        preAnti = anti;
                    });
                    //释放事件
                    $("html").mouseup(function(event){
                        $("html").unbind("mousemove");
                    });
                });
            }

            

            $.ajax({
                    type: "get",
                    url: "/index.php?r=relationship/friend",
                    data:{"id":<?php echo $userId?>},
                    success: function(json) {
                       // window.alert(html);
                        
                        showPanel(json);


                    }
                });

            
        </script>
        <!-- 代码部分end -->

    </div>



   
</div>
    