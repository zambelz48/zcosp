<h1>Keranjang Belanja Anda</h1>

    <div class="cart-info">
    
        <table>
            
            <thead>
                <tr>
                    <td class="name">Produk</td>
                    <td class="quantity">Jumlah</td>
                    <td class="price">Harga satuan</td>
                    <td class="total">Sub-total</td>
                </tr>
            </thead>
            
            <tbody>
            
                <!-- looping product cart Start-->
                {foreach from=$view_cart item=cart}
                    <form enctype="multipart/form-data" method="post" action="" />
                        <tr>
                            <td class="name">                            
                                <a href="product-{$cart.id_product}.html">
                                    <img title="{$cart.product_name}" alt="{$cart.product_name}" src="{$THEME_DIR}image/product/macbook_pro_1-80x80.jpg" />
                                    <br />
                                    {$cart.product_name}
                                </a>
                                <input type="hidden" name="id_product" value="{$cart.id_product}" />
                            </td>
                            <td class="quantity">
                                <input type="text" size="1" value="{$cart.qty}" name="qty" class="w30" />&nbsp;
                                <input type="image" onclick="submit.this()" title="Ubah" alt="Ubah" value="Ubah" src="{$THEME_DIR}image/update.png" />&nbsp;
                                <a href="index.php?page=order&act=remove_cart&id_product={$cart.id_product}">
                                    <img title="Hapus" alt="Hapus" src="{$THEME_DIR}image/remove.png" />
                                </a>
                            </td>
                            <td class="price">{$cart.product_price}</td>
                            <td class="total">{$cart.subtotal}</td>
                        </tr>
                    </form>
                {/foreach}
                <!-- looping product cart End-->
                
            </tbody>
            
        </table>
        
    </div>

<div class="cart-total">
    <table id="total">
        <tbody>
            <tr>
                <td class="right"><b>Total belanja : </b></td>
                <td class="right">{$total_buy}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="buttons">
    <div class="right"><a class="button" href="customer-checkout.html">Checkout</a></div>
    <div class="center"><a class="button" href="all-product.html">Lanjutkan belanja</a></div>
</div>