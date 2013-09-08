function choosePic(id_i,id_d) {
    document.forms[0].id_i.value = id_i;
    document.forms[0].id_d.value = id_d;
    document.forms[0].submit();
}

$(function () {
    $("[rel='tooltip']").tooltip();
});