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
    $sifre=md5(güvenlik($_POST["sifre"]));
    include("../../assets/php/baglanti.php");
    $baglanti=new baglanti();
    $islem=$baglanti->select(0,'doktor',array("doktor_id","count(*) as giris","tc"),"kull_ad='".$email."' and sifre='".$sifre."'");
    if ($islem["giris"]==1){
        session_start();
        $_SESSION['doktorgiris']="ok";
        $_SESSION['doktorid']=$islem['doktor_id'];
        echo "1";
    }else{
        echo "0";
    }

}
?>