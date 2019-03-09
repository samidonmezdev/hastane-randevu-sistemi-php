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
$pol=$conn->select(1,"poliklinik",array("*"));
$saat=$conn->select(1,"saat",array("*"));
?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">Randevu al</h4>
                            <div id="sonuc"></div>
                        </div>
                        <div class="content">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TC KİMLİK NO</label>
                                        <input type="text" class="form-control border-input" placeholder="Username" id="username" disabled="disabled" value="<?php echo $_SESSION['tc'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İSİM SOYİSİM</label>
                                        <input type="email" class="form-control border-input" id="email" disabled="disabled" value="<?php echo $_SESSION['ad'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Poliklinik-</label>
                                        <select  class="form-control form-control-sm" id="pol" onchange="getdoktor()">
                                           <option value="0">seçim yapınız...</option>
                                            <?php

                                           foreach ($pol as $p){
                                               echo  '<option value="'.$p['pol_id'].'">'.$p['pol_ad'].'</option>';
                                           }
                                           ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doktor-</label>
                                        <select id="doktor" class="form-control form-control-sm">
                                            <option>LÜTFEN ÖNCE POLİKLİNİK SEÇİNİZ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>gün</label>
                                        <select id="gun" class="form-control form-control-sm">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                            <option>21</option>
                                            <option>22</option>
                                            <option>23</option>
                                            <option>24</option>
                                            <option>25</option>
                                            <option>26</option>
                                            <option>27</option>
                                            <option>28</option>
                                            <option>29</option>
                                            <option>30</option>
                                            <option>31</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ay</label>
                                        <select class="form-control form-control-sm" id="ay">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Yıl</label>
                                        <select id="yıl" class="form-control form-control-sm">
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Saat</label>
                                    <select id="saat" class="form-control form-control-sm">
                                        <option value="0">seçim yapınız...</option>
                                        <?php

                                        foreach ($saat as $p){
                                            echo  '<option value="'.$p['saat_id'].'">'.$p['saat_aralık'].'</option>';
                                        }
                                        ?>

                                    </select>
                                </div></div></div>
                            <div class="text-center">
                                <button type="submit" onclick="submitran()" class="btn btn-info btn-fill btn-wd">RANDEVU OLUSTUR</button>
                            </div>
                            <div class="clearfix"></div>

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
    function getdoktor() {
        var id=$("#pol").val();
        var datastring="id="+id;
        $.ajax({
            type: "POST",
            url: "ajax/ajax.doktorcek.php",
            data: datastring,
            cache: false,
            success: function (result) {
                var obje=JSON.parse(result);
                var  htmlaktar='';
                var i=0;
                while (i<obje.length){
                    htmlaktar=htmlaktar+'<option value="'+obje[i].doktor_id+'">'+obje[i].ad+' '+obje[i].soyad+'</option>';
                    i++;
                }
                $("#doktor").innerHTML="";
                $("#doktor").html(htmlaktar);
            }
        });

    }
    function submitran(){
        var gun=$("#gun").val();
        var ay=$("#ay").val();
        var yil=$("#yıl").val();
// Returns successful data submission message when the entered information is stored in database.
        var tarih = new Date();
        var kyil=tarih.getFullYear();
        var kay=tarih.getMonth();
        var kgun=tarih.getDate();
       if (yil>=kyil){
           if (ay>=(kay+1)){
               if (gun>kgun) {
                   if(gun<10){
                       gun=String("0"+gun);
                   }
                   if (ay<10){
                       ay=String("0"+ay);
                   }
                   var d = new Date(String(ay+"/"+gun+"/"+yil));
                   var n = d.getDay();
                   if (n==0||n==6){
                       alert("CUMARTESİ VE PAZAR GÜNLERİ POLİKLİNİKLER KAPALIDIR.SİZLERİ ACİL BİRİMİMİZE BEKLİYORUZ.");
                   }else {
                       var id=$("#doktor").val();
                       var saat=$("#saat").val();
                       var datastring=String("doktor="+id+"&tarih="+yil+"-"+ay+"-"+gun+"&saat="+saat);
                       $.ajax({
                           type: "POST",
                           url: "ajax/ajax.submitrandevu.php",
                           data: datastring,
                           cache: false,
                           success: function (result) {

                               if (result=="1"){
                                   alert("Randevu oluşturuldu.");
                               }else{
                                   alert("hata oluştu");
                               }
                           }
                       });

                   }

               }else if (gun==kgun){
                   alert("bugün için randevu alınamaz!");
               } else{
                   alert("geçmis tarihler için randevu alınamaz!");
               }
           }else {
               alert("geçmis tarihler için randevu alınamaz!");
           }
       }else{
           alert("geçmis tarihler için randevu alınamaz!");
       }}

</script>
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "Hoşgeldiniz ..."

        },{
            type: 'success',
            timer: 4000
        });

    });
</script>

</html>

