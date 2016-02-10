            <div class="col-lg-6">
              <div class="panel panel-primary">
                <div class="panel-heading">Testimoni</div>
                <br>
                <form action="<?=base_url()?>home/testimoni" method="post"  style="padding:5px;">
                	<div class="alert" style='display:none'><?=$error;?></div>
                	<table class="table">
                		<tr><td width="100px">Nama</td><td><input type="text" name="param1" placeholder="Nama" class="form-control input-sm" style="width:250px"></td></tr>
                		<tr><td>Alamat Email</td><td><input type="text" name="param2" placeholder="Alamat Email" class="form-control input-sm" style="width:250px"></td></tr>
                		<tr><td>Pesan</td><td><textarea name='param3' placeholder="Isi Pesan" class="form-control"></textarea></td></tr>
                	</table>
                	<button class="btn btn-sm btn-primary" type="submit" name="submit" value="simpan"><span class="glyphicon glyphicon-save"></span> Kirim</button>
                </form>
                <hr>
                <div  style="padding:5px;">
                <?	$i = 1;
                	foreach ($sql2->result() as $val) {
                		if($i % 2 == 0)
                			$class = 'pull-right';
                		else
                			$class = 'pull-left';

                			echo '<blockquote class="'.$class.'">
								  <p>'.$val->nama.'</p>
								  <small>'.$val->pesan.'<cite title="Source Title"> | Pada : '.$val->add_date.'</cite></small>
								  </blockquote>';	
					$i++;
                	}
					echo "<br style='clear:both;'>";
                ?>
                </div>
              </div>
            </div>
