<div id="login-content">
    <div class="login-newbg" style="background-image: url(/img/login-bg2.png);">  
    </div> 
    <div class="login-layout">
        <div class="login-warp">
            <div class="login-box">
                <div class="static-form " id="J_StaticForm">
                    <div class="login-title">
                        用户登录
                    </div>
                

                    <form action="/index.php?r=login/login" method="post" id="J_Form">
                        <div id="J_Message" style="display:none;" class="login-msg error">
                            <i class="iconfont"></i>
                            
                        <p class="error"></p>
                        
                         </div>
                        <div class="field username-field">
                            <label for="TPL_username_1"> <i class="iconfont" title="会员名"></i></label> 
                            <input type="text" name="username" id="TPL_username_1" class="login-text J_UserName" value="" maxlength="32" tabindex="1" aria-label="" placeholder="手机号">
                        </div>

                        <div class="field pwd-field">
                            <label id="password-label" for="TPL_password_1"><i class="icon iconfont" title="登录密码"></i></label> 
                            <span id="J_StandardPwd">
                               <input type="password" name="password" id="TPL_password_1" class="login-text" maxlength="40" tabindex="2" autocomplete="off" aria-label="登录密码">
                            </span> 
                        </div>
                        
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="rememberMe" value="1">记住我
                            </label>
                        </div>
                        

                        
                        <div class="submit">
                            
                           
                            <button type="submit" class="J_Submit" tabindex="3" id="J_SubmitStatic" data-ing="正在登录...">登 录</button>
                        </div>
                    
                        

                   
                     </form>
                     <div class="register">
                            
                           
                            <button type="" class="register-btn" tabindex="" id="" data-ing="正在登录...">注 册</button>
                        </div>
                </div>

            </div>
            <div class="register-box">
                <div class="register-close">
                </div>
                <div class="qr">
                    
                </div>
                <div class="spec">加入友问友帮APP 立即注册</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".register-box").hide();
    $(".register-btn").click(function(){
        
        $(".login-box").fadeOut(1000);
        $(".register-box").fadeIn(1000);
    });
    $(".register-close").click(function()
    {
        $(".register-box").fadeOut(1000);
        $(".login-box").fadeIn(1000);
    });


</script>

