<h1>{$product_header}</h1>

<!--Product List Start-->
{if $total_product > 0}
    {foreach from=$product_list item=product}
        <div class="product-list">    
            <div>
                <div class="right">
                    <div class="cart">
                        <a class="button1" title="Masukan keranjang" href="index.php?page=order&act=add_cart&id_product={$product.id}"><span>Masukan keranjang</span></a>
                    </div>                    
                </div>                        
                <div class="left">            
                    <div class="image">
                        <a href="product-{$product.id}.html">
                            <img src="{$product_img_src}thumb_{$product.image}" alt="{$product.name}" title="{$product.name}" />
                        </a>
                    </div>                    
                    <div class="price"> {$product.price} </div>                    
                    <div class="name"><a href="">{$product.name}</a></div>                    
                    <div class="rating"><img src="{$THEME_DIR}/image/stars-0.png" alt="Based on 0 reviews." /></div>                    
                    <div class="description"> {$product.description} </div>            
                </div>           
            </div>     
        </div>
    {/foreach}
{/if}
<!--Product List End-->