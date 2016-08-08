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
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
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