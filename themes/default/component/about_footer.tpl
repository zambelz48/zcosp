<!-- About Store information Start -->
<section id="footer-top-outside">
    <div class="line-bottom">
        <div id="customHome" class="container_12">
            <div id="about_us_footer" class="grid_3">
                <h2>About uStore</h2>
                <img class="about_us_image" alt="small logo" src="{$THEME_DIR}image/product/logo-small.png" />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor, sem vel venenatis interdum, tortor dolor lobortis purus, sed adipiscing ante nisi fringilla nunc. Mauris id erat eget diam pulvinar fringilla. Vestibulum blandit aliquam velit, non viverra turpis vulputate ac.</p>
            </div>
            
            <!--  TWITTER -->
            <div id="twitter_footer" class="grid_3">
                <h2>Latest Tweets</h2>
                <ul id="twitter_update_list">
                    <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                    <script type="text/javascript" src="https://api.twitter.com/1/statuses/user_timeline.json?screen_name=harnishdesign&callback=twitterCallback2&count=2"></script>
                </ul>
            </div>
            
            <div id="contact_footer" class="grid_3">
                <h2>Contact Us</h2>
                <ul>
                    <li>
                        <!-- TELEPHONE -->
                        <ul id="tel" class="contact_column">
                            <li id="footer_telephone">+11 8832 456 123</li>
                            <li id="footer_telephone2">+11 8832 456 123</li>
                        </ul>
                        <!-- FAX  -->
                        <ul id="fax" class="contact_column">
                            <li id="footer_fax">+11 0832 456 321</li>
                        </ul>
                        <!-- EMAIL -->
                        <ul id="mail" class="contact_column">
                            <li id="footer_email">contact@test.com</li>
                            <li id="footer_email2">info@test.com</li>
                        </ul>
                        <!-- SKYPE -->
                        <ul id="skype" class="contact_column">
                            <li id="footer_skype">harnishdesign</li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <!--  FACEBOOK -->
            <div id="facebook_footer" class="grid_3">
                <h2>Facebook</h2>
                <div class="facebook-outer">
                    <div id="facebook">
                        <div id="fb-root"></div>
                              {literal}
                                  <script>
                                    (function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                    (document, 'script', 'facebook-jssdk'));
                                  </script>
                              {/literal}
                        <div class="fb-like-box" data-href="http://www.facebook.com/160281810726316" data-width="240" data-connections="9" data-height="200" data-show-faces="true" data-stream="false" data-header="false" data-border-color="#fff"></div>
                    </div>
                </div>
            </div>
        </div>
      <div class="clear"></div>
    </div>
    <div class="line-bottom1"></div>
</section>
<!-- About Store information End-->