
<div class='modal-dialog'>
  <div class='modal-content'>
  		<div class='modal-header'>
	      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	      <h4 class='modal-title' id='myModalLabel'><strong style="color:red; font-size:18px;">Pesan Sekarang (Telp/SMS) >> <?=$no_telepon?></strong></h4>
		</div>

		<div class='modal-body'>
		<?
			foreach ($sql->result() as $val) {
				echo '<img src="'.base_url().'media/images/'.$val->foto.'" class="thumbnail" style="width:400px;">
					<table class="table table-striped">
						<tr><td>Kategori			</td><td>:</td><td>'.$val->kategori.'</td></tr>
						<tr><td>Merk 				</td><td>:</td><td>'.$val->nama_merk.'</td></tr>
						<tr><td>Nama Produk			</td><td>:</td><td>'.$val->nama_produk.'</td></tr>
						<tr><td>Harga  				</td><td>:</td><td>Rp '.number_format($val->harga).'</td></tr>
					</table>';
					
			}
		?>

		</div>

<!--     <div class='modal-footer'>
    <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-file'></span> PDF</button>
    <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-print'></span> Print</button>
    </div> -->
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->