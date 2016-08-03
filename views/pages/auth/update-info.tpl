<[extends file="../../layout/app.tpl"]>

<[block name="page-title"]>Home : : Logged In<[/block]>

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
                    <form role="form" method="post" action="../requests/post/update-info.php">
                        <input type="hidden" name="id" value="<[$user->id]>">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<[$user->email]>">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="input" class="form-control" id="firstName" name="first_name" value="<[$user->first_name]>">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="input" class="form-control" id="lastName" name="last_name" value="<[$user->last_name]>">
                        </div>             
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
<[/block]>

