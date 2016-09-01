<[extends file="../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Reset Password<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {


            /**
             * Reset Password Form Validation
             *
             */
            $('#resetPasswordForm').formValidation({
                framework: 'bootstrap',
                fields: {
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a new password.'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Your password must be at least 5 characters long.'
                            }
                        }
                    },
                    confirmPassword: {
                        validators: {
                            identical: {
                                field: 'password',
                                message: 'This password needs to match the one above.'
                            },
                            notEmpty: {
                                message: 'Please re-enter the password.'
                            }
                        }
                    }
                }
            }).on('success.form.fv', function (e) {
                $('#sendEmailBtn').addClass('m-progress');
            });

            $.material.init();

        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="centered-container animsition">

        <[include file="../layout/partials/sweet-alerts.tpl"]>

        <div class="login-box panel panel-default panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-refresh"></span> Reset Password
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="<[Route::to('reset-password')]>" id="resetPasswordForm">

                    <input type="hidden" name="password_reset_token" value="<[$passwordResetToken]>">

                    <div class="form-group label-floating">
                        <label class="control-label">New Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Re-enter Password:</label>
                        <input type="password" name="confirmPassword" class="form-control" required>
                    </div>

                    <button id="sendEmailBtn" type="submit" class="btn btn-primary btn-block form-submit-btn">
                        <span class="glyphicon glyphicon-refresh"></span> Reset Password
                    </button>
                </form>

            </div>
            <div class="panel-footer text-muted text-center text-x-small">
                <div>&copy; <[date('Y')]> <[Config::application('name')]></div>
            </div>
        </div>
    </div>

<[/block]>

