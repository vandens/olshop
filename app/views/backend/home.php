<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="">

    <title>Dashboard Nusa Elektronik</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>media/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>media/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css" id="holderjs-style"></style></head>

  <body style="font-size:12px;">

  <?=$panel_atas;?>

    <div class="container-fluid">
      <div class="row">
      <?=$panel_kiri;?>
      <?=$panel_tengah;?>
      <?=$menu;?>
      </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div><!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>media/js/jquery.js"></script>
    <script src="<?=base_url();?>media/js/bootstrap.js"></script>
    <script src="<?=base_url();?>media/js/vandens.js"></script>
    <script src="<?=base_url();?>media/dashboard/docs.js"></script>
	<script>
       $( document ).ready(function() {
        var x = $('.alert').html();//'<?=$error;?>';
        if(x !=''){
		  $('.alert').addClass('alert-danger');
          $('.alert').show();
        }
      });
    </script>
    <script type="text/javascript">
    var a = $('#menu').val();
    $('.pan').removeClass('active');
    $('#'+a).addClass('active');
    </script>

</body></html>