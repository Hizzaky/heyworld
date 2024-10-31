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
function modalKataKerja(id,katalog) {
    document.getElementById('id').value=id;
    let strReplace=katalog.replace('_',' ');
    document.getElementById('katalog').value=strReplace;
    $('#modalKataKerja').modal('hide');
}