<[extends file="../../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Inventory<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {


        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="animsition">

        <[include file="../layout/partials/navbar.tpl"]>

        <div class="container clear-nav">

            <[include file="../layout/partials/sweet-alerts.tpl"]>

            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Inventory Page</h1>
                        <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <[if Auth::user()->hasRole('Administrator')]>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Administrator Group</div>
                            <div class="panel-body">This panel should only be visible to Administrators.</div>
                        </div>
                    </div>
                <[/if]>

                <[if Auth::user()->hasRole('Default')]>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Default Group</div>
                            <div class="panel-body">This panel should only be visible to Default users.</div>
                        </div>
                    </div>
                <[/if]>

                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Everyone</div>
                        <div class="panel-body">This panel should be visible to everyone.</div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<[/block]>

