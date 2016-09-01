<[extends file="../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Register<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {

            /**
             * Registration Form Validation
             *
             */
            $('#registrationForm').formValidation({
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
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter your first name.'
                            }
                        }
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter your last name.'
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
                $('#registerBtn').addClass('m-progress');
            });

        });
    </script>
<[/block]>

<[block name="page-content"]>

    <[include file="../layout/partials/sweet-alerts.tpl"]>
    
    <div class="centered-container animsition">

        <div class="panel panel-default panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-plus-sign"></span> Register
                <div class="pull-right">
                    <a role="button" class="btn btn-default panel-heading-btn btn-xs loading-button animsition-link" href="<[Route::to('login-page')]>">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </a>
                </div>
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="<[Route::to('register')]>" id="registrationForm">

                    <div class="form-group label-floating">
                        <label class="control-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">New Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button id="registerBtn" type="submit" class="btn btn-primary btn-block form-submit-btn">
                        <span class="glyphicon glyphicon-plus-sign"></span> Register
                    </button>

                </form>

            </div>
            <div class="panel-footer text-muted text-center text-x-small">
                <div>&copy; <[date('Y')]> <[Config::application('name')]></div>
            </div>
        </div>
    </div>

<[/block]>

