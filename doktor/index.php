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
$tarih=date("Y-m-d");//date("Y-m-d")
$randevuliste=$conn->select(1,"randevu INNER JOIN kullanıcı ON randevu.kull_id=kullanıcı.kul_id INNER JOIN saat ON randevu.saat_id=saat.saat_id",array("randevu.rand_id","saat.saat_aralık","kullanıcı.ad","kullanıcı.soyad","kullanıcı.tc"),"randevu.tarih='".$tarih."' and randevu.durum='0' and randevu.dok_id='".$id."' ORDER BY randevu.saat_id ASC");

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
                                <th>SAAT</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>TC KİMLİK</th>
                                <th>İŞLEMLER</th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($randevuliste as $r){
                                ?>
                                <tr>
                                    <td><?=$r['saat_aralık']?></td>
                                    <td><?=$r['ad']?></td>
                                    <td><?=$r['soyad']?></td>
                                    <td><?=$r['tc']?></td>
                                    <td><a href="hasta.php?id=<?=$r['rand_id']?>"><button class="btn btn-primary" >MUAYENE ET</button></a></td>
                                </tr>
                                <?php } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
        </div>
    </div>




</div>
</div>
<!--  tahlil modal -->
<div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="ornekModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Başlığı</h4>
            </div>
            <div class="modal-body">
                <p>tahlil al</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary">Değişiklikleri Kaydet</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>

<?php
include("script.php");
?>
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "hoşgeldiniz"

        },{
            type: 'success',
            timer: 4000
        });

    });
</script>

</html>

