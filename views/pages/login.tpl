<[extends file="../layout/app.tpl"]>

<[block name="page-title"]>Application Name : : Login<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function() {            

            /**
             * Login Form Validation
             *
             */
            $('#loginForm').formValidation({
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
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter your password.'
                            },
                            stringLength: {
                                min: 5,
                                max: 30,
                                message: 'Your password must be more than 5 characters.'
                            }
                        }
                    }
                }
            }).on('success.form.fv', function(e) {
                $('#loginBtn').addClass('m-progress');
            }).on('error.form.fv', function(e) {
                console.log('Form is bad');
            });

        });

    </script>
<[/block]>

<[block name="page-content"]>

    <div class="login-container">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="login-box panel panel-primary panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-log-in"></span> Login
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-primary btn-xs loading-button" onclick="goto('register.php', this)">
                        <span class="glyphicon glyphicon-plus-sign"></span> Register
                    </button>
                </div>
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="requests/login.php" id="loginForm">
                    <div class="form-group">
                        <label for="loginEmail">Email:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="emailAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="loginEmail" name="email" type="email" class="form-control" placeholder="Email" aria-describedby="usernameAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="passwordAddon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input id="loginPassword" name="password" type="password" class="form-control" placeholder="Password" aria-describedby="passwordAddon" required>
                        </div>
                    </div>
                    <button id="loginBtn" type="submit" class="btn btn-primary btn-block">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </button>
                    <button type="button" class="btn btn-link btn-block forgot-password" onclick="goto('forgot-password.php')">Forgot Password?</button>
                </form>

            </div>
            <div class="panel-footer text-muted text-center text-x-small">
                <div>&copy; <[date('Y')]> Application Name</div>
            </div>
        </div>
    </div>

<[/block]>

