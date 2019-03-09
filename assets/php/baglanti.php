<?php
/**
 * Created by PhpStorm.
 * User: sami
 **/
class baglanti{protected $host = "localhost";
    protected $dbname = "pythonha_hrs";
    protected $nick = "root";
    protected $pass = "";
    protected $dsn = "";
    protected $db;
    public function ac(){$this->dsn =  'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
        try {$this->db = new PDO($this->dsn, $this->nick, $this->pass);;}
        catch (PDOException $e) {echo 'Veritabanı bağlantısı başarısız oldu: ' . $e->getMessage();}}
//-----------------------------------------------------------------------------------------------------------------------------------------
    public function kapat(){$this->db = null;}
//-----------------------------------------------------------------------------------------------------------------------------------------
    public function security($txt)
    {return addslashes(strip_tags($txt));}
//-----------------------------------------------------------------------------------------------------------------------------------------
    public function select($tip, $tbl, $stn, $sart = "0"){$this->ac();
        try {$sqlstr = "select ".implode(",",$stn)." from ".$tbl;
            $sqlstr .=($sart == "0")?"":" where ".$sart;
            $sqlstr=str_replace("\'","'",$this->security($sqlstr));
           $sonuc = ($tip == 1 ? $this->db->query($sqlstr)->fetchAll() :$this->db->query($sqlstr)->fetch() );
        }catch (\mysql_xdevapi\Exception $e) {$sonuc = 0;}
        $this->kapat();
        return $sonuc;}
//-----------------------------------------------------------------------------------------------------------------------------------------
    public function insert($tbl, $stn, $deger){$this->ac();
        if (count($stn) == count($deger)) {try {$sqlstr = str_replace("\'","'",$this->security("INSERT INTO ".$tbl." ( ".implode(",",$stn).") VALUES('".implode("','",$deger)."')"));
                if ($this->db->exec($sqlstr)) $sonuc = $this->db->lastInsertId(); else $sonuc = -2;
            }catch (\mysql_xdevapi\Exception $e) {$sonuc = -1;}
        }else {$sonuc = 0;}
        $this->kapat();
        return $sonuc;}
//-----------------------------------------------------------------------------------------------------------------------------------------
    public function update($tbl, $stn, $deger, $sart = "0"){$this->ac();
        if (count($stn) == count($deger)) {try {$sqlstr = "UPDATE " .$tbl. " SET ";
                $i = 0;
                while ($i < count($stn)) {
                    $sqlstr .= ($i == count($stn)-1 ?  $stn[$i]."='".$deger[$i] . "' ":$stn[$i] . "='" . $deger[$i] . "',");
                    $i++;}
                $sqlstr .= ($sart != "0") ?  "where ".$sart:"";
                $sqlstr =str_replace("\'","'",$this->security($sqlstr));
                $sonuc =($this->db->exec($sqlstr))?1:0;
            } catch (\mysql_xdevapi\Exception $e) {$sonuc =0;}}
        $this->kapat();
        return $sonuc;}
//-----------------------------------------------------------------------------------------------------------------------------------------
    public function delete($tbl, $sart){$this->ac();
        try {$sqlstr = "DELETE FROM " . $this->security($tbl) . "  WHERE " . $this->security($sart);
            $sonuc =($this->db->exec($sqlstr))?1:0;
        }catch (\mysql_xdevapi\Exception $e) {$sonuc = 0;}
        $this->kapat();
        return $sonuc;}
}

?>