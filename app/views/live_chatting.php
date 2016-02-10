<link href="<?=base_url();?>media/css/bootstrap.css" rel="stylesheet">
<script src="<?=base_url();?>media/js/bootstrap.js"></script>
<script src="<?=base_url();?>media/js/jquery.js"></script>
<style type="text/css">
.hidden-scrollbar {
  background-color:black;
  border:2px solid #666;
  color:white;  
  overflow:hidden;
  text-align:justify;    
}

.hidden-scrollbar .inner {
  height:240px;
  overflow:auto;
  margin:15px -300px 15px 15px;
  padding-right:300px; /* Samakan dengan besar margin negatif */
}
</style>
<div class="panel panel-primary" style="margin:5px; height:470px; width:485px;">
    <div class="panel-heading">Live Chat</div>
    <div  style="padding:5px;"><strong><?=$pertanyaan?></strong>
        <div class='hidden-scrollbar'>
            <div class='inner' id='chatting'>
              
            </div>
        </div>
    <p>
    <form id="fmsg">
    <textarea class="form-control" name="msg" id="msg"></textarea>
    <input type="hidden" name="key" value="<?=$auto?>" id="key">
    <input type="hidden" name="sender" value="<?=$dari?>" id="sender">
    <!-- <input type="hidden" name="submit" value="sendmsg"> -->
    </form>
    <button class="btn btn-success btn-sm pull-right" onclick="send_msg()"><span class="glyphicon glyphicon-email"></span> Kirim</button>
    </p>
    </div>
</div>

<script>
$(document).ready(function(){
    setInterval(function() {
      var key = $("#key").val();
      var sender = $("#sender").val();
      $.ajax({
        url   : "<?=base_url('home/chatting')?>",
        type  : "post",
        data  : "key="+key+"&sender="+sender,
        success : function(param){
          $("#chatting").html(param);
        }
      })

    }, 5000); 
})
 	function send_msg(){
 		if($("#msg").val() == ''){
 			alert('Pesan gag boleh kosong bos..!');			
	 		$("#msg").focus();
 		}else{
	 		var msg = $("#fmsg").serialize();
	 		var submit = "&submit=sendmsg";
			$("#msg").val('');
	 		$("#msg").focus();
	 		$.ajax({
	 			url 	: "<?=base_url('home/chatting')?>",
	 			type	: "post",
	 			data 	: msg+submit,
	 			success : function(param){
	 				$("#chatting").html(param);
	 			}
	 		})
 		}
 	}
</script>