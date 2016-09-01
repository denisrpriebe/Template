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

    <[include file="../layout/partials/sweet-alerts.tpl"]>

    <div class="login-container animsition">

        <div class="login-box panel panel-default panel-transparent">
            <div class="panel-heading">
                <[if Auth::user()]>

                    <span class="glyphicon glyphicon-log-in"></span> Login

                <[else]>

                    <span class="glyphicon glyphicon-log-in"></span> Login
                    <div class="pull-right">
                        <a role="button" class="btn btn-default btn-xs panel-heading-btn loading-button animsition-link" href="<[Route::to('registration-page')]>">
                            <span class="glyphicon glyphicon-plus-sign"></span> Register
                        </a>
                    </div>

                <[/if]>
            </div>
            <div class="panel-body login-panel-body">
                <[if Auth::user()]>

                    <h3 class="text-center">Hello <[Auth::user()->first_name]>.</h3>

                    <a role="button" class="btn btn-primary btn-block login-btn-home loading-button" href="<[Route::to('dashboard-page')]>">
                        <span class="glyphicon glyphicon-dashboard"></span> Dashboard
                    </a>

                    <a role="button" class="btn btn-default btn-block logout-btn loading-button" href="<[Route::to('logout-page')]>">
                        <span class="glyphicon glyphicon-log-out"></span> Logout
                    </a>

                <[else]>

                    <form role="form" method="post" action="<[Route::to('login')]>" id="loginForm">

                        <div class="form-group label-floating">
                            <label class="control-label">Email:</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button id="loginBtn" type="submit" class="btn btn-primary btn-block form-submit-btn">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </button>
                        <a role="button" class="btn btn-default btn-simple btn-block forgot-password animsition-link" href="<[Route::to('forgot-password-page')]>">Forgot Password?</a>
                    </form>

                <[/if]>
            </div>
            <div class="panel-footer text-muted text-center text-x-small">
                &copy; <[date('Y')]> <[Config::application('name')]>
            </div>
        </div>
    </div>

<[/block]>

