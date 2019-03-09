<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 25.02.2019
 * Time: 03:01
 */

if ($_GET){
    if(isset($_GET['id'])){
        $randid=$_GET['id'];

    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
include ("header.php");
include ("../assets/php/baglanti.php");
$conn=new baglanti();
$bilgi=$conn->select(0,"randevu INNER JOIN kullanıcı ON randevu.kull_id=kullanıcı.kul_id",array("kullanıcı.ad","kullanıcı.soyad","kullanıcı.tc","randevu.rand_id","randevu.kull_id"),"rand_id=".$randid);
//print_r($bilgi);
?>

<div class="content col-md-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Hasta bak</h4>
                    </div>
                    <div class="content" id="cont">

                            <input type="hidden" id="randid" value="<?=$bilgi['rand_id'] ?>">
                        <input type="hidden" id="receteid" value="2">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TC</label>
                                        <input type="text" disabled="disabled" class="form-control border-input" placeholder="Username" value="<?=$bilgi['tc'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reçete No</label>
                                        <textarea class="form-control border-input" id="recete" disabled="disabled" placeholder="lütfen recete verin"  rows="1"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ad</label>
                                        <input type="text" disabled="disabled" class="form-control border-input" placeholder="Company" value="<?=$bilgi['ad'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Soyad</label>
                                        <input type="text" disabled="disabled" class="form-control border-input" placeholder="Last Name" value="<?=$bilgi['soyad'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Şikayet</label>
                                        <input type="text" id="sikayet" class="form-control border-input" placeholder="sikayet...." >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hastalık tanım</label>
                                        <textarea class="form-control border-input" id="tanım" placeholder="hastalık tanımı ve tedavi bilgileri" rows="6"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center col-md-4">
                                    <button type="submit" onclick="tedavi()" class="btn btn-info btn-fill btn-wd">Tedavi bitir</button>
                                </div>
                            <div class="text-center col-md-4">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#ornekModal2" >Recete ver</button>
                            </div>
                            <div class="text-center col-md-4">
                                <button type="submit" class="btn btn-primary btn-fill btn-wd" data-toggle="modal" data-target="#ornekModal" >Tahlil iste</button>
                            </div>

                            </div>
                            <div class="clearfix"></div>


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
                <button type="button" class="btn btn-primary" >Değişiklikleri Kaydet</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  recete modal -->
<div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="ornekModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Başlığı</h4>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                        <label>Hastalık tanım</label>
                        <textarea class="form-control border-input" id="recetealan" placeholder="hastalık tanımı ve tedavi bilgileri" rows="6"></textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="recete()">Değişiklikleri Kaydet</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script TYPE="text/javascript">
    function recete() {
        var randevuid=$("#randid").val();
        var recete=$("#recetealan").val();
        if(randevuid==''||recete=='')
        {
            alert("Lütfen boş alan bırakmayınız.");
        }
        else {
// AJAX Code To Submit Form.
            var datastring="randevuid="+randevuid+"&recete="+recete;
            $.ajax({
                type: "POST",
                url: "ajax/ajax.recete.php",
                data: datastring,
                cache: false,
                success: function (result) {
                    if (result!="0"){
                        alert("recete kayıt edildi");
                        $("#receteid").attr('value',result.toString());

                    } else {
                        alert("hata oluştu")
                    }
                }
            });
        }
    }
    function tedavi() {
        var randevuid=$("#randid").val();
        var recete=$("#receteid").val();
        var tanim=$("#tanım").val();
        var sikayet=$("#sikayet").val();
        if(randevuid==''||recete==''||tanim==''||sikayet=='')
        {
            alert("Lütfen boş alan bırakmayınız.");
        }
        else {
// AJAX Code To Submit Form.
            var datastring="randevuid="+randevuid+"&recete="+recete+"&tanim="+tanim+"&sikayet="+sikayet;
            $.ajax({
                type: "POST",
                url: "ajax/ajax.tedavi.php",
                data: datastring,
                cache: false,
                success: function (result) {
                 if (result!=0){
                     alert("tedavikayıtları tamamlandı");
                     window.location = "index.php";
                 } else{
                     alert("hata oluştu tekrar deneyiniz")
                 }
                }
            });
        }

    }
</script>

</body>

<?php
include("script.php");
?>

</html>
