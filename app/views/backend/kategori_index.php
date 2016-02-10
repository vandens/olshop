
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="index">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('kategori')?>">Kategori</a></li>
            <li class="active">Daftar Kategori</li>
          </ol>

          <div class="table-responsive">

          <div class="alert" style='display:none'></div>
          <div class="">
            <a class="btn btn-xs btn-primary" href="<?=base_url()?>kategori/add"><span class="glyphicon glyphicon-plus"></span> Add</a>
<!--        <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal" onclick="proses('kategori','submit=tambah','myModal',1)"><span class="glyphicon glyphicon-plus"></span> Add</button>
             <button class="btn btn-sm btn-primary" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Update Price</button> -->
             <!-- <b class="pull-right">1 2 3 4 5 6 </b> -->
            </div>
			
			<div class='pull-right'><?=$this->pagination->create_links()?></div>
            <table class="table table-striped table-hover"  style="font-size:12px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Kategori</th>
                  <th>Jml Merk</th>
                  <th>Add By</th>
                  <th>Add Date</th>
                  <th width="150px"></th>
                </tr>
              </thead>
              <tbody>
              <? $no = $this->uri->segment(3)+1;
              foreach ($sql->result_array() as $data) {
                echo '
                <tr>
                  <td>'.$no.'</td>
                  <td>'.$data['auto'].'</td>
                  <td>'.$data['kategori'].'</td>
                  <td>'.$data['jml'].'</td>
                  <td>'.$data['add_by'].'</td>
                  <td>'.$data['add_date'].'</td>
                  <td>';

                  //<button onclick="proses(\'kategori\',\'submit=edit&key='.$data["auto"].'\',\'myModal\',1)" data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</button>
				echo'
				<a href="'.base_url().'kategori/edit/'.$data["auto"].'" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-remove"></span> Edit</a>
                 <a href="'.base_url().'kategori/hapus/'.$data["auto"].'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
                </tr>';
              $no++;
              } ?>
 

              </tbody>
            </table>
			<div class='pull-right'><?//=$this->pagination->create_links()?></div>
          </div>
        </div>

<script>
 function konfirmasi(){
     var r =  confirm('Anda yakin ingin menghapus data!?');
    if(r){
      return true;
    }else{ return false;  }
 }
</script>