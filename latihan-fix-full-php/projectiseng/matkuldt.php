<?php
class Matkul
{    protected $kodematkul = '';    protected $namamatkul = '';    protected $sks = 0;    protected $tugas = 0;
    protected $uts = 0;
    protected $uas = 0;    protected $semester = 0;private static $count =0;
    public function __construct($kode, $nama, $sks, $tugas, $uts, $uas, $semester)
    {
        $this->kodematkul = $kode;
        $this->namamatkul = $nama;
        $this->sks = $sks;
        $this->tugas = $tugas;
        $this->uts = $uts;
        $this->uas = $uas;
        $this->semester = $semester;
        self::$count++;
    }    
    public static function getCount(){
        return self::$count;
    }
    public function getKodeMatkul()
    {
        return $this->kodematkul;    
    }
    public function getNamaMatkul()
    {
        return $this->namamatkul;    
    }
    public function getSks()
    {
        return $this->sks;    
    }
    public function getTugas()
    {
        return $this->tugas;    
    }
    public function getUts()
    {
        return $this->uts;    
    }
    public function getUas()
    {
        return $this->uas;    
    }
    public function getSemester()
    {
        return $this->semester;    
    }
    //Setter Object Class
    public function setKodeMatkul($kode)
    {
         $this->kodematkul = $kode;    
    }
    public function setNamaMatkul($nama)
    {
         $this->namamatkul = $nama;    
    }
    public function setSks($sks)
    {
         $this->sks = $sks;    
    }
    public function setTugas($tugas)
    {
         $this->tugas = $tugas;    
    }
    public function setUts($uts)
    {
         $this->uts = $uts;    
    }
    public function setUas($uas)
    {
         $this->uas = $uas;    
    }
    public function setSemester($semester)
    {
         $this->semester = $semester;    
    }

}
