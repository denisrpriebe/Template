<[extends file="../../layout/app.tpl"]>

<[block name="page-title"]>Application Name : : Home<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function() {


        });
    </script>
<[/block]>

<[block name="page-content"]>

    <[include file="../layout/partials/navbar.tpl"]>

    <div class="container clear-nav">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel Heading</div>
                    <div class="panel-body">Panel Content</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel Heading</div>
                    <div class="panel-body">Panel Content</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel Heading</div>
                    <div class="panel-body">Panel Content</div>
                </div>
            </div>
        </div>

    </div>

<[/block]>

