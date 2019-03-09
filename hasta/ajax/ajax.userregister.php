<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 25.02.2019
 * Time: 07:54
 */
if($_POST){
    include("../../assets/php/fonksiyon.php");
    $email=güvenlik($_POST["email"]);
    $name=güvenlik($_POST["name"]);
    $surname=güvenlik($_POST["surname"]);
    $username=güvenlik($_POST["username"]);
    $tc=güvenlik($_POST["tc"]);
    $sifre=md5(güvenlik($_POST["sifre"]));
    include("../../assets/php/baglanti.php");
    $baglanti=new baglanti();
    $islem=$baglanti->insert("kullanıcı",array("ad","soyad","email","sifre","kull_ad","tc"),array($name,$surname,$email,$sifre,$username,$tc));
    if ($islem!=0){
        echo "1";
    }else{
        echo "0";
    }
}else{
    echo "yetki alanınızı aştınız";
}
?>