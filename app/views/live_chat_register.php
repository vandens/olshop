<link href="<?=base_url();?>media/css/bootstrap.css" rel="stylesheet">
<script src="<?=base_url();?>media/js/bootstrap.js"></script>
<script src="<?=base_url();?>media/js/jquery.js"></script>
<script src="<?=base_url();?>media/js/vandens.js"></script>

<div class="panel panel-primary" style="margin:5px; height:470px; width:485px;" id="form">
    <div class="panel-heading">Live Chat</div>
    <div  style="padding:5px;">
    <form method="post" id="FT">
    Masukkan Data pribadi Anda agar kami mengetahui dengan siapa kami ber-chat ria... :D
    	<table class="table" width="470px">
    		<tr><td width="150px">Nama</td><td width="320px"><input class="form-control" type="text" id="param1" name="param1" placeholder="Nama Lengkap"></td></tr>
    		<tr><td>Alamat Email</td><td><input class="form-control" type="text" id="param2" name="param2" placeholder="Alamat Email"></td></tr>
    		<tr><td>Pertanyaan</td><td><textarea class="form-control" id="param3" name="param3" placeholder="Pertanyaan"></textarea></td></tr>
       		<tr><td>Chat Dengan</td><td><input type="text" name="param4" value="<?=$to?>" class="form-control" readonly></td></tr>
    	</table>
    <input type="hidden" name="submit" value="start">
   </form>
    <button class="pull-right form-control btn btn-sm btn-success" onclick="submit()"><span class="glyphicon glyphicon-comment"></span> Mulai Chatting</button>
    
    </div>
</div>

<script>
function submit(){
  if($("#param1").val() == '')
    alert('Nama tidak boleh kosong');
  else if($("#param2").val() == '')
    alert('Email tidak boleh kosong');
  else if($("#param3").val() == '')
    alert('Pertanyaan tidak boleh kosong')
  else{
    proses("<?=base_url('home/live_chat')?>",$("#FT").serialize(),'form',1);
  }
}
</script>