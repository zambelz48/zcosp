<h1>Hubungi Kami</h1>

<h2>Lokasi kami</h2>        
<div class="contact-info">

    <div class="content">
        
        <div class="left">
            <h4><b>Alamat&nbsp;:</b></h4>
            <p>401, Dhaval Plaza, New Duperi Road, New Mumbai, Maharashtra<br />
            Address 1</p>
        </div>
        
        <div class="right">
            <h4><b>No.Telp&nbsp;:</b></h4>
            123456789<br />
            <br />
        </div>
        
    </div>
    
</div>

<form id="formValidation" method="post" action="">
    <div class="content"> <b>Nama lengkap&nbsp;:</b><br />
        <input class="validate[required] text-input" type="text" value="{$username_field}" name="name" id="name" data-prompt-position="topRight:-5" {$disabled_field} />
        <br /><br />
        <b>E-Mail&nbsp;:</b><br />
        <input class="validate[required] text-input" type="text" value="{$email_field}" name="email" id="email" data-prompt-position="topRight:-5" {$disabled_field} />
        <br /><br />
        <b>Pesan anda&nbsp;:</b><br />
        <textarea class="w96" rows="10" cols="40" name="enquiry"></textarea>
        <br /><br />
        <img src="{$captcha_src}" alt="alt_img_captca" />
        <br />
        <input class="validate[required] text-input" type="text" name="captcha" id="captcha" size="6" maxlength="6" data-prompt-position="topRight:-5" />
    </div>
    
    <div class="buttons">
        <div class="right">
            <input type="submit" class="button" value="Kirim" />
        </div>
    </div>
</form>