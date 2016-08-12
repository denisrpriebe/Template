<[extends file="./layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Page Not Found<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function() {

        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="container clear-nav">

        <div class="jumbotron">
            <h1>Oops!</h1> 
            <p>We can't seem to find the page you're looking for.</p> 
        </div>

    </div>

<[/block]>

