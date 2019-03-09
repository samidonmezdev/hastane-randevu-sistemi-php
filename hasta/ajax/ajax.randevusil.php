<?php
if ($_POST){
    include("../../assets/php/fonksiyon.php");
    include ("../../assets/php/baglanti.php");
    $id=$_POST['id'];
    $conn=new baglanti();
    $islem=$conn->delete("randevu","rand_id=".$id);
    if ($islem==1){
            echo 1;
    }else{
        echo 0;
    }

}else{
    echo "yetki alanınızı aştınız";
}