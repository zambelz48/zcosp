<!DOCTYPE html>
<html lang="en">
    
<head>
<title>Login - page</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{$THEME_DIR}css/bootstrap.min.css" />
<link rel="stylesheet" href="{$THEME_DIR}css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="{$THEME_DIR}css/login.css" />

<link rel="shortcut icon" type="image/x-icon" href="{$THEME_DIR}img/favicon.ico">
</head>

<body>    
    
    <div id="loginbox">            
        
        <form id="loginform" method="POST" class="form-vertical" action="">            
            <div class="control-group normal_text">
                <h3>ZAMBELZ - LOGIN</h3>
                {include file='component/alert.tpl'}
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" name="username" placeholder="Nama user" />
                    </div>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input type="password" name="password" placeholder="Kata sandi" />
                    </div>
                </div>
            </div>
            
            <div class="form-actions">                
                <span class="pull-right"><input type="submit" class="btn btn-success" value="Masuk" /></span>
            </div>            
        </form>
    
    </div>
        
    <script src="{$THEME_DIR}js/jquery.min.js"></script>  
    <script src="{$THEME_DIR}js/login.js"></script>
    <script src="{$THEME_DIR}js/form_validation.js"></script> 

</body>
</html>