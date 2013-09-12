function choosePic(id_i,id_d) {
    document.forms[0].id_i.value = id_i;
    document.forms[0].id_d.value = id_d;
    document.forms[0].submit();
}

function changeImageGreater() {
        document.getElementById("choose_img").src="img/greater_80x75.png";
    }
    
function changeImageLesser() {
        document.getElementById("choose_img").src="img/lesser_80x75.png";
    }

function changeImageDefault() {
        document.getElementById("choose_img").src="img/funornot_80x75.png";
    }

    
$(function () {
    $("[rel='tooltip']").tooltip();
});
