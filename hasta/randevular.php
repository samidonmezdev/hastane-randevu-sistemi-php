<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 25.02.2019
 * Time: 03:01
 */


include ("header.php");
include ("../assets/php/baglanti.php");
$conn=new baglanti();
date_default_timezone_set('Europe/Istanbul');
$randevu=$conn->select(1,"randevu",array("*"),"kull_id=".$_SESSION['id']." AND tarih>'".date('Y-m-d')."'");
$doktor=$conn->select(1,"doktor",array("ad","soyad","pol_id"));
$saat=$conn->select(1,"saat",array("*"));
$pol=$conn->select(1,"poliklinik",array("*"));

?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Randevu Tablosu</h4>
                        <p class="category">tarihli hastalar</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th>POLİKLİNİK</th>
                            <th>DOKTOR</th>
                            <th>TARİH</th>
                            <th>SAAT</th>
                            <th>İPTAL</th>
                            </thead>
                            <tbody>
                            <?php
                            if(count($randevu)>0){
                                $i=0;
                            while ($i<count($randevu)){
                                $doktorid=$randevu[$i]['dok_id']-1;
                                $saatid=$randevu[$i]['saat_id']-1;
                                $polid=$doktor[$doktorid]['pol_id']-1;
                                ?>
                                <tr>
                                    <td><?php echo $pol[$polid]['pol_ad'];?></td>
                                    <td><?php echo $doktor[$doktorid]['ad']." ".$doktor[$doktorid]['soyad'];?></td>
                                    <td><?php echo $randevu[$i]['tarih'];?></td>
                                    <td><?php echo $saat[$saatid]['saat_aralık'];?></td>
                                    <td><button class="btn btn-success" onclick="submitran1()" id="buton" value="<?php echo $randevu[$i]['rand_id'];?>">İPTAL ET</button></td>

                                        </td>
                                </tr>
                                <?php
                           $i++;
                            }}else{
                                echo "<td>Aktif randevunuz bulunamadı</td>";
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            </div>
</div>


</div>
</div>

</body>

<?php
include("script.php");
?>
<script type="text/javascript">

    function submitran1() {
        var deger = $('#buton').val();
        var datastring = "id=" + deger;
        $.ajax({
            type: "POST",
            url: "ajax/ajax.randevusil.php",
            data: datastring,
            cache: false,
            success: function (result) {
                if(result=="1"){
                    alert("Randevunuz iptal edilmiştir");
                    window.location.reload(false);
                }else{
                    alert("işlemiz yapılamadı.lütfen sonra tekrar deneyiniz");
                }



            }
        });
    }



</script>


</html>

