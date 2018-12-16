
    <script type="text/javascript" src="<?php echo base_url('assets/js/')?>jquery-3.3.1.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('assets/js/')?>jquery.dataTables.min.js"></script>
     


      <script>
          var heads = [];
            $("thead").find("th").each(function () {
            heads.push($(this).text().trim());
        });
      </script>

<div class="container">
    <div class="row">
        <h1 class="reg-heading">Crud Data Profil</h1>

    </div>
</div>

<section class="profil">
    <div class="container">
        
        <div class="row">
            <a href="<?php echo base_url('beranda/tambah/')?>" class="btn btn-success">Tambah</a>
            <br/><br/>
            <?php
                if(is_array($profil)){
            ?>

            <table id="example-table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Bod</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <?php foreach($profil as $data){  $a = $profil ?>
                <tbody>
                    <tr>
                        <td><?php echo $data['nama']?></td>    

                        <td><?php echo $data['bod']?></td>
                        
                        <td><?php echo $data['address']?></td>
                        
                        <td><?php echo $data['email']?></td>
                        <?php $foto = explode(',', $folder_foto_profil.$data['foto']); ?>

                        <td width="15%"><img src="<?php echo $foto[0]; ?>" class="img-circle img-responsive"/></td>

                        <td width="20%">
                            <a href="<?php echo base_url('beranda/ubah/').$data['id']?>" class="btn btn-warning">Edit</a>
                            <a href="<?php echo base_url('beranda/hapus/').$data['id']?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
                <?php    } ?>
            </table> 
        </div>
        <?php
                } else {
        ?>
                    <div class="container">
                        <div class="row materi-msg">
                            <div class="item-reg text-center">
                                    <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                            </div>
                        </div>
                    </div>
        <?php        
                }
        ?>

        <?php  echo (json_encode($a));
 ?>
    </div>
</section>





    
