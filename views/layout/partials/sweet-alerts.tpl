<[if Session::has('alert')]>

    <[assign var="alert" value=Session::get('alert')]>

    <script>

        <[if $alert['type'] eq 'success']>
            swal({
                title: '<[$alert['title']]>',
                text: '<[$alert['text']]>',
                type: "success",
                timer: 7000
            });
        <[/if]>

        <[if $alert['type'] eq 'info']>
            swal({
                title: '<[$alert['title']]>',
                text: '<[$alert['text']]>',
                type: "info",
                timer: 7000
            });
        <[/if]>

        <[if $alert['type'] eq 'warning']>
            swal({
                title: '<[$alert['title']]>',
                text: '<[$alert['text']]>',
                type: "warning",
                timer: 7000
            });
        <[/if]>

        <[if $alert['type'] eq 'danger']>
            swal({
                title: '<[$alert['title']]>',
                text: '<[$alert['text']]>',
                type: "error",
                timer: 7000
            });
        <[/if]>

    </script>

<[/if]>