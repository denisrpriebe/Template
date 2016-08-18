<!DOCTYPE html>
<html lang="en-US">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <[include file="./include/styles.tpl"]>
        <[include file="./include/scripts.tpl"]>

        <link rel="shortcut icon" href="<[View::asset('images/icon.png')]>" type="image/png">
        <link rel="icon" href="<[View::asset('images/icon.png')]>" type="image/png">

        <title><[block name="page-title"]><[/block]></title>

    <[block name="page-script"]><[/block]>

    </head>
    <body>

        <div class="loading">
            <img src="<[View::asset('images/loading.svg')]>" >
        </div>

        <[block name="page-content"]><[/block]>
    
    </body>
</html>