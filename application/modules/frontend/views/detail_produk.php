	<!-- ================ start banner area ================= -->		

	<section class="blog-banner-area" id="blog">

		<div class="container h-100">

			<div class="blog-banner">

				<div class="text-center">

					<h1>Detail Menu</h1>

					<nav aria-label="breadcrumb" class="banner-breadcrumb">

            <ol class="breadcrumb">

              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active" aria-current="page">Shop Single</li> -->

            </ol>

          </nav>

				</div>

			</div>

    </div>

	</section>

	<!-- ================ end banner area ================= -->

          





  <!--================Single Product Area =================-->

	<div class="product_image_area">

		<div class="container">

			<div class="row s_product_inner">

				<div class="col-lg-6">

					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

  						<div class="carousel-inner">

    						<div class="carousel-item active">

      							<img class="d-block w-100" height="380" src="<?= base_url('assets/gambar/frontend/'.$detail->gambar);?>" alt="First slide">

   						    </div>

                  <?php foreach ($gambar as $gambar) { ?>

                  <?php if($gambar->gambar !== null){?>

                   <div class="carousel-item">

                    <img class="d-block w-100" height="380" src="<?= base_url('assets/gambar/frontend/'.$gambar->gambar);?>" alt="Second slide">

                  </div>

                 <?php } ?>

                  

                <?php  } ?>

   					    	

    					

 						 </div>

  					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">

    					<span class="carousel-control-prev-icon" aria-hidden="true"></span>

    					<span class="sr-only">Previous</span>

  					</a>

  					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">

    					<span class="carousel-control-next-icon" aria-hidden="true"></span>

    					<span class="sr-only">Next</span>

 					 </a>

					</div>

				</div>

				<div class="col-lg-5 offset-lg-1">

					<div class="s_product_text">

						<h3><?= $detail->nama_produk;?></h3>

						<h2><?= 'Rp '.number_format($detail->harga);?></h2>

						<ul class="list">

							<li><a class="active" href="#"><span>Kategori</span> : <?= $detail->nama_kategori;?></a></li>

							<li><a href="#"><span>Availibility</span> : <?= $detail->jumlah.' Pcs';?></a></li>

		

						</ul>

						<p><?= $detail->deskripsi;?></p>

				<div class="product_count">

              <label for="qty">Quantity:</label>

				<input type="text"  name="qty" id="sst">

				</div>

							<button id="cart" class="btn btn-success" data-gambar="<?= $detail->gambar;?>" data-idproduk="<?= $detail->id_produk;?>" data-namaproduk="<?= $detail->nama_produk;?>" data-hargaproduk="<?= $detail->harga;?>" data-kategoriproduk="<?= $detail->id_kategori;?>">Add to Cart</button>               

						

					

					</div>

				</div>

			</div>

		</div>

	</div><br><br>

	<!--================End Single Product Area =================-->



	<!--================ end related Product area =================-->  



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





$(document).on("click", "#cart", function () {

  var jumlah = $('#sst').val();

  if(jumlah == false)

  {

  	alert("Masukan Jumlah");

  }else

  {
  var gambar = $(this).data("gambar");
  var id_produk = $(this).data("idproduk");

  var nama = $(this).data("namaproduk");

  var harga = $(this).data("hargaproduk");

  var kategori = $(this).data("kategoriproduk");

  var quantity     = 1;

 	  $.ajax({

                url : "<?php echo base_url();?>frontend/Home/tambahcart",

                type : "POST",

                data : {gambar: gambar, id_produk: id_produk, nama: nama, harga: harga, qty: jumlah },

                success: function(data){

  					alert("Berhasil dimasukan keranjang");

                    totalitem();

                }

            });

  	}

            



   });



 </script>

