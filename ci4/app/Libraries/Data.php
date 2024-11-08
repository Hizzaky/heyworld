<?php namespace App\Libraries;

class Data{
    public function alert($params) {
        return view('komponen/load/alert',$params);
    }
    public function loop() {
        return view('komponen/load/loop');
    }
    public function modalTaxbloomTbl($params) {
        return view('komponen/load/modalTaxbloomTbl');
    }
    public function modalTaxbloomKonteks() {
        return view('komponen/load/modalTaxbloomKonteks');
    }
}


?>