   <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>List Menu</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>

              <div class="breadcrumb-item">Menu</div>

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

                    <a class="btn btn-success" href="<?= base_url('dashboard/tambah-produk');?>">Tambah Menu</a>

                    

                

                  </div>



                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>

                          <tr>

                            <th class="text-center">

                              No

                            </th>

                            <th>Gambar</th>

                            <th>Nama Menu</th>

                            <th>Kategori Menu</th>

                            <th>Harga</th>

                            <th>Diskon</th>

                            <th>Stock</th>

                            <th>Action</th>

                          </tr>

                        </thead>

                        <tbody>

                   <?php

                   $no = 1; foreach ($produk as $produk) { ?>

                          



                          <tr>

                            <td><center><?= $no++ ;?></center></td>

                            <td><img alt="image" src="<?= base_url('assets/gambar/frontend/'.$produk->gambar);?>" class="rounded-circle" height="110" data-toggle="tooltip" title="Wildan Ahdian"></td>

                            <td><?= $produk->nama_produk;?></td>

                            <td><?php if($produk->nama_kategori == null)

                            {

                              echo"-";

                            }else{

                              echo $produk->nama_kategori;

                              }?></td>

                            <td><?= 'Rp '.number_format($produk->harga);?></td>

                            <td><div class="badge badge-danger"><?= $produk->diskon;?></div></td>
                            <td><?= $produk->jumlah;?></td>

                            <td> <a class="btn btn-primary" target="__blank" href="<?= base_url('detail-produk/'.$produk->id_produk);?>"><i class="fas fa-search"></i></a>

                                <button  class="btn btn-danger" onclick="hapus(this);" value ="<?= $produk->id_produk;?>"><i class="fas fa-trash"></i></button>

                                <a class="btn btn-info" href="<?= base_url('dashboard/edit-produk/'.$produk->id_produk);?>" id="detailbutton" ><i class="fas fa-pencil-alt"></i></a>

                                <a class="btn btn-primary" href="<?= base_url('dashboard/add-gambar-produk/'.$produk->id_produk);?>"><i class="fas fa-image"></i></a>

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



<!-- Modal -->





<script type="text/javascript">







function hapus(idp)

{



  var id_produk = idp.value;

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

    

    setTimeout(function(){ $(location).attr('href','<?php echo base_url()?>dashboard/Dashboard/delete_produk/'+id_produk);}, 2000);  

    

  }

})



}



</script>