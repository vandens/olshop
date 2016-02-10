    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url('backend')?>">Nusa Elektronik</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="backend"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
            <!-- <li><a href="#">Settings</a></li> -->
            <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li> -->
            <li><a href="<?=base_url();?>login/out"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
          <form action="<?=base_url();?>katalog" method="post" class="navbar-form navbar-right">

            <input class="form-control" placeholder="Search..." type="text" name="item">
            <input type="hidden" name="submit" value="cari">
          </form>
        </div>
      </div>
    </div>