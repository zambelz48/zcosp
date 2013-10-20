<h1>Data pelanggan baru</h1>
<form id="formValidation" enctype="multipart/form-data" method="post" action="" >

    <h2>Data personal</h2>
    <div class="content">
        <table class="form">
            <tbody>
                <tr>
                    <td><span class="required">*</span> Nama Lengkap:</td>
                    <td><input class="validate[required] text-input" type="text" name="fullname" id="fullname" data-prompt-position="topRight:-5" /></td>
                </tr>
                <tr>
                    <td>Jenis kelamin:</td>
                    <td>
                        <input type="radio" name="gender" value="pria" checked /> Pria
                        <input type="radio" name="gender" value="wanita" /> Wanita
                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> E-Mail:</td>
                    <td><input class="validate[required] text-input" type="text" name="email" id="email" data-prompt-position="topRight:-5" /></td>
                </tr>
                <tr>
                    <td>Nomor telepon:</td>
                    <td><input type="text" name="phone_number" /></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Alamat lengkap:</td>
                    <td><textarea name="address"></textarea></td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Provinsi:</td>
                    <td><input class="validate[required] text-input" type="text" value="" name="state" id="state" data-prompt-position="topRight:-5" /></td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Kota:</td>
                    <td><input class="validate[required] text-input" type="text" value="" name="city" id="city" data-prompt-position="topRight:-5" /></td>
                </tr>                
                <tr>
                    <td><span class="required" id="postcode-required">*</span> kode pos:</td>
                    <td><input class="validate[required] text-input" type="text" value="" name="postal_code" id="postal_code" data-prompt-position="topRight:-5" /></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <h2>Data login</h2>
    <div class="content">
        <table class="form">
            <tbody>
                <tr>
                    <td><span class="required">*</span> Username:</td>
                    <td><input class="validate[required] text-input" type="text" name="username" id="username" data-prompt-position="topRight:-5" /></td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Password:</td>
                    <td><input class="validate[required] text-input" type="password" name="password" id="password" data-prompt-position="topRight:-5" /></td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Ulangi Password:</td>
                    <td><input class="validate[required,equals[password]] text-input" type="password" name="re_password" id="re_password" data-prompt-position="topRight:-5" /></td>
                </tr>
            </tbody>
        </table>
    </div>
          
    <h2>Langganan berita</h2>
    <div class="content">
        <table class="form">
            <tbody>
                <tr>
                    <td>Berlangganan:</td>
                    <td>
                        <input type="radio" value="Y" name="newsletter" /> Ya
                        <input type="radio" checked="checked" value="N" name="newsletter" /> Tidak 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="buttons">
        <div class="right">
            <input class="validate[required] checkbox" type="checkbox" name="agree" id="agree" />
            Saya telah membaca dan menyetujui <a alt="Privacy Policy" href="#" class=""><b>Syarat dan ketentuan</b></a> 
        </div>
    </div>
    <div class="buttons">
        <div class="right">
            <input type="submit" class="button" value="Submit" />
        </div>
    </div>
    
</form>