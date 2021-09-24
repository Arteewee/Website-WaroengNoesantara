   <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Kategori</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/kategori');?>">Kategori</a></div>

              <div class="breadcrumb-item">Edit Kategori</div>

            </div>

          </div>



          <div class="section-body">

           



            <div class="row">

              <div class="col-11">

                <div class="card">

                  <div class="card-header">

                    <h4>Edit Kategori</h4>

                  </div>

                  <div class="card-body">

                    <div class="row">

                        <div id="on_mobile" class ="col-12">

                          <form action = "<?= base_url('dashboard/edit-kategori/'.$kategori->id_kategori);?>" method="post" enctype="multipart/form-data">

                                  

                                   <div class="form-group">

                                    <label for="exampleFormControlSelect1">Nama Kategori</label>

                                    <input type="text" name="nama_kategori" value = "<?= $kategori->nama_kategori;?>" class="form-control">

                                    <font color="red"><?php echo form_error('nama_kategori'); ?></font>

                                  </div>



                                 <div class="form-group">

                                  <input type="hidden" name="id_kategori" value = "<?= $this->uri->segment(3);?>" class="form-control">

                                    <button class="btn btn-success"> Edit Kategori </button>

                                    

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