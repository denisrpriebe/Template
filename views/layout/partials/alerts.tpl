{if Session::has('alert')}

    {assign var="alert" value=Session::get('alert')}

    {if $alert['type'] eq 'success'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-ok-sign"></span> <strong>{$alert['title']}</strong><br/>
            {$alert['text']}
        </div>
    {/if}

    {if $alert['type'] eq 'info'}
        <div class="alert alert-info fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-info-sign"></span> <strong>{$alert['title']}</strong><br/>
            {$alert['text']}
        </div>
    {/if}

    {if $alert['type'] eq 'warning'}
        <div class="alert alert-warning fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-alert"></span> <strong>{$alert['title']}</strong><br/>
            {$alert['text']}
        </div>
    {/if}

    {if $alert['type'] eq 'danger'}
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-exclamation-sign"></span> <strong>{$alert['title']}</strong><br/>
            {$alert['text']}
        </div>
    {/if}

{/if}