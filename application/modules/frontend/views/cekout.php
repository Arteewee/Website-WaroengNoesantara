<!-- ================ start banner area ================= -->	

	<section class="blog-banner-area" id="category">

		<div class="container h-100">

			<div class="blog-banner">

				<div class="text-center">

					<h1>List pesanan</h1>

					<nav aria-label="breadcrumb" class="banner-breadcrumb">

            <ol class="breadcrumb">


            </ol>

          </nav>

				</div>

			</div>

    </div>

	</section>

	<!-- ================ end banner area ================= -->

  

  

  <!--================Checkout Area =================-->

  <section class="checkout_area section-margin--small">

    <div class="container">

        

    

        <div class="billing_details">

            <div class="row">

                <div class="col-lg-8">

                    <h3>Detail Pesanan</h3>

                    <form class="row contact_form" action="<?= base_url('frontend/Order');?>" method="post" novalidate="novalidate">

                         

               
                        <div class="col-md-12 form-group p_star">

                            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama');?>" placeholder="Nama Lengkap" required>

                           <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>

                        </div>

                        <div class="col-md-12 form-group p_star">

                            <input type="text" class="form-control" id="nama" name="nomor" value="<?= set_value('nomor');?>" placeholder="Nomor Handphone" required>

                           <?= form_error('nomor','<small class="text-danger pl-3">','</small>');?>

                        </div>

                     
               
                        <div class="col-md-12 form-group p_star">

                            <input type="text" class="form-control" id="nama" name="meja" value="<?= set_value('meja');?>" placeholder="No meja" required>

                           <?= form_error('meja','<small class="text-danger pl-3">','</small>');?>

                        </div>

                        <div class="col-md-12 form-group p_star">

                            <textarea class="form-control" name="catatan" id="catatan" rows="1" placeholder="Catatan contoh:rendang 1 ga pedes"></textarea>

                        </div>

                      

                 

                </div>

                <div class="col-lg-4">

                    <div class="order_box">

                        <h2>Your Order</h2>

                        <ul class="list">

                            <li><a href="#"><h4>Menu <span>Total</span></h4></a></li>

                            <?php foreach ($this->cart->contents() as $item ) { ?>

                         <li><a href="#"><?= $item['name'];?><span class="middle"><?= $item['qty'];?></span> <span class="last"><?= number_format($item['subtotal']);?></span></a></li>

                        <?php  } ?>

                           

                        </ul>
        


                        <ul class="list list_2">

                            <li><a href="#">Total<span><?= number_format($this->cart->total());?></span></a></li>

                         
                        </ul>

                      
                        

                        <?= form_error('bank','<small class="text-danger pl-3">','</small>');?>

                        <div class="text-center">



                          <button class="button button-paypal" id="bayar"  >Pesan sekarang</button>

                        </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

  </section>

  <!--================End Checkout Area =================-->

  