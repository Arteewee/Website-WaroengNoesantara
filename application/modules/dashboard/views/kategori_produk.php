   <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Kategori Menu</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>

              <div class="breadcrumb-item">Kategori</div>

            </div>

         

          </div>



          <div class="section-body">

           <?php if($this->session->flashdata('message')){ ?>

                              <div class="alert alert-success">

                               

                                 <strong>Berhasil!</strong> <?php echo $this->session->flashdata('message'); ?>

                                  

                              </div>



                          <?php }?>



            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <a class="btn btn-success" href="<?= base_url('dashboard/tambah-kategori');?>">Tambah kategori</a>

                    

                

                  </div>



                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>

                          <tr>

                            <th class="text-center">

                              No

                            </th>

                            <th>Nama Kategori</th>

                     

                            <th>Action</th>



                          </tr>

                        </thead>

                        <tbody>

                   <?php

                   $no = 1; foreach ($kategori as $kategori) { ?>

                          



                          <tr>

                            <td><center><?= $no++ ;?></center></td>

                            <td><?= $kategori->nama_kategori;?></td>

                          

            

                            <td> 

                                <button  class="btn btn-danger" onclick="hapus(this);" value ="<?= $kategori->id_kategori;?>"><i class="fas fa-trash"></i></button>

                                <a class="btn btn-info" href="<?= base_url('dashboard/edit-kategori/'.$kategori->id_kategori);?>" id="detailbutton" ><i class="fas fa-pencil-alt"></i></a>

                              

                            </td>

                          </tr>

                 <?php } ?> 

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

         </div>

     </section>

    </div>







<script type="text/javascript">







function hapus(idp)

{



  var id_kategori = idp.value;

  Swal.fire({

  title: 'Are you sure?',

  text: "You won't be able to revert this!",

  icon: 'warning',

  timer:3000,

  showCancelButton: true,

  confirmButtonColor: '#3085d6',

  cancelButtonColor: '#d33',

  confirmButtonText: 'Yes, delete it!'

}).then((result) => {

  if (result.value) {

    

    swal.fire({

              title: "Deleted!",

              text: "Your row has been deleted.",

              type: "success",

              timer: 3000

           });

    

    setTimeout(function(){ $(location).attr('href','<?php echo base_url()?>dashboard/Kategori/delete/'+id_kategori);}, 2000);  

    

  }

})



}



</script>