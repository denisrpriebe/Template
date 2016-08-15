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
                                message: 'Your password must be more than 5 characters.',
                                success: function () {

                                }
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

    <div class="centered-container animsition">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="panel panel-primary panel-transparent">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-plus-sign"></span> Register
                <div class="btn-group pull-right">
                    <a role="button" class="btn btn-primary btn-xs loading-button animsition-link" href="<[Route::to('login-page')]>">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </a>
                </div>
            </div>
            <div class="panel-body">

                <form role="form" method="post" action="<[Route::to('do-registration')]>" id="registrationForm">
                    <div class="form-group">
                        <label for="loginEmail">Email:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="emailAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="loginEmail" name="email" type="email" class="form-control" placeholder="Email" aria-describedby="emailAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginFirstName">First Name:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="firstNameAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="loginFirstName" name="first_name" type="text" class="form-control" placeholder="First Name" aria-describedby="firstNameAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginLastName">Last Name:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="lastNameAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="loginLastName" name="last_name" type="text" class="form-control" placeholder="Last Name" aria-describedby="lastNameAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">New Password:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="passwordAddon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input id="loginPassword" name="password" type="password" class="form-control" placeholder="New Password" aria-describedby="passwordAddon" required>
                        </div>
                    </div>
                    <button id="registerBtn" type="submit" class="btn btn-primary btn-block">
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

