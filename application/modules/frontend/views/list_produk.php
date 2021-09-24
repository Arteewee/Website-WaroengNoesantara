	<!-- ================ start banner area ================= -->	

	<section class="blog-banner-area" id="category">

		<div class="container h-100">

			<div class="blog-banner">

				<div class="text-center">

					<h1>Kategori Menu</h1>

					<nav aria-label="breadcrumb" class="banner-breadcrumb">

            <ol class="breadcrumb">


            </ol>

          </nav>

				</div>

			</div>

    </div>

	</section>

	<!-- ================ end banner area ================= -->





	<!-- ================ category section start ================= -->		  

  <section class="section-margin--small mb-5">

    <div class="container">

      <div class="row">

        <div class="col-xl-3 col-lg-4 col-md-5">

          <div class="sidebar-categories">

            <div class="head">Kategori</div>

            <ul class="main-categories">

              <li class="common-filter">

                <form action="#">

                  <ul>

                  <li class="filter-list"><a href="<?= base_url('list-produk');?>" >Tampilkan Semua Menu</label></a></li>

                  <?php 



                  foreach ($kategori as $kategori)

                  {?>



                     <li class="filter-list"><a href="<?= base_url('kategori/'.$kategori->id_kategori);?>"><label for="men"><?= $kategori->nama_kategori;?><span> (<?= $this->db->where('id_kategori',$kategori->id_kategori)->from('produk')->count_all_results();?>)</span></label></a></li>

                 <?php  } ?>

                   

                  </ul>

                </form>

              </li>

            </ul>

          </div>

     

        </div>

        <div class="col-xl-9 col-lg-8 col-md-7">

          <!-- Start Filter Bar -->

          <div class="filter-bar d-flex flex-wrap align-items-center">

         

            <div> <?php echo form_open(base_url().'cari','class="search-form"'); ?>

              <div class="input-group filter-bar-search">



                <input type="text" name="cari" placeholder="Search">



                <div class="input-group-append">

                  <button type="button"><a href="<?= base_url('cari');?>"><i class="ti-search"></i></a></button>

                </div>

              </div>

            </div>

          </div>

          <?= form_close();?>

          <!-- End Filter Bar -->

          <!-- Start Best Seller -->

          <section class="lattest-product-area pb-40 category-list">

            <div class="row">

          <?php if(count($list_produk) == 0){ ?>

          <center>

            <h3 class="mt-5"><?= $search;?> </h3>

          </center>

        <?php } ?>

            <?php foreach ($list_produk as $list_produk)  { ?>

               <div class="col-md-6 col-lg-4">

                <div class="card text-center card-product">

                  <div class="card-product__img">

                    <img class="card-img" src="<?= base_url('assets/gambar/frontend/'.$list_produk->gambar);?>"  height="250">

                    <ul class="card-product__imgOverlay">

                      <li><button><a href="<?= base_url('detail-produk/'.$list_produk->id_produk);?>" ><i class="ti-info"></i></a></button></li>

                      <li><button id="produkcart" data-kategorigambar="<?= $list_produk->gambar;?>"data-idproduk="<?= $list_produk->id_produk;?>" data-namaproduk="<?= $list_produk->nama_produk;?>" data-hargaproduk="<?= $list_produk->harga;?>" data-kategoriproduk="<?= $list_produk->id_kategori;?>" ><i class="ti-shopping-cart"></i></a></button></li>

                          

                    </ul>

                  </div>

                  <div class="card-body">

                    <p><?= $list_produk->nama_kategori;?></p>

                    <h4 class="card-product__title"><a href="<?= base_url('detail-produk/'.$list_produk->id_produk);?>"><?= $list_produk->nama_produk;?></a></h4>

                    <p class="card-product__price"><?= "Rp ".number_format($list_produk->harga);?></p>

                  </div>

                </div>

              </div>

           <?php } ?>

             

             

            </div>

          </section>

          <center> <?= $this->pagination->create_links(); ?></center>

          <!-- End Best Seller -->

        </div>

      </div>

    </div>

  </section>

  <script type="text/javascript">

$(document).ready(function(){

  totalitem();

});









function totalitem()

{

   $.ajax({

                url : "<?php echo base_url();?>frontend/Home/loadcart",

                type : "GET",

                

                success: function(data){

                    $('#loadz').html(data);

                }

          });

  

}





$(document).on("click", "produkcart", function () {

  var id_produk = $(this).data("idproduk");

  var nama = $(this).data("namaproduk");

  var harga = $(this).data("hargaproduk");

  var kategori = $(this).data("kategoriproduk");

  var gambar = $(this).data("kategorigambar");

  var quantity = 1;

             $.ajax({

                url : "<?php echo base_url();?>frontend/Home/tambahcart",

                type : "POST",

                data : {id_produk: id_produk, nama: nama, harga: harga, qty: quantity,gambar:gambar },

                success: function(data){

                alert("Berhasil dimasukan keranjang");

                  

                    totalitem();

                }

            });



   });



 </script>