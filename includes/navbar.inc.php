<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo $server_name; ?></a>
        </div>
        <div id="navbar-nav" class="collapse navbar-collapse">
            <ul id="main-menu" class="nav navbar-nav">
                    <style>
                    .dropdown:hover .dropdown-menu {
                        display: block;
                        margin-top: 0;
                     }
                    </style>
		    <!--- DROPDOWN EXAMPLE
                    <li class="dropdown">
                        <a class="dropdown-toggle"  href="#">#<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="#">#</a>
                            </li>

                        </ul>
                    </li>
		    -->
                    <li>
                    <a href="/admin">Admin</a>
                    </li>
                    <?php foreach($nav_links as $title => $url): ?>
                      <li>
              			       <a href="<?php echo $url ?>"><?php echo $title; ?></a>
              		    </li>
                    <?php endforeach; ?>

                 </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
