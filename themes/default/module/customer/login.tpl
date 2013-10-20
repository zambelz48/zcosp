<!--Middle Part Start-->
<div id="content">   
    <h1>Akses akun</h1>
    <div class="login-content">
    
        <div class="left">
            <h2>Customer baru</h2>
            <div class="content">
                <p><b>Belum memiliki Akun ?</b></p>
                <p>Dengan membuat akun anda akan dapat berbelanja lebih cepat, dapat meninjau info mengenai status pesanan, 
                dan bisa meninjau ulang pesanan yang telah anda buat sebelumnya.</p>
                <a class="button" href="customer-register.html">Daftar</a>
            </div>
        </div>
        
        <div class="right">
            <h2>Customer login</h2>
            <form id="formValidation" enctype="multipart/form-data" method="post" action="" />
                <div class="content">
                    {$login_user_not_found_msg}
                    {$login_user_blocked_error_msg}
                    <b>Username:</b><br />
                    <input class="validate[required] text-input" type="text" name="username" id="username" data-prompt-position="topRight:-5" />
                    <br />
                    <br />
                    <b>Password:</b><br />
                    <input class="validate[required] text-input" type="password" name="password" id="password" data-prompt-position="topRight:-5" />
                    <br />
                    <br />
                    <input type="submit" class="button" value="Login" />
                </div>
            </form>
        </div>
        
    </div>
</div>
<!--Middle Part End-->