<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 25.02.2019
 * Time: 03:01
 */
include ("../assets/php/baglanti.php");
include ("header.php");
$conn=new baglanti();
$liste=$conn->select(0,"kullanıcı",array("*"),"kul_id=".$id);

?>

<div id="sonuc"></div>
        <div class="content col-md-12">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Bilgi Güncelle</h4>
                                <div id="sonuc"></div>
                            </div>
                            <div class="content">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kullanıcı Adı</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" id="username" value="<?php echo $liste['kull_ad'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Adresi</label>
                                                <input type="email" class="form-control border-input" id="email" value="<?php echo $liste['email'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ad</label>
                                                <input type="text" class="form-control border-input" disabled="disabled" id="name" value="<?php echo $liste['ad'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Soyad</label>
                                                <input type="text" class="form-control border-input" disabled="disabled" id="surname" value="<?php echo $liste['soyad'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input type="text" class="form-control border-input" id="adres" placeholder="Home Address" value="<?php echo $liste['adres'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>telefon</label>
                                                <input type="text" class="form-control border-input" id="tel"  value="<?php echo $liste['tel'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TC</label>
                                                <input type="text" class="form-control border-input" id="tc" value="<?php echo $liste['tc'];?>" disabled="disabled">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" onclick="submitinf()" class="btn btn-info btn-fill btn-wd">Bilgi güncelle</button>
                                    </div>
                                    <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
<script>

    function submitinf(){

        var email = $("#email").val();
        var username = $("#username").val();
        var adres = $("#adres").val();
        var tel = $("#tel").val()


// Returns successful data submission message when the entered information is stored in database.
        var dataString = "";
        if(email==''||username==''||adres==''||tel=='')
        {
            alert("Lütfen boş alan bırakmayınız.");
        }
        else {
// AJAX Code To Submit Form.
            var datastring="email="+email+"&username="+username+"&adres="+adres+"&tel="+tel;
            $.ajax({
                type: "POST",
                url: "ajax/ajax.usersubmit.php",
                data: datastring,
                cache: false,
                success: function (result) {
                    if (result==1){
                        $("#sonuc").html("başarılı");
                    }else {
                        $("#sonuc").html("hata");
                    }

                }
            });
        }}
</script>



    </div>
</div>


</body>

<?php
include("script.php");
?>

</html>
