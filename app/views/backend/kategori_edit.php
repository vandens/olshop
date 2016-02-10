        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="FL">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('kategori')?>">Kategori</a></li>
            <li class="active">Edit Kategori</li>
          </ol>
		  <form method="post" action="<?=base_url('kategori')?>" enctype="multipart/form-data">
			<div class="alert" id="alert"><?=$error;?></div>
			<div class="table-responsive">
			  <table class="" style="font-size:12px;">
				<tr><td>ID Kategori</td><td><?=$auto?>
				</td><td></td></tr>
				<tr><td>Nama Kategori</td><td><input type="text" name='param2' value="<?=$kategori?>" class="form-control input-sm" placeholder="Nama Kategori"></td><td></td></tr>
				<tr><td>Icon Kategori</td><td><input type="file" name='param3'></td><td><?=$foto?></td></tr>
				<input type="hidden" name='foto_b4' value='<?=$foto?>'>
				<input type='hidden' name='param1' value='<?=$auto?>'> 
			  </table>
            <br><button type="submit" name="submit" value='update' class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            
              </div>
          </form>
        </div>


<!--<div class='modal-dialog' id="FT">
  <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><strong>Edit Kategori</strong></h4>
    </div>

    <div class='modal-body'>
    <div class="alert" id="alertx"></div>
        <form id="FA">
          <input type='hidden' name='key' value="<?=$auto;?>">
          <input type='hidden' name='submit' value="update">
          <table class="table table-striped" style="font-size:12px;">
            <tr><td>ID Kategori</td><td><input type="text" name='paramx' class="form-control input-sm" value="<?=$auto?>" readonly="readonly">
            </td><td></td></tr>
            <tr><td>Nama Kategori</td><td><input type="text" name='param2' class="form-control input-sm" value="<?=$kategori?>" placeholder="Nama Kategori"></td><td></td></tr>
          </table>
        </form>
    </div>
    <div class='modal-footer'>
    <button type='button' onclick="proses('kategori',$('#FA').serialize(),'alertx',2)" class='btn btn-default btn-sm btn-primary' onclick=""><span class='glyphicon glyphicon-save'></span> Simpan</button>
    <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Tutup</button>
    </div>
  </div>
  </div>-->