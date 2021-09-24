

	<!-- ================ start banner area ================= -->	

	<section class="blog-banner-area" id="category">

		<div class="container h-100">

			<div class="blog-banner">

				<div class="text-center">

					<h1>List Pesanan</h1>

					<nav aria-label="breadcrumb" class="banner-breadcrumb">

            <ol class="breadcrumb">

        

            </ol>

          </nav>

				</div>

			</div>

    </div>

	</section>

	<!-- ================ end banner area ================= -->

  

  



  <!--================Cart Area =================-->

  <section class="cart_area">

      <div class="container">

          <div class="cart_inner">

              <div class="table-responsive">

                  <table id="cart" class="table table-hover table-condensed">

                      <thead>

                          <tr>

                              <th scope="col">Menu</th>

                              <th scope="col">Price</th>

                              <th scope="col">Quantity</th>

                              <th scope="col">Total</th>


                          </tr>

                      </thead>

                      <tbody>

                      <?php if($this->cart->contents() != null){ ?>

                      <form action = "<?= base_url('frontend/Cart/updatee');?>" method="POST">



                         <?php foreach ($this->cart->contents() as $item) { ?>

           

                          <input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />

                          <tr>

                              <td class="text-justify" data-th="Product">
                                <h4 class="text-justify"><?= $item['name'];?></h4>

                                  <div class="row">

                                      <div class="col-sm-6 hidden-xs">

                                          <img src="<?= base_url('assets/gambar/frontend/'.$item['gambar']);?>" alt="" width="100px" class="card-img2">

                                      </div>
                                      
                                      <div class="col-sm-6" style="padding-top: 30px;padding-bottom: 30px;">

                        

                                      </div>

                                  </div>

                              </td>

                              <td data-th="Price">
                                <div class="product_count" class="product_count">
                                     
                                     <h5><?= number_format($item['price']);?></h5>

                                  </div>


                              </td>

                              <td class="text-left" data-th="Quantity">

                                  <div class="product_count">
                                  	 <!-- <button class="gray_btn" href="<?= base_url('frontend/Cart/updatee');?>">Hapus Pesanan</button> -->
                                     <input type="text" name="cart[<?php echo $item['id'];?>][qty]" value="<?= $item['qty'];?>">
                                     <!-- <input type="button" value="+" id="tambahqty"/> -->
                                    <!--  <button name='incqty'>+</button>
       								 <button name='decqty'>-</button> -->

                                  </div>

                              </td>

                              <td class="text-left" data-th="Subtotal" id="sub_total_produk">
                                <div class="product_count" class="product_count">
                                     
                                     <h5><?= number_format($item['subtotal']);?></h5>

                                  </div>


                              </td>
                           <td>
                              	<!-- <button class="btn btn-danger" href="<?= base_url('frontend/models/Frontend_model/delete');?>">Hapus Pesanan</button> -->
							  </td>

                          </tr>

                            <?php } ?>

                            <?php }else{



                              echo"<tr><td><td>Tidak ada barang</td></td></tr>";



                            } ?>

                          <tr class="bottom_button">

                              <td colspan="6">

                                  <button class="btn btn-success" id="baruicart" href="<?= base_url('frontend/Cart/updatee');?>">Perbarui Pesanan</button>

                                  </form>

                                  <button class="btn btn-danger" id="deletecart" >Kosongkan Pesanan</button>

                              </td>

                            

                          </tr>

                  

                          <tr>

                              
<td class="hide_this"></td>
<td class="hide_this"></td>
                              <td class="text-total">

                                  <h5>Subtotal</h5>


                              </td>
<td class="text-total"> <h5><?= number_format($this->cart->total());?></h5></td>

                            

                                 
                              </tr>

                          <tr class="out_button_area">

                              <td class="hide_this">



                              </td>

                              <td class="hide_this">



                              </td>

                              <td class="hide_this">



                              </td>

                              <td>

                                  <div class="checkout_btn_inner d-flex align-items-center">

                                      <a class="gray_btn" id="lanjut" href="<?= base_url('list-produk');?>">Lanjut memesan</a>

                                      <button class="primary-btn ml-2" id="cekout" value="<?= $this->cart->total();?>" >Pesan</button>

                                     

                                  </div>

                              </td>
                              
                              <td class="hide_this"></td>

                          </tr>

                      </tbody>

                  </table>

              </div>

          </div>

      </div>

  </section>

  <!--================End Cart Area =================-->

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

$(document).on('click','#deletecart',function(){

  var hapus = confirm("Apakah yakin ingin kosongkan cart ?");

  if (hapus)

  {

    $.ajax({

                url : "<?php echo base_url();?>frontend/Cart/remove",

                type : "GET",

                

                success: function(data){

                    $('#loadz').html(data);

                    alert("berhasil");

                    location.reload(); 

                }

          });

  }



});

// $(document).on('click','#hapusmenu',function(){

//   var hapusmenu = confirm("Apakah yakin ingin menghapus pesanan ini cart ?");

//   if (hapusmenu)

//   {

//     $.ajax({

//                 url : "<?php echo base_url();?>frontend/Cart/hapus",

//                 type : "GET",

                

//                 success: function(data){

//                     $('#loadz').html(data);

//                     alert("berhasil");

//                     location.reload(); 

//                 }

//           });
// }



// });

// $(document).on("click", "#tambahqty", function () {

//   var quantity     = 0;
//   quantity = +1;

//     $.ajax({


//                 type : "POST",

//                 data : {qty: jumlah },

//                 success: function(data){

//                 $('#loadz').html(data);

//                     alert("berhasil");

//                     location.reload(); 

//                 }

//             });

//     }

            



//    });



$(document).on('click','#cekout',function(){

    var cekout = $('#cekout').val();

    if(cekout === '0')

    {

      alert("Tidak Ada Barang");

    }else

    {

      $(location).attr('href','<?= base_url("frontend/Cart/cekout");?>');

    }





  });

</script>