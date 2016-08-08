<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Application Name</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <[if isset($nav)]>
                    <[foreach from=$nav key=key item=settings]>
                        <[if isset($settings['children'])]>
                            <li class="dropdown <[if in_array($key, Nav::getActiveTabs())]>active<[/if]>">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="<[$settings['href']]>"><[$settings['icon']]> <[$settings['text']]>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <[foreach from=$settings['children'] key=childKey item=childSettings]>
                                        <li class="<[if in_array($childKey, Nav::getActiveTabs())]>active<[/if]>">
                                            <a href="<[$childSettings['href']]>"><[$childSettings['icon']]> <[$childSettings['text']]></a>
                                        </li>
                                    <[/foreach]>
                                </ul>
                            </li>
                        <[else]>
                            <li class="<[if in_array($key, Nav::getActiveTabs())]>active<[/if]>"><a href="<[$settings['href']]>"><[$settings['icon']]> <[$settings['text']]></a></li>
                        <[/if]>
                    <[/foreach]>
                <[/if]>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span> <[$user->first_name]> <[$user->last_name]>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-cog"></span> Preferences</a>
                        </li>
                        <li>
                            <a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>