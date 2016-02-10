        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="index">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('setting')?>">Setting</a></li>
            <li class="active">General Setting</li>
          </ol>
		  <div class="alert" id='alert' style='display:none'></div>
		  <div class='panel panel-primary' style='padding:10px;'>
		  Format gambar yang diijinkan (.jpg, .png, .gif, .bmp) dengan ukuran 1024pixel x 157pixel<br>
			<br>
			<form name='form' method='post' enctype="multipart/form-data">
			<input type='file' name='filename'><br>
			<input type='submit' name='submit' value='simpan' class='btn btn-success btn-sm' onclick="proses('setting',$('#form').serialize(),'alert',2)">
			</form>
          </div>
		  <p>
		  <div>
			<?
			foreach($sql->result_array() as $data){
				echo '<div class="panel">
					<a href="imgheader/delete/'.$data['auto'].'">Hapus gambar ini</a>
						<p><img src="'.base_url().'media/images/'.$data['filename'].'" class="thumbnail"></p>
					</div>';
			}
			?>
		  </div>
        </div>
		
