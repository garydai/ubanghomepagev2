<div id="login-content">
    <div class="login-newbg" style="background-image: url(/img/login-bg.png);">  
    </div> 
    <div class="login-layout">
        <div class="login-warp">
            <div class="login-box">
                <div class="static-form " id="J_StaticForm">
            <div class="login-title">
                用户登录
            </div>
        
            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                          ]); ?>

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
                  <input type="checkbox">记住我
                </label>
            </div>
            

            
            <div class="submit">
                
               
                <button type="submit" class="J_Submit" tabindex="3" id="J_SubmitStatic" data-ing="正在登录...">登 录</button>
            </div>

            
            
           
        </form>
    </div>

            </div>
        </div>
    </div>
</div>

