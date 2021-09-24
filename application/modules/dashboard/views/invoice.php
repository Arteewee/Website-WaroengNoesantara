 <!-- Main Content -->
<style>
  @media print {
  body * {
    visibility: hidden;
  }
  #myModal, #myModal * {
    visibility: visible;
  }
  #myModal {
    position: absolute;
    left: 0;
    top: 0;
  }
  @page {
    size: auto;   /* auto is the initial value */
    margin-bottom: 0;
    margin-top: 0;  /* this affects the margin in the printer settings */
}
  #myhidden,#myhidden * {
    visibility: hidden;
  }
}
</style>
      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Invoice</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>

              <div class="breadcrumb-item">Invoice</div>

            </div>

          </div>



          <div class="section-body">

            <div class="invoice">

              <div class="invoice-print" id="myModal">

                <div class="row">

                  <div class="col-lg-12">

                    <div class="invoice-title">

                      <h2>Invoice</h2>

                      <div class="invoice-number">Order #<?= $invoice->id_order;?></div>

                    </div>

                    <hr>

                    <div class="row">

                      <div class="col-md-6">

                        <address>

                          <strong>Pembeli:</strong><br>

                            <?= $invoice->nama_lengkap;?><br>


                            

                        </address>

                      </div>

                      <div class="col-md-6 text-md-right">

                        <address>

                          <strong>Meja:</strong><br>

                          <?= $invoice->meja;?><br>

                        </address>

                      </div>
                      

                    </div>
                    <div class="row">
                     <div class="col-md-6">

                      <address>

                        <strong>No Handphone:</strong><br>

                          <?= $invoice->no_hp;?><br>
 

                        </address>

                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">

                        <address>

                          <strong>Total harga:</strong><br>
                 <?php
                          $this->db->select_sum('total_pembayaran');
;
$this->db->where('id_order',$invoice->id_order);
$this->db->from('order_detail');


$a = $this->db->get()->result();
?>
                      <?= $a[0]->total_pembayaran;?>    <br>

                        </address>

                      </div>



                      <div class="col-md-6 text-md-right">

                        <address>

                          <strong>Order Date:</strong><br>

                          <?= $invoice->tanggal;?><br><br>

                        </address>

                      </div>
                      
                    </div>

                  </div>

                </div>



                <div class="row mt-4">

                  <div class="col-md-12">

                    <div class="section-title">Order Summary</div>

                    <!-- <p class="section-lead" id="myhidden">All items here cannot be deleted.</p> -->

                    <div class="table-responsive">

                      <table class="table table-striped table-hover table-md">

                        <tr>

                          <th data-width="40">No</th>

                          <th>Menu</th>

                          <th class="text-center">Price</th>

                          <th class="text-center">Quantity</th>

                          <th class="text-right">Total Pembayaran</th>

                        </tr>

                        <?php foreach ($barang as $key) { ?>

                          <tr>

                          <?php $no=1;?>

                              <td><?= $no++;?></td>

                              <td><?= $key->produk;?></td>

                              <td class="text-center"><?= number_format($key->harga);?></td>

                              <td class="text-center"><?= $key->qty;?></td>

                              <td class="text-right"><?= number_format($key->total_pembayaran);?></td>

                        </tr>

                       <?php } ?>

                       

                      

                      </table>
                      

                    </div>

                    <div class="row mt-4">

                      

                   

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <hr>

              <div class="text-md-right">

              <form action="<?= base_url('dashboard/invoice/ubahstatus');?>" method="post">

                <div class="float-lg-left mb-lg-0 mb-3">

                  <button class="btn btn-primary btn-icon icon-left" name="masak" value="dimasak"><i class="fas fa-utensils"></i>Dimasak</button>

                  <button class="btn btn-danger btn-icon icon-left" name="batal" value="batal"><i class="fas fa-times"></i>Dibatalkan</button>


                </div>

                <input type="hidden" name ="id" value="<?= $this->uri->segment(4);?>">

                <button class="btn btn-info btn-icon icon-left" name="bayar" value="dibayar" onclick = "window.print();"><i class="fas fa-print"></i>Print</button>
                <button class="btn btn-success btn-icon icon-left" name="done" value="selesai"><i class="fas fa-check"></i>Selesai</button>

              </div>

              </form>

            </div>

          </div>

        </section>

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
