



      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="row">

            <div class="col-lg-4 col-md-5 col-sm-10">

              <div class="card card-statistic-2">

                <div class="card-stats">

                  <div class="card-stats-title">order

                    <div class="dropdown d-inline">

                      

                    </div>

                  </div>

                  <div class="card-stats-items">

                    <div class="card-stats-item">

                      <div class="card-stats-item-count"><?= $this->db->where('status','pending')->from('order_detail')->count_all_results();?></div>

                      <div class="card-stats-item-label">Pesanan</div>

                    </div>

                    <div class="card-stats-item">

                      <div class="card-stats-item-count"><?= $this->db->where('status','dimasak')->from('order_detail')->count_all_results();?></div>

                      <div class="card-stats-item-label">Dibuat</div>

                    </div>
                     <div class="card-stats-item">

                      <div class="card-stats-item-count"><?= $this->db->where('status','dibayar')->from('order_detail')->count_all_results();?></div>

                      <div class="card-stats-item-label">Dibayar</div>

                    </div>

                    <div class="card-stats-item">

                      <div class="card-stats-item-count"><?= $this->db->where('status','selesai')->from('order_detail')->count_all_results();?></div>

                      <div class="card-stats-item-label">Selesai</div>

                    </div>

                    <div class="card-stats-item">

                      <div class="card-stats-item-count"><?= $this->db->where('status','batal')->from('order_detail')->count_all_results();?></div>

                      <div class="card-stats-item-label">Batal</div>

                    </div>

                  </div>

                </div>

                <div class="card-icon shadow-primary bg-primary">

                  <i class="fas fa-archive"></i>

                </div>

                <div class="card-wrap">

                  <div class="card-header">

                    <h4>Total Orders</h4>

                  </div>

                  <div class="card-body">

                    <?= $this->db->count_all('order_detail');?>


                  </div>

                </div>

              </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">

              <div class="card card-statistic-2">

              

                 

                </div>

              </div>

            </div>

           

          

          <div class="row">

            <div class="col-md-12">

              <div class="card">

                <div class="card-header">

                  <h4>Invoices</h4>





                </div>

                        <?php if($this->session->flashdata('msession_connect(host, port)age')){ ?>

                              <div class="alert alert-success">

                               

                                 <strong>Berhasil!</strong> <?php echo $this->session->flashdata('message'); ?>

                                  

                              </div>



                          <?php }?>

                <div class="card-body">

                  <div class="table-responsive">

                    <table class="table table-striped" id="table-1">

                     <thead>

                      <tr>

                        <th>Invoice ID</th>

                        <th>Customer</th>

                        <th>Nomor Meja</th> 

                        <th>Total Harga</th>

                        <th>Status</th>

                        <th>Due Date</th>

                        <th>Action</th>

                      </tr>

                      </thead>

                      <tbody>

                    <?php foreach ($invoice as $key) { ?>

                      <tr>

                        <td><a href="#"><?= $key->tbl_id_order;?></a></td>

                        <td class="font-weight-600"><?= $key->nama_lengkap;?></td>
                        <td class="font-weight-600"><?= $key->meja;?></td>
                        <td class="font-weight-600"><?= $key->total_pembayaran;?></td>

                        <td><?php if($key->status=="dibayar"){?>

                          <div class="badge badge-info">

                        <?php  }
                        elseif($key->status=="batal"){ ?>

                         <div class="badge badge-danger">
                          <?php }

                         elseif($key->status=="selesai"){ ?>

                         <div class="badge badge-success">
                          <?php }

                        elseif($key->status=="dimasak"){ ?>

                         <div class="badge badge-primary">
                          <?php }

                          else{ ?>

                           <div class="badge badge-warning">
                       <?php   } ?>





                          <?= $key->status;?></div></td>

                        <td><?= $key->tanggal;?></td>

                        <td>
                          <a href="<?= base_url('dashboard/Invoice/index/'.$key->tbl_id_order);?>" class="btn btn-primary "><i class="fas fa-info"></i></a>

                           <button  class="btn btn-danger" onclick="hapus(this);" value ="<?= $key->id_order_detail;?>"><i class="fas fa-trash"></i></button>

                        <input type="hidden" name="id_order" id="id_order"value="<?= $key->id_order;?>">

                        <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $key->id_pelanggan;?>">

                        </td>

                      </tr>

                    <?php  } ?>

                 

                    </table>

                  </div>

                </div>

              </div>

            </div>

           

      <footer class="main-footer">

        <div class="footer-left">

          Copyright &copy; 2021 <div class="bullet"></div> Design By RestoTech

        </div>

        <div class="footer-right">

          1.0

        </div>

      </footer>

    </div>

    </div>







<script type="text/javascript">







function hapus(idp)

{



  var id_produk = idp.value;

  var id_order = $('#id_order').val();

  var id_pelanggan = $('#id_pelanggan').val();

  console.log(id_order);

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

    

    setTimeout(function(){ $(location).attr('href','<?php echo base_url()?>dashboard/Invoice/delete/'+id_produk);}, 2000);  

    

  }

})



}



</script>