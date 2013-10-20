<form id="formValidation" method="post" action="">
                
    <div class="rev" id="review">
        <div class="content">
            <b>Lopica</b> <img alt="reviews" src="{$THEME_DIR}image/stars-4.png" /><br />
            11/05/2013<br />
            <br />
            Yes I like it for ipod nano
        </div>
    </div>
                
    <h2 id="review-title">Tulis komentar anda</h2>
    
    <b>Nama&nbsp;:</b><br />
    <input class="validate[required] text-input" type="text" value="{$user_name}" name="name" id="name" data-prompt-position="topRight:-5" />
    <br />
    <br />
    
    <b>Komentar anda&nbsp;:</b>
    <textarea class="w96" rows="8" cols="40" name="comment"></textarea>
    <br />
    
    <b>Rating anda&nbsp;:</b>
    <input type="radio" value="1" name="rating" />
    &nbsp;
    <input type="radio" value="2" name="rating" />
    &nbsp;
    <input type="radio" value="3" name="rating" />
    &nbsp;
    <input type="radio" value="4" name="rating" />
    &nbsp;
    <input type="radio" value="5" name="rating" checked />
    <br />
    
    <b>Masukan kode dibawah ini:</b><br />
    <input class="validate[required] text-input" type="text" name="captcha" id="captcha" maxlength="6" data-prompt-position="topRight:-5" />
    <br />
    <img class="mt10" id="captcha" alt="" src="{$captcha_src}" /><br />
    <br />
                
    <div class="buttons">
        <div class="right"><input type="submit" class="button" value="Submit" /></div>
    </div>
                
</form>