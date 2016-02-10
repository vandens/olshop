<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="revisit-after" content="2 days">
<meta name="robots" content="index,follow">
<meta name="googlebot" content="index,follow">
<meta name="MSSmartTagsPreventParsing" content="TRUE">
<meta name="author" content="Nusa Elektronik">
<meta name="copyright" content="Nusa Elektronik">
<meta name="creator" content="Code Line Development">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta NAME="Distribution" CONTENT="Global">
<meta NAME="Rating" CONTENT="General">

    <link rel="shortcut icon" href="">


    <meta charset="utf-8">
    <title><?=$nama_aplikasi?> - Murahnya Beli Komputer, Notebook / Laptop, Smartphones, Printer di Tangerang dengan Harga Murah dan Garansi Terjamin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>media/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>media/css/navbar.css" rel="stylesheet">   
<!--
    <script type="text/javascript" src="<?=base_url();?>media/js/mmenu.js"></script>      
    <script type="text/javascript" src="<?=base_url();?>media/js/menuItems.js"></script> -->


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?22bP4sGi47DwdCwCJHDyYD6xCTOtumCV';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

  </head>

  <body style="background-image:url('<?=base_url()?>media/images/bgcolor.png'); background-repeat:repeat-x; background-color:white;">

    <div class="container" style="border-width:1px; width:1075px;">
       <div class="panel panel-default" style="padding:10px; background-color:white;">
       <? $pic = $this->db->query('select filename from t_header order by RAND() limit 1')->result_array();	?>
       <img src='<?=base_url();?>media/images/<?=$pic[0]['filename']?>'>
            <?=$this->load->view('panel_atas');?>

        <div class='panel panel-primary'>
               <marquee>
               <? foreach ($sqlx as $val) {
                 echo $val['deskripsi']. ' | ';
               }?>
               </marquee>
        </div>
        <div>
        <br>

        <div class="row">
            <?
            // echo $this->load->view('katalog');
             echo $panel_kiri;
             echo $panel_tengah;
             echo $panel_kanan;
            ?>
        </div>
      </div>


      <?=$this->load->view('panel_bawah')?>
      </div>
    </div> <!-- /container -->


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div><!-- /.modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>media/js/jquery.js"></script>
    <script src="<?=base_url();?>media/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url();?>media/jssor/js/jssor.core.js"></script>
    <script type="text/javascript" src="<?=base_url();?>media/jssor/js/jssor.utils.js"></script>
    <script type="text/javascript" src="<?=base_url();?>media/jssor/js/jssor.slider.js"></script>
    <script type="text/javascript" src="<?=base_url();?>media/jssor/js/jquery-1.9.1.min.js"></script>

    <script>
       $( document ).ready(function() {
        var x = $('.alert').html();//'<?=$error;?>';
        if(x !=''){
		  $('.alert').addClass('alert-danger');
          $('.alert').show();
        }
      });
    </script>
    <script>
        //Reference http://www.jssor.com/development/slider-with-slideshow.html
        //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

        var _SlideshowTransitions = [
        //Fade
        {$Duration: 700, $Opacity: 2, $Brother: { $Duration: 1000, $Opacity: 2} }
        ];
    </script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 3500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        });
    </script>
    <script type="text/javascript">
    var a = $('#menu').val();
    $('.pan').removeClass('active');
    $('#'+a).addClass('active');


    function beli(key){
      $.ajax({
          url   : '<?=base_url("general/beli")?>',
          type  : 'post',
          data  : 'key='+key,
          success : function(param){
            $('#myModal').html(param);
          }
      })
    }
    </script>
</body></html>