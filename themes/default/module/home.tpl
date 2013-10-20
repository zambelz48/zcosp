<!--Featured Product Start-->
{if $total_active_featured > 0}
<section class="box">
    <div class="box-heading">Featured</div>
    <div class="box-content">
        <div class="box-product">
            {foreach from=$featured_product item=featured}        
            <div>
                <div class="image"><a href=""><img src="{$img_dir}thumb_{$featured.image}" alt="{$featured.name}" title="{$featured.name}" /></a></div>
                <div class="name"><a href="">{$featured.name}</a></div>
                <div class="price">{$featured.price}</div>
                <div class="abs">
                    <div class="cart"> 
                        <a class="button1" title="Masukan keranjang" href="index.php?page=order&act=add_cart&id_product={$featured.id}"><span>Masukan keranjang</span></a> 
                        <a class="btn-detail ml10" title="Detail" href="product-{$featured.id}.html"><span>Detail</span></a>
                    </div>
                </div>
            </div>
            {/foreach}            
        </div>
    </div>
</section>
{/if}
<!--Featured Product End-->

<!-- Advertisement Banner Start -->
<section id="banner" class="banner">
    <div><a href="#"><img src="{$THEME_DIR}image/slider/free-delivery-banner-962x94.jpg" alt="Free Delivery Discount" title="Free Delivery Discount" /></a></div>
</section>
<!-- Advertisement Banner End-->
            
<!--Latest Product Start-->
{if $total_active_latest > 0}
<section class="box">
    <div class="box-heading">Produk Terbaru</div>
    <div class="box-content">
        <div class="box-product">
            {foreach from=$latest_product item=latest}
            <div>
                <div class="image"><a href=""><img src="{$img_dir}thumb_{$latest.image}" title="{$latest.name}" alt="{$latest.name}" /></a></div>
                <div class="name"><a href="">{$latest.name}</a></div>
                <div class="price"> {$latest.price} </div>
                <div class="abs">
                    <div class="cart"> 
                        <a href="index.php?page=order&act=add_cart&id_product={$latest.id}" title="Masukan keranjang" class="button1">
                            <span>Masukan keranjang</span>
                        </a> 
                        <a class="btn-detail ml10" title="Detail" href="product-{$latest.id}.html"><span>Detail</span></a>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
</section>
{/if}
<!--Latest Product End-->

<!-- Carousel Start-->
<section id="carousel">
    <ul class="jcarousel-skin-custom">
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
        <li><a href="#"><img src="{$THEME_DIR}image/product/brand_logo.jpg" alt="brand-logo" title="Brand Logo" /></a></li>
    </ul>
</section>
<!-- Carousel End-->