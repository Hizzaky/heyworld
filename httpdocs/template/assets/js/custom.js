/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


function prodiDeleteTaxbloom(id) {
    window.location.href = 'hapus-index/' + id;
}
function prodiDeleteTaxbloomPermanen(id) {
    window.location.href = 'delete-permanen/' + id;
}
function dosenDeleteTaxbloom(id) {
    window.location.href = 'hapus-pp/' + id;
}
function dosenDeleteTaxbloomPermanen(id) {
    // window.location.href = 'delete-permanen/' + id;
}
function prodiRestoreTaxbloom(dir) {
    window.location.href = 'restore-index/' + dir;
}
function modalKataKerja(id, index) {
    document.getElementById('id').value = id;
    let strReplace = index.replace('_', ' ');
    let katalog = 'Mampu ' + strReplace;
    document.getElementById('red').value = katalog;
    // 
    let green = document.getElementById('green').value;
    let blue = document.getElementById('blue').value;
    document.getElementById('tred').innerHTML = katalog;
    document.getElementById('blank').innerHTML = '';
    // 
    document.getElementById('red').removeAttribute('hidden');

    $('#modalKataKerja').modal('hide');
}
function modalEditKataKerja(id, index) {
    document.getElementById('taxbloom_id').value = id;
    let strReplace = index.replace('_', ' ');
    let katalog = 'Mampu ' + strReplace;
    document.getElementById('red').value = katalog;
    // 
    let green = document.getElementById('green').value;
    let blue = document.getElementById('blue').value;
    document.getElementById('tred').innerHTML = katalog;
    document.getElementById('blank').innerHTML = '';
    // 
    document.getElementById('red').removeAttribute('hidden');

    $('#modalKataKerja').modal('hide');
}
// function auto_grow(element) {
//     element.style.height = "5px";
//     element.style.height = (element.scrollHeight) + "px";
// }


function inputPp() {
    let red = document.getElementById('red').value;
    let green = document.getElementById('green').value;
    let blue = document.getElementById('blue').value;

    document.getElementById('tred').innerHTML = red;
    document.getElementById('tblue').innerHTML = blue;
    document.getElementById('tgreen').innerHTML = green;
    document.getElementById('blank').innerHTML = '';
}

function limitText() {
    var para = document.getElementsByClassName("long-text");
    var text = para.innerHTML;
    para.innerHTML = "";
    var words = text.split(" ");
    for (i = 0; i < 30; i++) {
        para.innerHTML += words[i] + " ";
    }
    para.innerHTML += "...";
}

function tesini(red, blue, green) {
    document.getElementById('modalPp').innerHTML = red;
    document.getElementById('modalRed').innerHTML = red;
    document.getElementById('modalBlue').innerHTML = blue;
    document.getElementById('modalGreen').innerHTML = green;
}
