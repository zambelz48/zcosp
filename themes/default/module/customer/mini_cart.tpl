<!-- Mini Cart Start-->
<section id="cart">
    
    <div class="heading"> 
        <a><span id="cart_total">{$total_qty} ({$total_buy})</span></a>
    </div>
    
    <div class="content">
    
        {if $total_qty > 0}
            <div class="mini-cart-info">            
                <table class="cart">                
                    <tbody>                    
                        <!-- looping product cart Start-->
                        {foreach from=$view_mini_cart item=cart}
                        <tr>
                            <td class="image"><a href=""><img title="Apple Cinema 30" alt="Apple Cinema 30" src="{$THEME_DIR}image/product/apple_cinema_30-40x40.jpg" /></a></td>
                            <td class="name"><a href="">{$cart.product_name}</a></td>
                            <td class="quantity">{$cart.qty}&nbsp;pcs</td>
                            <td class="total">{$cart.subtotal}</td>
                            <td class="remove">
                                <a href=""><img title="Remove" alt="Remove" src="{$THEME_DIR}image/close.png" /></a>
                            </td>
                        </tr>
                        <!-- looping product cart End-->
                        {/foreach}                    
                    </tbody>                
                </table>            
            </div>
            
            <div class="mini-cart-total">
                <table class="total">
                    <tbody>
                        <tr>
                            <td align="right"><b>Total</b></td>
                            <td align="right">{$total_buy}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="checkout">
                <a class="button" href="customer-cart.html">Lihat keranjang</a>
                <a class="button ml10" href="customer-checkout.html"><span>Checkout</span></a>
            </div>        
        {else}
            <div class="empty_cart">{$empty_cart_msg}</div>
        {/if}
        
    </div>
    
</section>
<!-- Mini Cart End-->