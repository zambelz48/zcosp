<!-- Related Products Start -->
{if $total_product_related > 0}
<div class="box">
    <div class="box-heading">Produk terkait</div>
    <div class="box-content">
        <div class="box-product related">
            {foreach from=$product_related item=related}
                <div>
                    <div class="image"><a href=""><img src="{$product_img_src}thumb_{$related.image}" alt="{$related.name}" title="{$related.name}" /></a></div>
                    <div class="name"><a href="">{$related.name}</a></div>
                    <div class="price">{$related.price}</div>
                    <div class="abs">
                        <div class="cart"> 
                            <a class="button1" title="Add to Cart"><span>Add to Cart</span></a> 
                            <a class="btn-detail ml10" title="Detail" href="product-{$related.id}.html"><span>Detail</span></a>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
{/if}
<!-- Related Products End -->