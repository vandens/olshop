
<div class='modal-dialog'>
  <div class='modal-content'>
  		<div class='modal-header'>
	      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	      <h4 class='modal-title' id='myModalLabel'><strong style="color:black; font-size:18px;">Detail Konfirmasi Pembayaran</strong></h4>
		</div>

		<div class='modal-body'>
		<?
			foreach ($sql as $val) {
				echo '
					<table class="table table-striped">
						<tr><td>Transaksi ID		</td><td>:</td><td>'.$val->auto.'</td></tr>
						<tr><td>Pengirim / No Rekening</td><td>:</td><td>'.$val->pengirim.' / '.$val->rekening.'</td></tr>
						<tr><td>Nama Bank			</td><td>:</td><td>'.$val->nama_bank.'</td></tr>
						<tr><td>Jumlah Transfer		</td><td>:</td><td>Rp '.number_format($val->amount).'</td></tr>
						<tr><td>Email		</td><td>:</td><td>'.$val->email.'</td></tr>
						<tr><td>No Telepon		</td><td>:</td><td>'.$val->notelp.'</td></tr>
						<tr><td>Keterangan		</td><td>:</td><td>'.$val->keterangan.'</td></tr>
						<tr><td>Alamat Tujuan Pengiriman		</td><td>:</td><td>'.$val->alamat.'</td></tr>
						<tr><td>Dikirim Atas Nama		</td><td>:</td><td>'.$val->atas_nama.'</td></tr>
						<tr><td>Ditambahkan Oleh		</td><td>:</td><td>'.$val->add_by.'</td></tr>
						<tr><td>Waktu Ditambahkan		</td><td>:</td><td>'.$val->add_date.'</td></tr>
						<tr><td>Diupdate Oleh		</td><td>:</td><td>'.$val->update_by.'</td></tr>
						<tr><td>Waktu Diupdate		</td><td>:</td><td>'.$val->update_date.'</td></tr>
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