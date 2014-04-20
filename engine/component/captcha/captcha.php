<?php

session_start();

/*tentukan tipe gambar yang mau di pake di header*/
header("Content-type: image/png");

/*panggil gambar buat background kode captchanya*/
$CaptchaImg = imagecreatefrompng("captcha.png");

/*panggil jenis fontnya*/
$CaptchaFont = imageloadfont("anonymous.gdf");

/*ambil 6 digit teks dari hasil enkripsi md5(32karakter)*/
$CaptchaText = substr(md5(uniqid('')),-6,6);

/*simpan kode captcha di session(server)*/
$_SESSION['captcha_session'] = $CaptchaText;

/*warna dari teks kode captchanya*/
$CaptchaColor = imagecolorallocate($CaptchaImg,0,0,0);

/*acak kode captchanya*/
imagestring($CaptchaImg,$CaptchaFont,15,5,$CaptchaText,$CaptchaColor);

/*cetak/tampilkan kode captchanya*/
imagepng($CaptchaImg);

/*kalau sudah selesai, hapus gambar captchanya*/
imagedestroy($CaptchaImg);