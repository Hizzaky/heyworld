/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


function prodiDeleteTaxbloom(dir) {
    window.location.href = 'hapus-index/'+dir;
}
function prodiDeleteTaxbloomPermanen(dir) {
    window.location.href = 'delete-permanen/'+dir;
}
function prodiRestoreTaxbloom(dir) {
    window.location.href = 'restore-index/'+dir;
}
function modalKataKerja(id,index) {
    document.getElementById('id').value=id;
    let strReplace=index.replace('_',' ');
    let katalog='Mampu '+strReplace; 
    // document.getElementById('katalog').value=katalog;
    document.getElementById('show').value=katalog;
    $('#modalKataKerja').modal('hide');
}
function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight) + "px";
}

ppTextarea();
function ppTextarea(){
    document.getElementById('konteksPp').value='asd';
}