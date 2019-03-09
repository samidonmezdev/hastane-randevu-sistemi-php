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
    include("../../assets/php/baglanti.php");
    $baglanti=new baglanti();
    $islem=$baglanti->insert("recete",array("rand_id","reçete"),array($randevuid,$recete));
    if ($islem!=0){

        echo $islem;
    }else{
        echo "0";
    }

}
?>