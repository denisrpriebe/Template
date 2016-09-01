<[extends file="../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Forgot Password<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {

            /**
             * Forgot Password Form Validation
             *
             */
            $('#forgotPasswordForm').formValidation({
                framework: 'bootstrap',                
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter your email.'
                            },
                            emailAddress: {
                                message: 'Please enter a valid email address.'
                            }
                        }
                    }
                }
            }).on('success.form.fv', function(e) {
                $('#sendEmailBtn').addClass('m-progress');
            });

        });
    </script>
<[/block]>

<[block name="page-content"]>

    <[include file="../layout/partials/sweet-alerts.tpl"]>
    
    <div class="centered-container animsition">

        <div class="login-box panel panel-default panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-question-sign"></span> Forgot Password
                <div class="pull-right">
                    <a role="button" class="btn btn-default panel-heading-btn btn-xs loading-button animsition-link" href="<[Route::to('login-page')]>">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </a>
                </div>
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="<[Route::to('send-forgot-password-email')]>" id="forgotPasswordForm">

                    <p>Please enter the email that is associated with your account. We will email you a password reset link.</p>

                    <div class="form-group label-floating">
                        <label class="control-label">Your Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <button id="sendEmailBtn" type="submit" class="btn btn-primary btn-block form-submit-btn">
                        <span class="glyphicon glyphicon-send"></span> Send Email
                    </button>
                </form>

            </div>
            <div class="panel-footer text-muted text-center text-x-small">
                <div>&copy; <[date('Y')]> <[Config::application('name')]></div>
            </div>
        </div>
    </div>

<[/block]>

