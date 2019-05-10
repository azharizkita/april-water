<title>APRIL DASHBOARD</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap-datepicker3.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/customcss.css"> -->

<link rel="stylesheet" href="<?php echo base_url(); ?>source/font-awesome/css/font-awesome.min.css">
<!-- JS -->
<script src="<?php echo base_url(); ?>source/js/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>source/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/bootstrap-datepicker.min.js"></script>
<!-- CUSTOM JS -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabelkeren').DataTable();
} );
function date_time(id)
{
      date = new Date;
      year = date.getFullYear();
      month = date.getMonth();
      months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'October', 'November', 'Desember');
      d = date.getDate();
      day = date.getDay();
      days = new Array('Minggu', 'Sening', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
      h = date.getHours();
      if(h<10)
      {
              h = "0"+h;
      }
      m = date.getMinutes();
      if(m<10)
      {
              m = "0"+m;
      }
      s = date.getSeconds();
      if(s<10)
      {
              s = "0"+s;
      }
      result = ''+days[day]+', '+d+' '+months[month]+'  '+year+' | '+h+':'+m+':'+s;
      document.getElementById(id).innerHTML = result;
      setTimeout('date_time("'+id+'");','1000');
      return true;
}
</script>
<!-- CUSTOM CSS -->
<style media="screen">
  body{
    padding-bottom: 50px;
    letter-spacing: 0;
    margin: 0;
    font-family: "Segoe UI";
    font-size: 0.9rem;
    font-weight: 300;
    line-height: 1.5;
    color: #000;
    text-align: left;
    background-color: #fff;
  }
  }
  .title-left{
    float: left;
  }
  .title-right{
    float: right;
  }
  .judul {
    margin-top: 0;
    margin-bottom: 5px;
    font-weight: 500;
    font-size: 20px;
    letter-spacing: 1px;

  }
  h6,h1{
    margin-top: 0;
    margin-bottom: 5px;
    font-weight: 500;
    font-size: 85%;
    color: #a2a9b1;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
  h2{
    margin-bottom: 0.5rem;
    font-weight: 300;
    font-family: inherit;
    line-height: 1.2;
    color: inherit;
  }
  h4,h3{
    margin-bottom: 0px;
    font-weight: 300;
    font-family: inherit;
    color: inherit;
  }
  .col{
    padding: 0px;
  }
  .panel-title a{
    color: #00A65A;
    text-decoration: none;
    background-color: transparent;
    display: block;
    padding: 0.6rem 1rem;
    border-radius: 0.25rem;
    font-weight: 350;
    font-family: inherit;
    font-size: 15px;
  }
  .panel-title a.active{
    color: #fff;
    background-color: #00A65A;
  }
  .panel-title a i{
    margin-right: 13px;
  }
  #boxbox .col{
    margin:0px 10px;
  }
  .inner{
    padding:10px;
    color : #fff !important;
  }
  .icon{
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -3px;
    right: 20px;
    z-index: 0;
    font-size: 65px;
    color: rgba(0,0,0,0.15);
  }
  .title-content{
    margin-bottom: 1rem;
  }
  #tabelkeren {
    width: 100%;
  }
  #tabelkeren_filter input{
    border: 1px solid #ccc;
    border-radius: 3px;
    min-height: 30px;
  }
  th {
    text-transform: lowercase;
  }

  th::first-letter {
      text-transform: uppercase;
  }
  #date_time{
    border: 1px solid #ccc;
    border-radius: 3px;
    min-height: 30px;
    padding: 10px;
  }
</style>
