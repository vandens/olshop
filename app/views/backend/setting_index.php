<?	foreach($sql->result_array() as $data); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="index">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('setting')?>">Setting</a></li>
            <li class="active">General Setting</li>
          </ol>
          <div class="table-responsive">
		  <div class="alert" id='alert' style='display:none'></div>
		  <form method='post' id='form'>
			<input type='hidden' name='submit' value='simpan'>
            <table class="table table-striped"  style="font-size:12px; width:500px">
			<!--
                <tr><td>Status Aplikasi</td><td>
				
								<div class="btn-group" id='status'>
								<?if(1 == 1){ ?>
										 <button type='button' class='btn btn-success btn-sm' id='on' onclick="statapp('on')">ON</button>
										 <button type='button' class='btn btn-default btn-sm' id='off' onclick="statapp('off')">OFF</button>
								<?}else{?>
										 <button type='button' class='btn btn-default btn-sm' id='on' onclick="statapp('on')">ON</button>
										 <button type='button' class='btn btn-danger btn-sm' id='off' onclick="statapp('off')">OFF</button>
								<?} ?>
								</div>
				</td></tr>
				-->
                <tr><td>Nama Aplikasi *</td><td><input placeholder='Nama Aplikasi' type='text' name='param1' id='param1' value='<?=$data['nama_aplikasi']?>' class='form-control input-sm'></td></tr>
                <tr><td>Nama Toko *</td><td><input placeholder='Nama Toko' type='text' name='param2' id='param2' value='<?=$data['nama_toko']?>' class='form-control input-sm'></td></tr>
                <tr><td>Nama Pemilik Toko *</td><td><input placeholder='Nama Pemilik Toko' type='text' name='param3' id='param3' value='<?=$data['pemilik_toko']?>' class='form-control input-sm'></td></tr>
                <tr><td>Alamat</td><td><textarea placeholder='Alamat Toko' name='param4' id='param4' class='form-control input-sm'><?=$data['alamat_toko']?></textarea></td></tr>
                <tr><td>Nomor Telepon *</td><td><input placeholder='Nomor Telepon' type='text' name='param5' id='param5' value='<?=$data['no_telepon']?>' class='form-control input-sm'></td></tr>
                <tr><td>Alamat Email *</td><td><input placeholder='Alamat Email' type='text' name='param6' id='param6' value='<?=$data['alamat_email']?>' class='form-control input-sm'></td></tr>
                <tr><td>Home Page</td><td><input placeholder='homepage' type='text' name='param7' id='param7' value='<?=$data['homepage']?>' class='form-control input-sm'></td></tr>
                <tr><td>Tampil perPage (BO) *</td><td><input placeholder='Tampilkan Data PerPage Backend' type='text' name='param8' id='param8' value='<?=$data['perpage_bo']?>' class='form-control input-sm'></td></tr>
                <tr><td>Tampil pePage (FO) *</td><td><input placeholder='Tampilkan Data PerPage Frontend' type='text' name='param9' id='param9' value='<?=$data['perpage_fo']?>' class='form-control input-sm'></td></tr>
            </table>
			</form>
			
			<input type='submit' name='submit' value='simpan' class='btn btn-success' onclick="proses('setting',$('#form').serialize(),'alert',2)">
			
          </div>
        </div>