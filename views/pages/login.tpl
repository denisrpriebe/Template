<[extends file="../layout/app.tpl"]>

<[block name="page-title"]>Login<[/block]>

<[block name="page-script"]>
    <script>

        $(document).ready(function() {
            console.log('I am Ready!');
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
                <div class="jumbotron">
                    <h1>Login Page</h1> 
                    <p>Here is a basic example of a login page.</p> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="post" action="requests/post/login.php">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="input" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>

    </div>
<[/block]>

