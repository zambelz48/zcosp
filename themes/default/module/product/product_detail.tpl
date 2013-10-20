<div class="product-info">

    <div class="left">
        <div class="image">
            <a title="{$product_name}" href="{$product_img}" class="colorbox">
                <img id="image" alt="{$product_name}" title="{$product_name}" src="{$product_img_thumb}" />
            </a>
        </div>
    </div>
    
    <div class="right">
        <div class="htabs" id="tabs">
            <a href="#tab-information" class="info selected">Informasi produk</a>
            <a href="#tab-description">Keterangan</a>
            <a href="#tab-review">Komentar ({$total_product_review})</a>
        </div>
  
        <div class="tab-content" id="tab-information">
            <div class="description">
                <span>Nama produk&nbsp;:</span> {$product_name}<br />
                <span>Brand&nbsp;:</span> <a href="">{$product_brand}</a><br />
                <span>Status&nbsp;:</span> {$product_status}         
            </div>
            <div class="price">
                <span class="price-new">{$product_price}</span>
            </div>
            <div class="review">
                <div>
                    <img alt="reviews" src="{$THEME_DIR}image/stars-4.png" />
                    <a onclick="$('a[href=\'#tab-review\']').trigger('click');">{$total_product_review}&nbsp;komentar</a> / 
                    <a onclick="$('a[href=\'#tab-review\']').trigger('click');">Tulis komentar</a>
                </div>
            </div>        
            <div class="cart">
                <div>
                    Qty:<input type="text" value="1" size="2" class="w30" name="quantity" />
                    <input type="hidden" value="36" size="2" name="product_id" />&nbsp;<a title="Tambahkan ke keranjang" class="button" id="button-cart">
                    <span>Tambahkan ke keranjang</span></a>&nbsp;&nbsp;
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="tab-description">
            <div>
                {$product_description}
            </div>
        </div>

        <div class="tab-content" id="tab-review">
        
            {include file='module/product/product_review.tpl'}
            
        </div>
        
    </div>
    
</div>

{include file='module/product/product_related.tpl'}