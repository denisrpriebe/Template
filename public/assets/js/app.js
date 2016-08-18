$(document).ready(function () {

    /**
     * Enable smooth page transitions
     *
     *
     */
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 250,
        outDuration: 250
    }).on('animsition.inStart', function(){
        $('.loading').fadeOut();
    }).on('animsition.outEnd', function(){
        $('.loading').fadeIn();
    });

    /**
     * Loading Button Effect
     *
     * Buttons with the 'loading-button' class will automatically get the
     * loading effect when they are clicked.
     */
    $('.loading-button').click(function () {
        $(this).addClass('m-progress');
    });

    /**
     * Close any alerts on the page after 7 seconds.
     *
     * @returns {void}
     */
    setTimeout(function () {
        $('.alert').alert('close');
    }, 7000);

});

/**
 * Redirects the page to the given location.
 *
 * @param {string} destination
 * @returns {void}
 */
function goto(destination) {
    window.location.href = destination;
}

/**
 * Submits the given form via ajax.
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
        success: function (response, status, xhr) {
            callback(response);
        },
        error: function (xhr, status, error) {
            console.log('Ajax form submission error:');
            console.log(error);
        },
        complete: function (xhr, status) {
            console.log('Ajax form submission complete.');
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