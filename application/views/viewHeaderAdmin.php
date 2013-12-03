
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a  href="<?php echo site_url('login/c_panel')?>"  >Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('setData/setAbout/2')?>" id="news_osos" >OSOS Main</a></li>
                  <li><a href="<?php echo site_url('setData/setAbout/2')?>" >Air Condition</a></li>
                  <li><a href="<?php echo site_url('setData/setAbout/3')?>" >Fire Fighting </a></li>
                  <li><a href="<?php echo site_url('setData/setAbout/4')?>" >Contracting</a></li>
                  <li><a href="<?php echo site_url('setData/setAbout/5')?>" >Commercial</a></li>
                </ul>
              </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sliders <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('setData/setSlider/1')?>" >OSOS Main</a></li>
                  <li><a href="<?php echo site_url('setData/setSlider/2')?>" >Air Condition</a></li>
                  <li><a href="<?php echo site_url('setData/setSlider/3')?>" >Fire Fighting </a></li>
                  <li><a href="<?php echo site_url('setData/setSlider/4')?>" >Contracting</a></li>
                  <li><a href="<?php echo site_url('setData/setSlider/5')?>" >Commercial</a></li>
                </ul>
              </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">News<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('setData/setNews/1')?>" >OSOS Main </a></li>
                  <li><a href="<?php echo site_url('setData/setNews/2')?>" >  Air Condition </a></li>
                  <li><a href="<?php echo site_url('setData/setNews/3')?>" > Fire Fighting  </a></li>
                  <li><a href="<?php echo site_url('setData/setNews/4')?>" > Contracting</a></li>
                  <li><a href="<?php echo site_url('setData/setNews/5')?>" > Commercial </a></li>
                </ul>
              </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Newsletter <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('setData/setNewsletter/1')?>" >OSOS Main</a></li>
                  <li><a href="<?php echo site_url('setData/setNewsletter/2')?>" >Air Condition</a></li>
                  <li><a href="<?php echo site_url('setData/setNewsletter/3')?>" >Fire Fighting </a></li>
                  <li><a href="<?php echo site_url('setData/setNewsletter/4')?>" >Contracting </a></li>
                  <li><a href="<?php echo site_url('setData/setNewsletter/5')?>" >Commercial </a></li>
                </ul>
              </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">projects <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('projects/setProjects/1')?>" >OSOS Main</a></li>
                  <li><a href="<?php echo site_url('projects/setProjects/2')?>" >Air Condition</a></li>
                  <li><a href="<?php echo site_url('projects/setProjects/3')?>" >Fire Fighting </a></li>
                  <li><a href="<?php echo site_url('projects/setProjects/4')?>" >Contracting </a></li>
                  <li><a href="<?php echo site_url('projects/setProjects/5')?>" >Commercial </a></li>
                </ul>
              </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div>
<div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="alert alert-info">
            <strong>Hello,</strong><?php echo $this->session->userdata('firstName').' '.$this->session->userdata('lastName');?>
          </div>
          <div class="row">