<?php
if ($_POST) {
    session_start();
    $doktor = $_POST['doktor'];
    $saat = $_POST['saat'];
    $tarih = $_POST['tarih'];
    $id=$_SESSION['id'];
    include("../../assets/php/baglanti.php");
    $conn = new baglanti();
    $liste=$conn->select(0,"randevu",array("count(*) as onay"),"dok_id=".$doktor." AND saat_id=".$saat." AND tarih='".$tarih."'");
    if ($liste['onay']==0){
        $islem=$conn->insert("randevu",array("dok_id","saat_id","tarih","kull_id"),array($doktor,$saat,$tarih,$id));
        if ($islem!=0){
        echo 1;
        }
    }else{
        echo 0;
    }

}