$(document).ready(function() {

    /**
     * Page Background
     * 
     */
    $.backstretch('http://127.0.0.1/projects/Template/public/assets/images/background-blue-9.jpg');

    /**
     * Loading Button Effect
     * 
     * Buttons with the 'loading-button' class will automatically get the
     * loading effect when they are clicked. 
     */
    $('.loading-button').click(function() {
        $(this).addClass('m-progress');
    });

});

function ajax(location, data) {

}

function goto(destination) {
    window.location.href = destination;
}