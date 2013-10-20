<h1>DASHBOARD PELANGGAN</h1>

<div id="tabs" class="htabs"> 
    <a href="#tab-1"><b>SELAMAT DATANG</b></a> 
    <a href="#tab-2"><b>CEK ONGKIR</b></a>
    <a href="#tab-3"><b>PROFIL</b></a>
    <a href="#tab-4"><b>UBAH DATA LOGIN</b></a>
    <a href="#tab-5"><b>DAFTAR KEINGINAN</b></a>
</div>

<div id="tab-1" class="tab-content"> 
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
    <br /><br />
    It has survived not only five centuries, but also the leap into electronic typesetting, 
    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker 
    including versions of Lorem Ipsum. 
</div>

<div id="tab-2" class="tab-content">
    <form method="post" action="" > 
        <table>            
            <tbody>
                <tr>
                    <td>Kota Tujuan:</td>
                    <td><input type="text" name="destination" /></td>
                </tr>
                <tr>
                    <td>Berat(Kg):</td>
                    <td><input type="text" value="" name="weight" /></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button"  value="Cek" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<div id="tab-3" class="tab-content">
    <form method="post" action="" > 
        <table>            
            <tbody>
                <tr>
                    <td>Nama Lengkap&nbsp;:</td>
                    <td><input type="text" value="{$customer_fullname}" name="fullname" /></td>
                </tr>
                <tr>
                    <td>Jenis kelamin&nbsp;:</td>
                    <td>{$customer_sex}</td>
                </tr>
                <tr>
                    <td>E-Mail&nbsp;:</td>
                    <td><input type="text" value="{$customer_email}" name="email" /></td>
                </tr>
                <tr>
                    <td>Nomor telepon&nbsp;:</td>
                    <td><input type="text" value="{$customer_phone}" name="phone_number" /></td>
                </tr>
                <tr>
                    <td>Alamat lengkap&nbsp;:</td>
                    <td><textarea class="w96" rows="10" cols="40" name="address" >{$customer_address}</textarea></td>
                </tr>
                <tr>
                    <td>Provinsi&nbsp;:</td>
                    <td><input type="text" value="{$customer_state}" name="state" /></td>
                </tr>
                <tr>
                    <td>Kota&nbsp;:</td>
                    <td><input type="text" value="{$customer_city}" name="city" /></td>
                </tr>                
                <tr>
                    <td>kode pos&nbsp;:</td>
                    <td><input type="text" value="{$customer_postal_code}" name="postal_code" /></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button"  value="Simpan perubahan" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<div id="tab-4" class="tab-content">
    <form method="post" action="" > 
        <table>            
            <tbody>
                <tr>
                    <td>Username&nbsp;:</td>
                    <td><input type="text" value="{$customer_username}" name="username" /></td>
                </tr>
                <tr>
                    <td>Password&nbsp;:</td>
                    <td><input type="text" name="password" /></td>
                </tr>
                <tr>
                    <td>Konfirmasi password&nbsp;:</td>
                    <td><input type="text" name="re_password" /></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button"  value="Simpan perubahan" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<div id="tab-5" class="tab-content">    
    <table border="1">    
        <thead>
            <tr>
                <td>Produk</td>
                <td>Harga</td>
                <td>Tgl. dimasukan</td>
                <td>#</td>
            </tr>
        </thead>        
        <tbody>
            {if $total_wishlist > 0}
                {foreach from=$customer_wishlist item=list}
                    <tr>
                        <td>{$list.product_name}</td>
                        <td>{$list.product_price}</td>
                        <td>{$list.date_added}</td>
                        <td><a href="">Hapus dari daftar</a></td>
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <td colspan="4">Daftar keinginan anda masih kosong...</td>
                </tr>
            {/if}
        </tbody>        
    </table>    
</div>        