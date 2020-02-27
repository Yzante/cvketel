if($_inputCorrect === true){
    $("T_input").fadeOut(0);
    $("T_output").fadeIn(0);
}else {
    $("T_output").fadeOut(0);
    $("T_input").fadeIn(0);
}

function fade_out_input() {
    $("T_input").fadeOut(0);
    $("T_output").fadeIn(0);
}