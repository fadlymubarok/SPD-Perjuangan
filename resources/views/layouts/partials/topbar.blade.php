<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right mt-1">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, {{ auth()->user()->name }} <i class="fa fa-caret-down"></i>
                </a>

                <div class="user-menu dropdown-menu">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link bg-transparent border-0" href="#"><i class="fa fa-power-off"></i> Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</header><!-- /header -->