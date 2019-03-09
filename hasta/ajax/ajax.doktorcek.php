<?php

if ($_POST){
    $id=$_POST['id'];
    include("../../assets/php/baglanti.php");
    $conn=new baglanti();
    $liste=$conn->select(1,"doktor",array("doktor_id","ad","soyad"),"pol_id=".$id);
    $mylist=[];
    $i=0;
    while ($i<count($liste)){
        $mylist[$i]=$liste[$i];
        $i++;
    }
    $myjson=json_encode($mylist,JSON_UNESCAPED_UNICODE);
    echo $myjson;
}