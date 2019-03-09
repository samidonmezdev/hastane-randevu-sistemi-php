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
$bilgi=$conn->select(0,"doktor",array("ad","soyad","tc","mail","telefon","kull_ad","adres"),"doktor_id=".$id);
//print_r($bilgi);

?>


        <div class="content col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Bilgi Güncelle</h4>
                            </div>
                            <div class="content">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kullanıcı Adı</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" id="username" value="<?=$bilgi['kull_ad']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Adresi</label>
                                                <input type="email" class="form-control border-input" id="email" placeholder="Email" value="<?=$bilgi['mail']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ad</label>
                                                <input disabled="disabled" type="text" class="form-control border-input" placeholder="Company" id="name" value="<?=$bilgi['ad']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Soyad</label>
                                                <input type="text" disabled="disabled" class="form-control border-input" placeholder="Last Name" id="surname" value="<?=$bilgi['soyad']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address"  id="adres" value="<?=$bilgi['adres']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>telefon</label>
                                                <input type="text" class="form-control border-input" placeholder="tel" id="telefon" value="<?=$bilgi['telefon']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>TC</label>
                                                <input type="text" class="form-control border-input" disabled="disabled" id="tc" value="<?=$bilgi['tc']?>">
                                            </div>
                                        </div>

                                    <div class="text-center">
                                        <button type="submit" onclick="update()" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>




    </div>
</div>
<script type="text/javascript">
    function update() {
        var email = $("#email").val();
        var username = $("#username").val();
        var adres = $("#adres").val();
        var tel = $("#telefon").val();


// Returns successful data submission message when the entered information is stored in database.
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
                       alert("Bilgileriniz başarıyla güncellendi.");
                       window.location.reload(false);
                   }else{
                       alert("Hata oluştu veya bilgilerinizde degişiklik yapmadınız.daha sonra tekrar deneyiniz")
                   }

                }
            });
        }}



</script>

</body>

<?php
include("script.php");
?>

</html>
