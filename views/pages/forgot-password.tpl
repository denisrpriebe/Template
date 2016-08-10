<[extends file="../layout/app.tpl"]>

<[block name="page-title"]>Application Name : : Forgot Password<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function() {


            /**
             * Forgot Password Form Validation
             *
             */
            $('#forgotPasswordForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
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

    <div class="centered-container">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="login-box panel panel-primary panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-question-sign"></span> Forgot Password
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-primary btn-xs loading-button" onclick="goto('login.php');">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </button>
                </div>
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="requests/send-forgot-password-email.php" id="forgotPasswordForm">
                    <p>Please enter the email that is associated with your account. We will email you a password reset link.</p>
                    <div class="form-group">
                        <label for="loginEmail">Email:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="emailAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="loginEmail" name="email" type="email" class="form-control" placeholder="Email" aria-describedby="usernameAddon" required>
                        </div>
                    </div>
                    <button id="sendEmailBtn" type="submit" class="btn btn-primary btn-block">
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

