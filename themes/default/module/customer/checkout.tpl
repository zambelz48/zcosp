<h1>Pembayaran</h1>

<form method="post" action="" >

    <div class="checkout-product">
        <table>
            <thead>
                <tr>
                    <td colspan="2" class="name"><center>DATA PELANGGAN</center></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama Lengkap&nbsp;:</td>
                    <td><input type="text" value="{$customer_fullname}" name="fullname" disabled /></td>
                </tr>
                <tr>
                    <td>Jenis kelamin&nbsp;:</td>
                    <td>{$customer_sex}</td>
                </tr>
                <tr>
                    <td>E-Mail&nbsp;:</td>
                    <td><input type="text" value="{$customer_email}" name="email" id="email" disabled /></td>
                </tr>
                <tr>
                    <td>Nomor telepon&nbsp;:</td>
                    <td><input type="text" value="{$customer_phone}" name="phone_number" disabled /></td>
                </tr>
                <tr>
                    <td>Alamat lengkap&nbsp;:</td>
                    <td><textarea class="w96" rows="10" cols="40" name="address" disabled >{$customer_address}</textarea></td>
                </tr>
                <tr>
                    <td>Provinsi&nbsp;:</td>
                    <td><input type="text" value="{$customer_state}" name="state" disabled /></td>
                </tr>
                <tr>
                    <td>Kota&nbsp;:</td>
                    <td><input type="text" value="{$customer_city}" name="city" disabled /></td>
                </tr>                
                <tr>
                    <td>kode pos&nbsp;:</td>
                    <td><input type="text" value="{$customer_postal_code}" name="postal_code" disabled /></td>
                </tr>
            </tbody>
        </table>
    </div>
            
    <div class="checkout-product">
        <table>
            <thead>
                <tr>
                    <td colspan="5" class="name"><center>DATA BELANJAAN ANDA</center></td>
                </tr>
                <tr>
                    <td colspan="2" class="name">Nama Produk</td>
                    <td class="price">Harga satuan</td>
                    <td class="quantity">Jumlah</td>                    
                    <td class="total">Total</td>
                </tr>
            </thead>
            <tbody>
                {foreach from=$bought_data item=product}
                <tr>
                    <td colspan="2" class="name"><a href="#">{$product.product_name}</a></td>
                    <td class="price">{$product.product_price}</td>
                    <td class="quantity">{$product.qty}</td>                    
                    <td class="total">{$product.subtotal}</td>
                </tr>
                {/foreach}
            </tbody>
            <tfoot>
                <tr>
                    <td class="price" colspan="4"><b>Total belanja :</b></td>
                    <td class="total">{$total_buy}</td>
                </tr>
                <tr>
                    <td class="price" colspan="4"><b>Ongkos kirim :</b></td>
                    <td class="total"> - </td>
                </tr>
                <tr>
                    <td class="price" colspan="4"><b>Total keseluruhan :</b></td>
                    <td class="total"> - </td>
                </tr>
            </tfoot>
        </table>       
    </div>
    
    <div class="buttons">
        <div class="right">
            <input type="submit" class="button" id="button-confirm" value="Proses" />
        </div>
    </div>

</form>