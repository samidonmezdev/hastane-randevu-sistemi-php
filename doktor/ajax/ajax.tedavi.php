<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 25.02.2019
 * Time: 07:54
 */
if($_POST){
    include("../../assets/php/fonksiyon.php");
    $randevuid=$_POST["randevuid"];
    $recete=$_POST["recete"];
    $tanim=$_POST["tanim"];
    $sikayet=$_POST["sikayet"];

    include("../../assets/php/baglanti.php");
    $baglanti=new baglanti();
    $islem=$baglanti->insert("sonuç",array("rand_id","recete_id","tanım","sikayet"),array($randevuid,$recete,$tanim,$sikayet));
    if ($islem!=0){

        echo $islem;
    }else{
        echo "0";
    }

}
?>