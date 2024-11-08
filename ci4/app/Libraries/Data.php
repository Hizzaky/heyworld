<?php namespace App\Libraries;

class Data{
    public function alert($params) {
        return view('komponen/load/alert',$params);
    }
    public function loop() {
        return view('komponen/load/loop');
    }
    public function modalTbl() {
        return view('komponen/load/modalTbl');
    }
    public function modalTaxbloomKonteks() {
        return view('komponen/load/modalTaxbloomKonteks');
    }
}


?>