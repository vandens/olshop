    <script type="text/javascript" src="<?=base_url();?>media/editor/ckeditor.js"></script>
    <?  foreach ($sql as $val) { $id = $val->auto; } ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="FL">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href='<? echo base_url().'other/show/'.$id; ?>'>Profil</a></li>
            <li class="active"><?=$val->judul?></li>
          </ol>

          <form method="post" action="<?=base_url('other/index')?>">
          <h2><?=$val->judul?></h2>
            <input type="hidden" name="key" value="<?=$id?>">
            <textarea class="ckeditor" name='param1' id="editor1"><?=$val->isi?></textarea>
            <br><button type="submit" name="submit" value="simpan" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
          </form>
        </div>