function ajax(location, data) {

}

function goto(destination, btn) {
    btn ? $(btn).addClass('m-progress') : false;
    window.location.href = destination;
}