<link href="<?=base_url();?>media/css/bootstrap.css" rel="stylesheet">
<script src="<?=base_url();?>media/js/bootstrap.js"></script>
<script src="<?=base_url();?>media/js/jquery.js"></script>

<div class="panel panel-primary" style="margin:5px; height:470px; width:485px;">
    <div class="panel-heading">Live Chat</div>
    <div  style="padding:5px;">
		<p>Jangan ragu untuk menanyakan langsung layanan Nusantara Komputindo melalui chat di bawah ini:</p>

		<b>LiveChat (recommended)</b><br>
		<div class="row">
		<? $i = 1;
			foreach ($chat as $ch) {
				$st = ($ch['is_login']==1) ? 'online.jpg' : 'offline.jpg';
				$cl = ($ch['is_login']==1) ? 'success' : 'danger';
				$ro = ($ch['is_login']==1) ? '' : 'disabled';
				echo '
					<div class="col-xs-3" style="margin-right:30px;">
					<form action="" method="post">
						<img src="'.base_url("media/images/".$st."").'" width="50px">
						<button type="submit" name="submit" value="register" '.$ro.' class="btn btn-'.$cl.' btn-sm">'.$ch['nama_lengkap'].' | '.strtoupper($ch['jabatan']).'</button>
						<input type="hidden" name="to" value="'.$ch['nama_lengkap'].'" class="form-control">
					</form>
					</div>
					';
			$i++;
			}
		?>
		</div>
		<p><br>
		Phone<br>
		Tangerang: 021-1234567 / 1234567890<br>
		Untuk pelayanan teknis kami sarankan menghubungi melalui email teknis@nuskom.co.id</p>
		<div style="overflow:scroll; margin-top:50px; height:100px;">	
		    <ol><li> Hanya Nusantara Komputindo yang berhak atas pengarsipan seluruh isi percakapan/chat dan dapat mempublikasikannya ke pihak lain apabila diperlukan.
		    </li><li>Nusantara Komputindo akan melindungi data lawan bicara sepanjang tidak bertentangan dengan hukum dan perundang-undangan hukum Republik Indonesia.
		    </li><li>Nusantara Komputindo mendapatkan perlindungan hukum termasuk dan berhak mengajukan tindakan hukum atas pelanggaran yang dilakukan oleh lawan bicara termasuk di dalamnya penghinaan, fitnah, penipuan, dan tindak pidana lain serta pelanggaran terhadap UU ITE.
			</li>
			</ol>
		</div>
    </div>
</div>