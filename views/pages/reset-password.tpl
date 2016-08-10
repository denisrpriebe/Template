<[extends file="../layout/app.tpl"]>

<[block name="page-title"]>Application Name : : Reset Password<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function() {


            /**
             * Reset Password Form Validation
             *
             */
            $('#resetPasswordForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
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
            }).on('success.form.fv', function(e) {
                $('#sendEmailBtn').addClass('m-progress');
            });


        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="centered-container">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="login-box panel panel-primary panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-refresh"></span> Reset Password
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="requests/reset-password.php" id="resetPasswordForm">
                    <input type="hidden" name="password_reset_token" value="<[$passwordResetToken]>">
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="newPasswordAddon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input id="newPassword" name="password" type="password" class="form-control" placeholder="New Password" aria-describedby="newPasswordAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reEnterPassword">Re-enter Password:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="reEnterPasswordAddon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input id="reEnterPassword" name="confirmPassword" type="password" class="form-control" placeholder="Re-enter Password" aria-describedby="reEnterPasswordAddon" required>
                        </div>
                    </div>
                    <button id="sendEmailBtn" type="submit" class="btn btn-primary btn-block">
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

