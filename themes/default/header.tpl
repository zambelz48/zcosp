<body>

<div class="main-wrapper">
    <!-- Header Start-->
    <header class="header-top-main">
        <div id="header-top-wrapper">
            <section class="header-top">
                
                <div id="welcome">
                    {$guest_welcome_text}
                </div>          
                
                {include file='module/customer/mini_cart.tpl'}                
                
                <div class="clear"></div>    
            </section>
        </div>
        
        <section id="header-main">
            <div id="header">
                
                <div id="logo">
                    <a href=""><img src="{$THEME_DIR}image/logo.png" title="{$site_name}" alt="ustore-html-template" /></a>
                </div>
                
                <div class="links"> 
                    {include file='module/customer/customer_link.tpl'}     
                </div>
                
                <div id="search">
                    <div class="button-search"></div>
                    <input type="text" value="" placeholder="Search" id="filter_name" name="search" />
                </div>
                
            </div>
        </section>
        
        {include file='component/menu.tpl'}
    
    </header>
    <!-- Header End-->  

    <section class="wrapper">
        <div id="container">
        
            <!--Middle Part Start-->
            <section id="content">
                
                <!--Slider Start-->
                {if $total_active_slider > 0}
                    <div class="slider-wrapper">
                        <div id="slideshow" class="nivoSlider">
                            {foreach from=$home_slider item=hs} 
                                <a href="#"><img src="{$slider_directory}slider_{$hs.image}" alt="" /></a>
                            {/foreach}
                        </div>
                    </div>
                {/if}
                <!--Slider End-->
        
                <!--Breadcrumb Part Start-->
                <div class="breadcrumb"> {$breadcrumb} </div>
                <!--Breadcrumb Part End-->
              