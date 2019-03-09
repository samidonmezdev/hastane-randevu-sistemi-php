<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 5.03.2019
 * Time: 15:42
 */

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
        $islem=$conn->update("doktor",array("kull_ad","mail","telefon","adres"),array($username,$email,$tel,$adres),"doktor_id=".$_SESSION['doktorid']);
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