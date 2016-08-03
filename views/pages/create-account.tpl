<[extends file="../layout/app.tpl"]>

<[block name="page-title"]>Create Account<[/block]>

<[block name="page-script"]>
    <script>

        $(document).ready(function() {

        });

    </script>
<[/block]>

<[block name="page-content"]>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <[include file="../layout/partials/alerts.tpl"]>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <form role="form" method="post" action="requests/post/create-account.php">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="input" class="form-control" id="firstName" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="input" class="form-control" id="lastName" name="last_name">
                        </div>                    
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="password">
                        </div>                    
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
<[/block]>

