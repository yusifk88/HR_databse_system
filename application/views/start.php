<div class="container-fluid start-menu" style="display: none;">
    <div class="row tile-container tile-container-primary">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tile-container-title-area">
            <span class="tile-container-title"><i class="fa fa-bars"></i> GENERAL</span>

        </div> <br> <br>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 col-lg-offset-1">
        <a class="tile" href="#/mngcircuit" style="text-decoration: none;">
            <div >
                <i class="fa fa-folder-open-o fa-2x"></i>
                <p class="title">MANAGE CIRCUITS</p>
            </div>
        </a>
    </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" href="#/managepost" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-address-book-o fa-2x"></i>
                    <p class="title">MANAGE POSTS</p>
                </div>
            </a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" href="#/managerank" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-stack-exchange fa-2x"></i>
                    <p class="title">MANAGE RANKS</p>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" href="#/regisstaff" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-user-plus fa-2x"></i>
                    <p class="title">REGISTER STAFF</p>
                </div>
            </a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" href="#/managstaff/1" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-users fa-2x"></i>
                    <p class="title">MANAGE STAFF INFO.</p>
                </div>
            </a>
        </div>
    </div>

<!------------------------------------------------------------------------------end of primary-------------------------------------->
    <div class="row tile-container tile-container-calm">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tile-container-title-area">
            <span class="tile-container-title"><i class="fa fa-bars"></i> ADVANCE PRINT</span>

        </div> <br> <br>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 col-lg-offset-1 col-md-offset-1">
            <a class="tile" onclick="printglist(); return false;" href="#/regstud" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-print fa-2x"></i><i class="fa fa-users"></i>
                    <p class="title">PRINT GENERAL LIST</p>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" onclick="printstatlist(); return false;" href="#/regstud" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-print fa-2x"></i><i class="fa fa-stack-exchange"></i>
                    <p class="title">PRINT PER STATUS</p>
                </div>
            </a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" href="#/regstud" style="text-decoration: none;" onclick="printfl(); return false;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-print fa-2x"></i><i class="fa fa-address-book-o"></i>
                    <p class="title">PRINT FACE BOOKLET</p>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a onclick="printcircuit(); return false;" class="tile" href="#/regstud" style="text-decoration: none;">
                <div  data-id="#regstud" data-get="student">
                    <i class="fa fa-print fa-2x"></i><i class="fa fa-folder-open-o"></i>
                    <p class="title">PRINT PER CIRCUIT</p>
                </div>
            </a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" onclick="printreg(); return false;" href="#/regstud" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-print fa-2x"></i>
                    <p class="title">PRINT PER REG. STATUS</p>
                </div>
            </a>
        </div>
    </div>

<!-------------------------------------------end of warm--------------------------------------------------------------->

    <div class="row tile-container tile-container-hot">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tile-container-title-area">
            <span class="tile-container-title"><i class="fa fa-bars"></i> UTILITIES</span>

        </div> <br> <br>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 col-lg-offset-3">
            <a class="tile" href="#/manageacc" style="text-decoration: none;">
                <div data-id="#manageaccn" data-get="student">
                    <i class="fa fa-2x fa-user"></i>
                    <p class="title">MANAGE ACCOUNTS</p>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a onclick="backup(); return false;" class="tile" href="#/regstud" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-database fa-2x"></i><i class="fa fa-arrow-up"></i>
                    <p class="title">BACK UP</p>
                </div>
            </a>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <a class="tile" href="#/restorebak" style="text-decoration: none;">
                <div data-id="#regstud" data-get="student">
                    <i class="fa fa-database fa-2x"></i><i class="fa fa-arrow-down"></i>
                    <p class="title">RESTORE</p>
                </div>
            </a>
        </div>


    </div>

<!-------------------------------------------------------------------------------end of hot--------------------------------->

</div>





















