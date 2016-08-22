<[if Session::has('alert')]>

    <[assign var="alert" value=Session::get('alert')]>

    <[if $alert['type'] eq 'success']>
        <div class="alert alert-success fade in">
            <div class="container-fluid">
                <div class="alert-icon">
                    <i class="material-icons">check</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b><[$alert['title']]></b> - <[$alert['text']]>
            </div>
        </div>
    <[/if]>

    <[if $alert['type'] eq 'info']>
        <div class="alert alert-info fade in">
            <div class="container-fluid">
                <div class="alert-icon">
                    <i class="material-icons">info_outline</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b><[$alert['title']]></b> - <[$alert['text']]>
            </div>
        </div>
    <[/if]>

    <[if $alert['type'] eq 'warning']>
        <div class="alert alert-warning fade in">
            <div class="container-fluid">
                <div class="alert-icon">
                    <i class="material-icons">warning</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b><[$alert['title']]></b> - <[$alert['text']]>
            </div>
        </div>
    <[/if]>

    <[if $alert['type'] eq 'danger']>
        <div class="alert alert-danger fade in">
            <div class="container-fluid">
                <div class="alert-icon">
                    <i class="material-icons">error_outline</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b><[$alert['title']]></b> - <[$alert['text']]>
            </div>
        </div>
    <[/if]>

<[/if]>