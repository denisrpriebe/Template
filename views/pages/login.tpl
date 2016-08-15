<[extends file="../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Login<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {


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
            }).on('success.form.fv', function (e) {
                $('#loginBtn').addClass('m-progress');
            });


        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="login-container animsition">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="login-box panel panel-primary panel-transparent">
            <div class="panel-heading">
                <[if Auth::user()]>

                    <span class="glyphicon glyphicon-log-in"></span> Login

                <[else]>

                    <span class="glyphicon glyphicon-log-in"></span> Login
                    <div class="btn-group pull-right">
                        <a role="button" class="btn btn-primary btn-xs loading-button animsition-link" href="<[Route::to('registration-page')]>">
                            <span class="glyphicon glyphicon-plus-sign"></span> Register
                        </a>
                    </div>

                <[/if]>
            </div>
            <div class="panel-body login-panel-body">
                <[if Auth::user()]>

                    <h3 class="text-center">Hello <[Auth::user()->first_name]>.</h3>

                    <a role="button" class="btn btn-primary btn-block login-btn-home loading-button" href="<[Route::to('auth-dashboard-page')]>">
                        <span class="glyphicon glyphicon-dashboard"></span> Dashboard
                    </a>

                    <a role="button" class="btn btn-default btn-block logout-btn loading-button" href="<[Route::to('logout-page')]>">
                        <span class="glyphicon glyphicon-log-out"></span> Logout
                    </a>

                <[else]>

                    <form role="form" method="post" action="<[Route::to('do-login')]>" id="loginForm">
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
                        <a role="button" class="btn btn-link btn-block forgot-password animsition-link" href="<[Route::to('forgot-password-page')]>">Forgot Password?</a>
                    </form>

                <[/if]>
            </div>
            <div class="panel-footer text-muted text-center text-x-small">
                &copy; <[date('Y')]> <[Config::application('name')]>
            </div>
        </div>
    </div>

<[/block]>

