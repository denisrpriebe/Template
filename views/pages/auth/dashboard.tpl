<[extends file="../../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Dashboard<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {

            $('#testTable').dataTable();

        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="animsition">

        <[include file="../layout/partials/navbar.tpl"]>

        <div class="container clear-nav">

            <[include file="../layout/partials/alerts.tpl"]>

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Application Dashboard</h1>
                        <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
                        <p>This is a global view variable: <[$globalVar]></p>
                    </div>
                </div>
            </div>

            <div class="row">

                <[if Auth::user()->hasRole('Administrator')]>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Administrator Group</div>
                            <div class="panel-body">This panel should only be visible to Administrators.</div>
                        </div>
                    </div>
                <[/if]>

                <[if Auth::user()->hasRole('Default')]>
                    <div class="col-md-6">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Default Group</div>
                            <div class="panel-body">This panel should only be visible to Default users.</div>
                        </div>
                    </div>
                <[/if]>

            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Everyone</div>
                        <div class="panel-body">

                            <table id="testTable" class="table table-striped table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

<[/block]>

