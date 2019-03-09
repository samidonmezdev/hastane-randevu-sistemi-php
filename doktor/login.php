<?php
session_start();
if (isset($_SESSION['doktorgiris'])){
    if ($_SESSION['doktorgiris']=="ok"){
        header("Location: index.php");
    }}
include("../assets/php/string.php");
?>
<html>
<head>
<link href="<?php echo $src; ?>css/index.css" rel="stylesheet"/>

</head>
<body>
<div class="login-page">
  <div class="form">
    
        <p class="sonuc"></p>
        <p>Kullanıcı adı</p>
      <input type="text" id="nick" name="nick" placeholder="kullanıcı adı"/>
        <p>Şifre</p>
      <input type="password" id="pass" name="pass" placeholder="sifre"/>
      <button type="button" onclick="login()" id="log">login</button>

      <p class="message">Kayıtlı degil misin? <a href="register.html"> Kayıt ol</a></p>

  </div>
</div>
<script type="text/javascript">
    function login(){

        var email = $("#nick").val();
        var password = $("#pass").val();

// Returns successful data submission message when the entered information is stored in database.
        var dataString = "";
        if(email==''||password=='')
        {
            alert("Lütfen boş alan bırakmayınız.");
        }
        else {
// AJAX Code To Submit Form.
            var datastring="email="+email+"&sifre="+password;
            $.ajax({
                type: "POST",
                url: "ajax/ajax.login.php",
                data: datastring,
                cache: false,
                success: function (result) {

                    if (result==1){
                        $('.sonuc').html('Giriş işlemi başarılı. yönlendiriliyor....');
                        setTimeout(function(){
                            window.location = "index.php";
                        }, 2000);
                    }else {
                        $('.sonuc').html('hatalı');
                    }

                }
            });
        }}
</script>
<script src="<?php echo $src; ?>js/jquery.min.js"></script>
<script src="<?php echo $src; ?>js/index.js"></script>
</body>
</html>