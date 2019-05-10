<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('included');?>
</head>
<body>
  <nav class="navbar navbar-expand navbar-light " style="border-bottom: 1px solid #ccc; margin-bottom:30px;">
    <img src="<?php echo base_url('source/img/logoapril.jpeg');?>" alt="" class="logos" width="100" height="60">
    <ul class="nav navbar-nav menu_nav ml-auto">
        <li class="nav-item submenu dropdown active">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Career</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
        </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col" style="padding-right:50px;">
        <?php $this->load->view($main_sidebar);?>
      </div>
      <div class="col-9">
        <?php $this->load->view($main_content);?>
      </div>
    </div>
  </div>
</body>
</html>
