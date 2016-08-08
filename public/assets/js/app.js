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

/**
 * Submits a the fiven form via ajax.
 * 
 * @param {jQuery Object} form
 * @param {function} callback
 * @returns {void}
 */
function submitForm(form, callback) {
    $.ajax({
        method: form.attr('method'),
        url: form.attr('action'),
        data: form.serializeArray(),
        dataType: 'json',
        success: function(response, status, xhr) {
            showAlert(response);
        },
        error: function(xhr, status, error) {
            console.log('Error in the submitForm function.');
        },
        complete: function(xhr, status) {
            callback();
        }
    });
}

/**
 * Shows an alert after an ajax call has been made.
 * 
 * @param {json} response
 * @returns {void}
 */
function showAlert(response) {

    $('.ajax-alert-title').html(response.title);
    $('.ajax-alert-text').html(response.text);

    switch (response.type) {
        case 'success' :
            console.log('success');
            $('.ajax-alert-success').show();
            break;
        case 'info' :
            console.log('info');
            $('.ajax-alert-info').show();
            break;
        case 'warning' :
            $('.ajax-alert-wanring').show();
            break;
        case 'danger' :
            $('.ajax-alert-danger').show();
            break;
    }
}

function goto(destination) {
    window.location.href = destination;
}