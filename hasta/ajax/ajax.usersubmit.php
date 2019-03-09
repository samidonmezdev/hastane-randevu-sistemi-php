<?php
if ($_POST){
    session_start();
    include("../../assets/php/fonksiyon.php");
    include ("../../assets/php/baglanti.php");
    $username=$_POST['username'];
    $email=$_POST['email'];
    $adres=$_POST['adres'];
    $tel=$_POST['tel'];
    try{
    $conn=new baglanti();
    $islem=$conn->update("kullanıcı",array("kull_ad","email","tel","adres"),array($username,$email,$tel,$adres),"kul_id=".$_SESSION['id']);
    if ($islem==1){
        echo 1;
    }else{
        echo 0;
    }}catch (\mysql_xdevapi\Exception $e){
        echo 2;
    }

}else{
    echo "yetki alanınızı aştınız ";
}