  

	<!-- ================ start banner area ================= -->	

	<section class="blog-banner-area" id="category">

		<div class="container h-100">

			<div class="blog-banner">

				<div class="text-center">

					<h1>Pesanan Anda Akan Segera Dibuat </h1>

					<nav aria-label="breadcrumb" class="banner-breadcrumb">

            <ol class="breadcrumb">

    

            </ol>

          </nav>

				</div>

			</div>

    </div>

	</section>

	<!-- ================ end banner area ================= -->

  

  

  <!--================Tracking Box Area =================-->

  <section class="tracking_box_area section-margin--small">

      <div class="container">

          <div class="tracking_box_inner">

            <p>  <?php if($this->session->flashdata('message')){ ?>

                              <div class="alert alert-success">

                               

                                 <strong>Berhasil!</strong> 
                                 <?php echo "<br>"; ?>
                                 <?php echo $this->session->flashdata('message'); ?>
                                 <?php echo "<br>"; ?>
                                 <?php echo $this->session->flashdata('message1'); ?>

                                  

                              </div>



                          <?php }?>

                          </p>

            

              <form class="row tracking_form" action="#" method="post" novalidate="novalidate">

                  <div class="col-md-12 form-group">



                  </div>

             

              </form>

          </div>

      </div>

  </section>

  <!--================End Tracking Box Area =================-->



