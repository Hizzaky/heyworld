<?php namespace App\Libraries;

class Data{
    public function alert($params) {
        return view('komponen/data/alert',$params);
    }
    public function loop() {
        return view('komponen/data/loop');
    }
    public function modalTbl() {
        return view('komponen/data/modalTbl');
    }
    public function modalTaxbloomKonteks() {
        return view('komponen/data/modalTaxbloomKonteks');
    }
}


?>