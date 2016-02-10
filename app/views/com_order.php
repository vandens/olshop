            <div class="col-lg-12">
	
              <div class="panel panel-primary">
                <div class="panel-heading">Konfirmasi Pembayaran</div>
                  <div  style="padding:5px;">
                    <form method='post'>
						
						<table align='center'>
							<tr>
								<td colspan='3'><div class="alert" style='display:none'><?=$error;?></div></td>
							</tr>
							<tr>
								<td>Nama Bank / Cabang</td>
								<td>
									<select name='param1' class='form-control input-sm' onchange='bankname(this.value)'>
										<option value='BCA'>BCA</option>
										<option value='Mandiri'>Mandiri</option>
										<option value='BNI'>BNI</option>
										<option value='BRI'>BRI</option>
										<option value='Lainnya'>Lainnya</option>

									</select>
								</td>
								<td><input type='text' id='param2' name='param2' class='form-control input-sm' placeholder='Nama bank' style='display:none'></td>
							</tr>
							<tr>
								<td>No Rekening/Atas nama</td>
								<td><input type='text' name='param3' class='form-control input-sm' placeholder='No Rekening'></td>
								<td><input type='text' name='param4' class='form-control input-sm' placeholder='Rekening Atas Nama'></td>
							</tr>
							<tr>
								<td>Alamat Email/No Telp</td>
								<td><input type='text' name='param5' class='form-control input-sm' placeholder='Alamat Email'></td>
								<td><input type='text' name='param9' class='form-control input-sm' placeholder='No Telepon'></td>
							</tr>
							<tr><td>Tanggal Transfer</td><td class='form-inline'>
								<select name='tgl' class='form-control' style='width:75px'>
									<?
										for($i=1; $i <= 31; $i++)
										{
											echo "<option value=".$i.">$i</option>";
										}
									?>
								</select>
								<select name='bln' class='form-control' style='width:75px'>
									<?
										for($i=1; $i <= 12; $i++)
										{
											echo "<option value=".$i.">$i</option>";
										}
									?>
								</select>
								<select name='thn' class='form-control' style='width:85px'>>
									<?
										$y = date('Y');
										echo "<option value=$y>$y</option>";
									?>
								</select>
							</td><td></td></tr>
							<tr><td>Total Bayar</td><td><input type='text' name='param7' class='form-control input-sm' placeholder='Jumlah Transfer'></td><td></td></tr>
							<tr><td>Keterangan</td><td><textarea class='form-control' name='param8' placeholder='Cth : Pembayaran produk dengan kode AES484 dan IER45'></textarea></td><td></td></tr>

							<tr><td>Alamat Pengiriman Barang</td><td><textarea class='form-control' name='param10' placeholder='Tuliskan alamat lengkap (Jln,No Rumah, Kelurahan(RT/RW), Kec, Kota)'></textarea></td><td></td></tr>
							<tr><td>Dikirim Atas Nama</td><td><input type='text' name='param11' class='form-control input-sm' placeholder='Penerima Atas Nama'><td><td></td></tr>
							<tr><td></td><td></td><td><input type='submit' name='submit' value='Simpan' class='btn btn-primary'></td></tr>
						</table>
					</form>
                  </div>
              </div>
            </div>
			
<script>
	function bankname(key){
		if(key == 'Lainnya')
			$('#param2').show();
		else
			$('#param2').hide();
	}
</script>