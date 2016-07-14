{extends file="../layout/app.tpl"}

{block name="page-title"}Home{/block}

{block name="page-content"}
    Home Content
    <br/>
    <pre>{var_dump($user)}</pre>
{/block}

