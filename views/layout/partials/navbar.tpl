<script>
    $(document).ready(function () {

        /**
         * Registration Form Validation
         *
         */
        $('#userSettingsForm').formValidation({
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
                            message: 'Your password must be more than 5 characters.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function (e) {

            $('#updateUserSettingsBtn').addClass('m-progress');

        }).on('error.form.fv', function (e) {

            console.log("This shouldn't be happening.");

        });

    });

</script>

<nav class="navbar navbar-inverse navbar-fixed-top">
    
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<[View::asset('images/icon.png')]>" />
                <[Config::application('name')]>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <[assign var="nav" value=Nav::nav()]>
                <[if isset($nav)]>
                    <[foreach from=$nav key=key item=settings]>
                        <[if isset($settings['children'])]>
                            <li class="dropdown <[if in_array($key, Nav::getActiveTabs())]>active<[/if]>">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><[$settings['icon']]> <[$settings['text']]>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <[foreach from=$settings['children'] key=childKey item=childSettings]>
                                        <li class="<[if in_array($childKey, Nav::getActiveTabs())]>active<[/if]>">
                                            <a href="<[Route::to($childSettings['route-name'])]>"><[$childSettings['icon']]> <[$childSettings['text']]></a>
                                        </li>
                                    <[/foreach]>
                                </ul>
                            </li>
                        <[else]>
                            <li class="<[if in_array($key, Nav::getActiveTabs())]>active<[/if]>"><a class="animsition-link" href="<[Route::to($settings['route-name'])]>"><[$settings['icon']]> <[$settings['text']]></a></li>
                            <[/if]>
                        <[/foreach]>
                    <[/if]>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span> <[Auth::user()->first_name]> <[Auth::user()->last_name]>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#userSettingsModal"><span class="glyphicon glyphicon-cog"></span> Settings</a>
                        </li>
                        <li>
                            <a class="animsition-link" href="<[Route::to('logout-page')]>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Preferences Modal -->
<div id="userSettingsModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <form role="form" method="post" action="<[Route::to('update-user-settings')]>" id="userSettingsForm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <span class="glyphicon glyphicon-cog"></span> Settings
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="userSettingsEmail">Your Email:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="emailAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input value="<[Auth::user()->email]>" id="userSettingsEmail" name="email" type="email" class="form-control" placeholder="Email" aria-describedby="emailAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userSettingsFirstName">First Name:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="firstNameAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input value="<[Auth::user()->first_name]>" id="userSettingsFirstName" name="first_name" type="text" class="form-control" placeholder="First Name" aria-describedby="firstNameAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userSettingsLastName">Last Name:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="lastNameAddon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input value="<[Auth::user()->last_name]>" id="userSettingsLastName" name="last_name" type="text" class="form-control" placeholder="Last Name" aria-describedby="lastNameAddon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userSettingsPassword">Password:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="passwordAddon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input value="__USE_EXISTING__" id="userSettingsPassword" name="password" type="password" class="form-control" placeholder="Password" aria-describedby="passwordAddon" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="updateUserSettingsBtn" type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-refresh"></span> Update
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>