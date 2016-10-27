<body ondragstart="return false;" ondrop="return false;">
        <!-- 代码部分begin -->
        <!--
            圆形菜单[最多容纳8个最大正方形菜单块, 若需容纳更多的菜单块,则需要缩小菜单块的大小]
            半径 oR = 150px;
            圆心坐标(150,150)
        -->
    <div id="relationship" class="section-relationship ">
       
            <div id="outerDiv" style="background-color: #F3F0F0;width:600px;height:600px;border-radius:300px;position: absolute;">
                <!--
                    圆心
                    半径 iR = 50px;
                    圆心坐标(150,150)
                -->
                <!--?php var_dump($text) ?-->
                <div id="friend">
                    
                </div>
                <div  style="background: #fff;width: 200px;height: 200px;border-radius: 100px;position: absolute;left:200px;top:200px;"></div>
                <!--
                    ==========================
                    最大菜单块(正方形)
                    对角线长度 mDLen = oR - iR;
                    边长 mWidth = mHeight = mDLen的平方 / 2 的结果 再开方 最后取整
                    ==========================
                    菜单块滑动圆
                    半径 mR = iR + (mDLen / 2)
                    ==========================
                -->
                <?php 
                /*
                    for($i = 0; $i < count($data); ++$i)
                    {

                        if(!array_key_exists('Avatar', $data[$i]))
                            $avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                        else 
                            $avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/'.$data[$i]["Avatar"];
                        echo '<div id="m'.($i+1).'" style="position: absolute; background-image: url('.$avatar.');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 54px;"></div>';
                        //echo '<div id='.'"'.'m'.$i+1.'"'.' style='.'"'.'position: absolute; background: yellow; border-radius: 54px;'.'"'.'></div>';
                    
                    }
                    if(!array_key_exists('Avatar', $user))
                        $user_avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                    else 
                        $user_avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/'.$user["Avatar"];
                   // echo '<div id="m0" style="position: absolute; background-image: url('.$user_avatar.');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 54px; width:108px;height:108px;top:246px;left:246px"></div>';
                    
                    */
                    
                ?>
                
            
            <div id = "mine">
                
            </div>
            <div id="spec">
                
               
            </div> 
            </div>
       
  
    </div>
        <script type="text/javascript">

            
            function hit(ev, right_c, right_o, left_c, left_o) {
                var or = 300;
                var ir = 100;
                var mWidth = 108;
                var mDLen = Math.sqrt(2 * Math.pow(mWidth,2));
                // 判断当前鼠标是否在小球内
              //  mx = e.screenX;
              //  my = e.screenY;
                var e = ev || window.event;
                var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
                var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
                var mx = e.pageX || e.clientX + scrollX;
                var my = e.pageY || e.clientY + scrollY;

              //  console.log(mx, my);
                for(var i = 0; i < right_c.length; i ++)
                {
                    var x = (Math.cos( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or;//Math.cos( right_c[i]);
                    var y = (Math.sin( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or;//Math.sin( right_c[i]);
                   // console.log(x, y);
                    if(Math.pow(mx - x, 2) + Math.pow(my - y, 2) <= Math.pow(54, 2)) 
                        return right_o[i];
                
                }
                for(var i = 0; i < left_c.length; i ++)
                {
                    var x = (Math.cos( left_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or;//Math.cos( right_c[i]);
                    var y = (Math.sin( left_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or;//Math.sin( right_c[i]);

                    if(Math.pow(mx - x, 2) + Math.pow(my - y, 2) <= Math.pow(54, 2)) 
                        return left_o[i];
                
                }
                if(Math.pow(mx - or, 2) + Math.pow(my - or, 2) <= Math.pow(54, 2)) 
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
                    $("#friend").append('<div id="m' + (i+1)  + '" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 54px;"></div>');
                    
                }

                if(!user.hasOwnProperty('Avatar'))
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/maleavatar.png';
                    else 
                        var avatar = 'http://7xldgj.com1.z0.glb.clouddn.com/' + user.Avatar;

                $("#mine").append('<div id="m0" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 54px; width:108px;height:108px;top:246px;left:246px"></div>');
               // console.log('<div id="m0" style="position: absolute; background-image: url(' + avatar + ');background-size: 100% 100%; background-repeat: no-repeat; border-radius: 54px; width:108px;height:108px;top:246px;left:246px"></div>');
                $("#spec").html("<p>" +user.Name + "</p>");
                
                

                var or = 300;
                var ir = 100;
                var mWidth = 108;
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
                        var x = parseInt( (Math.cos( delt *(2 - i) ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                        var y = parseInt( (Math.sin(  delt *(2 - i) ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                        $("#m"+i).width(mWidth);
                        $("#m"+i).height(mWidth);
                        $("#m"+i).offset({top:y, left:x});
                        right_o.push(i);
                        right_c.push( delt *(2 - i));
                        origin_right_c.push( delt *(2 - i));
                    }
                    for(var i = 4; i <= count ; i ++)
                    {
                        delt = Math.PI /(count-3 - 1);
                        var x = parseInt( (Math.cos( -Math.PI/2 - delt * (i - 4) ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                        var y = parseInt( (Math.sin( -Math.PI/2 - delt * (i - 4) ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                        $("#m"+i).width(mWidth);
                        $("#m"+i).height(mWidth);
                        $("#m"+i).offset({top:y, left:x});
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
                        var x = parseInt( (Math.cos( delt *(i - 1) ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                        var y = parseInt( (Math.sin(  delt *(i - 1) ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                        $("#m"+i).width(mWidth);
                        $("#m"+i).height(mWidth);
                        $("#m"+i).offset({top:y, left:x});
                        right_o.push(i);
                        right_c.push(delt *(i - 1));

                    }
                }
                var x = (Math.cos( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or;//Math.cos( right_c[i]);
                var y = (Math.sin( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or;//Math.sin( right_c[i]);
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
                    
                   
                   var index = hit(event, right_c, right_o, left_c, left_o);
                  // console.log(index);
                   if(index != -1)
                   {
                        if(index == 0)
                        {
                          //  console.log(user);
                            $("#spec").html("<p>" +user.Name + "</p>");
                        }
                        else 
                        {
                            if(overlap == 0)
                            {
                                $("#spec").html("<p>" +data[index - 1].Name + "</p>");
                            //console.log(data[index - 1].Name);
                            }  
                            else 
                            {
                                if(index <= 3)
                                {
                                    $("#spec").html("<p>" +data[index - 1].Name + "</p>");
                                }
                                else 
                                {
                                    $("#spec").html("<p>" +data[index + 3].Name + "</p>");
                                }
                            }
                        }
                        
                   }
                    //计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
                    preAngle = Math.atan2(preY - or, preX - or);
                    //preAngle += Math.PI * 2;
                    //移动事件
                    $("html").mousemove(function(event){
                        curX = event.clientX;
                        curY = event.clientY;
                        //计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
                        var curAngle = Math.atan2(curY - or, curX - or);
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
                            var x = parseInt( (Math.cos( right_c[i] + a) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            var y = parseInt( (Math.sin( right_c[i] + a) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            $("#m"+right_o[i]).offset( {top:y,left:x} );

                            right_c[i] += a;
                        }

                        //if(right_c[2] + a <= -Math.PI / 2)
                        
                        for(var i = 0; i < left_o.length ; i++) 
                        {
                        //  console.log(left_c[i], Math.cos(left_c[i]),  Math.sin(left_c[i]));
                            var x = parseInt( (Math.cos( left_c[i] + b) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            var y = parseInt( (Math.sin( left_c[i] + b) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            if(anti == 1 && i == left_o.length - 1 && Math.cos(left_c[i]) >= 0 && Math.sin(left_c[i]) >=0 )
                            {
                                x = parseInt( (Math.cos( left_c[i] + a) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( left_c[i] + a) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 ); 
                                left_c[i] += a;
                            }
                            else if(anti == 0 && i == 0 && Math.cos(left_c[i]) >= 0 && Math.sin(left_c[i]) <=0)
                            {
                                
                                x = parseInt( (Math.cos( left_c[i] + a) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( left_c[i] + a) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 ); 
                                left_c[i] += a;                         
                            }
                            else 
                                left_c[i] += b;
                            //left_c[i] -= Math.PI / 8;
                                $("#m"+left_o[i]).offset( {top:y,left:x} );

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
                                x = parseInt( (Math.cos( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );   
                                $("#m"+right_o[i]).offset({top:y,left:x});
                            }
                            var tmp_left_o = left_o[left_o.length - 1];
                            var tmp_left_c = left_c[left_o.length - 1];
                            for(var i = left_o.length - 1; i > 0 ; i --)
                            {
                                left_o[i] = left_o[i - 1];
                                left_c[i] = origin_left_c[i];
                                x = parseInt( (Math.cos( left_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( left_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );    
                                $("#m"+left_o[i]).offset({top:y,left:x});
                            }
                            left_o[0] = tmp_right_o;
                            left_c[0] = origin_left_c[0];
                            x = parseInt( (Math.cos( left_c[0] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( left_c[0] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );    
                            $("#m"+left_o[0]).offset({top:y,left:x});
                            right_o[0] = tmp_left_o;
                            right_c[0] = origin_right_c[0];
                            x = parseInt( (Math.cos( right_c[0] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( right_c[0] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );   
                            $("#m"+right_o[i]).offset({top:y,left:x});
                        }
                        else if(clockwiseCross == 1 )
                        {
                            var tmp_right_o = right_o[0];
                            var tmp_right_c = right_c[0];
                            for(var i = 0; i < right_o.length - 1; i ++)
                            {
                                right_o[i] = right_o[i + 1];
                                right_c[i] = origin_right_c[i];
                                x = parseInt( (Math.cos( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( right_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );   
                                $("#m"+right_o[i]).offset({top:y,left:x});
                            }
                            var tmp_left_o = left_o[0];
                            var tmp_left_c = left_c[0];
                            for(var i = 0; i < left_o.length - 1; i ++)
                            {
                                left_o[i] = left_o[i + 1];
                                left_c[i] = origin_left_c[i];
                                x = parseInt( (Math.cos( left_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                                y = parseInt( (Math.sin( left_c[i] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );    
                                $("#m"+left_o[i]).offset({top:y,left:x});
                            }
                            left_o[left_o.length - 1] = tmp_right_o;
                            left_c[left_o.length - 1] = origin_left_c[left_o.length - 1];
                            x = parseInt( (Math.cos( left_c[left_o.length - 1] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( left_c[left_o.length - 1] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );    
                            $("#m"+left_o[left_o.length - 1]).offset({top:y,left:x});

                            right_o[right_o.length - 1] = tmp_left_o;
                            right_c[right_o.length - 1] = origin_right_c[right_o.length - 1];
                            x = parseInt( (Math.cos( right_c[right_o.length - 1] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );
                            y = parseInt( (Math.sin( right_c[right_o.length - 1] ) *  (ir + ((or - ir - mDLen)/2) + mDLen/2) ) + or - mWidth/2 );  
                            $("#m"+right_o[right_o.length - 1]).offset({top:y,left:x});
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
    </body>
    