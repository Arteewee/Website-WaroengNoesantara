   <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Menu</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/produk');?>">Menu</a></div>

              <div class="breadcrumb-item"><?= $edit->nama_produk;?></div>

            </div>

          </div>



          <div class="section-body">

           



            <div class="row">

              <div class="col-11">

                <div class="card">

                  <div class="card-header">

                    <h4>Edit <?= $edit->nama_produk;?></h4>

                  </div>

                  <div class="card-body">

                    <div class="row">

                        <div id="on_mobile" class ="col-12">

                          <form action = "<?= base_url('dashboard/edit-produk/'.$edit->id_produk);?>" method="post" enctype="multipart/form-data">

                                  <div class="form-group">

                                    <label for="exampleFormControlInput1"></label><br>

                                    <img alt="image" src="<?= base_url('assets/gambar/frontend/'.$edit->gambar);?>" class="rounded-circle" width="250" data-toggle="tooltip" title="<?= $edit->nama_produk;?>">

                                    <br><span></span>

                                    <input type="file" class="form-control-file" name="gambar"  id="exampleFormControlFile1">

                                  </div>

                                   <div class="form-group">

                                    <label for="exampleFormControlSelect1">Nama Menu</label>

                                    <input type="text" name="nama_produk" value = "<?= $edit->nama_produk;?>" class="form-control">

                                    <font color="red"><?php echo form_error('nama_produk'); ?></font>

                                  </div>



                                  <div class="form-group">

                                    <label for="exampleFormControlSelect1">Kategori</label>

                                    <select class="form-control" name="kategori" id="exampleFormControlSelect1">



                                      <?php foreach ($kategori as $kategori ) { ?>

                                        <option value="<?= $kategori->id_kategori;?>" <?php if($edit->id_kategori == $kategori->id_kategori){echo "selected"; }?> ><?= $kategori->nama_kategori;?></option>

                                     <?php  } ?>

                                    </select>

                                    <font color="red"><?php echo form_error('kategori'); ?></font>

                                  </div>

                                  <div class="form-group">

                                    <label for="exampleFormControlSelect2">Harga</label>

                                     <input type="text" name="harga" value = "<?= $edit->harga;?>" class="form-control">

                                     <span>Masukan harga tanpa titik dan koma</span>

                                     <font color="red"><?php echo form_error('harga'); ?></font>

                                  </div>

                                  <div class="form-group">

                                    <label for="exampleFormControlTextarea1">Diskon</label>

                                     <input type="text" name="diskon" value = "<?= $edit->diskon;?>" class="form-control">

                                     <span>Masukan diskon menggunakan %</span>

                                     <font color="red"><?php echo form_error('diskon'); ?></font>

                                  </div>

                                  <div class="form-group">

                                    <label for="exampleFormControlTextarea1">Stock</label>

                                     <input type="text" name="jumlah" value = "<?= $edit->jumlah;?>" class="form-control">

                                     <span>Masukan Jumlah Stock Produk</span>

                                     <font color="red"><?php echo form_error('jumlah'); ?></font>

                                  </div>

                                  <div class="form-group">

                                    <label for="exampleFormControlTextarea1">Tanggal</label>

                                     <input type="date" name="tanggal" value = "<?= $edit->tanggal;?>" class="form-control">

                                     <font color="red"><?php echo form_error('tanggal'); ?></font>

                                  </div>

                                  <div class="form-group">

                                    <label for="exampleFormControlTextarea1">Deskripsi</label><br>

                                      <textarea   name ="deskripsi" id="exampleFormControlTextarea1"  cols ="50"rows="3"><?= $edit->deskripsi;?></textarea>

                                      <font color="red"><?php echo form_error('deskripsi'); ?></font>

                                  </div>

                                 <div class="form-group">

                                    <button class="btn btn-success"> Edit </button>

                                    <input type="hidden" name="id_produk" value = "<?= $edit->id_produk;?>" class="form-control">

                                 </div>



                          </form>

                         </div>

                       </div>  

                       </dic>

                    </div>

                  </div>

                </div>

              </div>

            </div>

         </div>

     </section>

    </div>





</script>