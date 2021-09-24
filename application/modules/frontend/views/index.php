

  <main class="site-main">

    
 <!--================ Hero banner start =================-->

    <section class="hero-banner">

      <div class="container">

        <div class="row no-gutters align-items-center pt-55px">

          <div class="col-5 d-none d-sm-block">

            <div class="hero-banner__img">

              <img class="img-fluid" src="<?= base_url('assets/gambar/frontend/warnusasli1.png');?>" alt="">

            </div>

          </div>

          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0" id="slider_caption">

            <div class="hero-banner__content">

              <h4>Selamat Datang di</h4>

              <h1>Waroeng Noesantara</h1>

              <!-- <p>untuk memesan terdapat di menu</p> -->

             

            </div>

          </div>

        </div>

      </div>

    </section>

    <!--================ Hero banner start =================-->

   




    <!-- ================ trending product section start ================= -->  

    <section class="section-margin calc-60px">

      <div class="container">

        <div class="section-intro pb-60px">

          <!-- <p>Menu Terbaru</p> -->

          <h2 class="section-intro__style">Menu <span>Terbaru</span></h2>

        </div>

        <div class="row">

        <?php foreach ($produk as $produk)

         { ?>

            <?php 

                      $harga = $produk->harga;

                      $getdiskon = (int)$produk->diskon;

                      // $rdiskon = $harga - $harga * ($getdiskon/100);

                      $diskon = $harga + $harga * ($getdiskon/100);

                      ?>

                <div class="col-md-6 col-lg-4 col-xl-3">

                  <div class="card text-center card-product">

                    <div class="card-product__img">

                      <img class="card-img" src="<?= base_url('assets/gambar/frontend/'.$produk->gambar);?>"  height="280px" alt="">

                      <ul class="card-product__imgOverlay">

                        <li><button><a href="<?= base_url('detail-produk/'.$produk->id_produk);?>" ><i class="ti-info"></i></a></button></li>

                        <li><button id="produkcart" data-idproduk="<?= $produk->id_produk;?>" data-namaproduk="<?= $produk->nama_produk;?>" data-hargaproduk="<?= $produk->harga;?>" data-kategoriproduk="<?= $produk->id_kategori;?>" data-kategorigambar="<?= $produk->gambar;?>" ><i class="ti-shopping-cart"></i></a></button></li>            

                      </ul>

                    </div>

                    <div class="card-body">

                      <p><?= $produk->nama_kategori;?></p>

                      <h4 class="card-product__title"><?= $produk->nama_produk;?></a></h4>

                   

                      <p class="card-product__price">

                         <span style='color:black;text-decoration:line-through'>
                      <?php if($getdiskon != 0){ ?>
                              <span style='color:red'><?= 'Rp '.number_format($diskon);?></span>

                         </span><sup><?= $produk->diskon;?></sup>
                       
                      </p>
                    
                     <p class="card-product__price"><?= 'Rp '.number_format($produk->harga);?></p>

                      <?php }else{?>
                        <p class="card-product__price"><?= 'Rp '.number_format($produk->harga);?></p>
                      <?php }?>
                        
                      
                    

                    </div>

                  </div>

                </div>

       <?php  } ?>

            

          </div>

        </div>

      </div>

    </section>

    <!-- ================ trending product section end ================= -->  









