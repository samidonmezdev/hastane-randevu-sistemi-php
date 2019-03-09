<?php

session_start();
if ($_SESSION){
    if ($_SESSION['giris']=="ok"){
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
        <div id="sonuc"></div>
        <p>isim:</p>
      <input type="text" id="name" placeholder="ad"/>
        <p>soyisim:</p>
        <input type="text" id="surname" placeholder="soyad"/>
        <p>T.C kimlik no:</p>
        <input type="text" id="tc" placeholder="11111111111"/>
        <p>kullanıcı adı:</p>
        <input type="text" id="nick" placeholder="name"/>
        <p>email:</p>
      <input type="text" id="email" placeholder="surname@a.com"/>
        <p>sifre:</p>
        <input type="password" id="pass" placeholder="***********"/>
      <button id="buton" onclick="login()">create</button>
      <p class="message">Kayıtlı mısınız? <a href="login.php">Giriş yap</a></p>
    </div>
    

</div>
<script type="text/javascript">
    function login(){
        var email = $("#email").val();
        var password = $("#pass").val();
        var name = $("#name").val();
        var surname = $("#surname").val();
        var username = $("#username").val();
        var tc = $("#tc").val();
        if(email==''||password==''||name==''||surname==''||username==''||tc=='')
        {
            alert("Lütfen boş alan bırakmayınız.");
        }
        else {
            var datastring="email="+email+"&sifre="+password+"&username="+username+"&name="+name+"&surname="+surname+"&tc="+tc;
            $.ajax({
                type: "POST",
                url: "ajax/ajax.userregister.php",
                data: datastring,
                cache: false,
                success: function (result) {
                    alert(result);

                }
            });
        }}
</script><script src="<?php echo $src; ?>js/jquery.min.js"></script>
<script src="<?php echo $src; ?>js/index.js"></script>
</body>
</html>