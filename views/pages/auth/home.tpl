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
                <div class="jumbotron">
                    <h1>Members Only Page</h1>
                    <p>Hello <[$user->first_name]>, You are logged in and are on the homepage.</p>
                    <a href="../logout.php" class="btn btn-default" role="button">Logout</a>
                    <a href="../auth/update-info.php" class="btn btn-info" role="button">Update Info</a>
                </div>
            </div>
        </div>
    </div>
<[/block]>

