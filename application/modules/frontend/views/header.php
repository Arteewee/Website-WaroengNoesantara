<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.02">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Waroeng Noesantara</title>
	<link rel="icon" href="<?=base_url('assets/gambar/frontend/warnusasli1.png');?> " type="image/png"  sizes="16x16 32x32 64x64">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendors/owl-carousel/owl.carousel.min.css">
  <script type="text/javascript" src = "<?= base_url('assets/jquery/jquery.min.js');?>"></script>
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/style.css">
</head>
<style>
#mobile_cart{
    display:none;
}
/*Inline mobile*/
@media screen and (max-width:1030px) {
    
}

@media screen and (max-width:600px) {
    body{
        overflow: scroll;
        -webkit-overflow-scrolling: touch;
    }
    /*Slider*/
    .d-none {
        display: block !important;
    }
   .hero-banner::before{
       width:150px;
   }
   .hero-banner__img{
        width:100px;
   }
   .hero-banner__content {
        float: right;
        padding-top:60px;
    }
    #slider_caption{
       float: right !important;
    width: 170px;
    }
    .hero-banner__content h4 {
    font-size: 18px;
    }
    /* Cart Icon */
    .header_area .navbar .nav-shop {
        display:none;
    }
    #mobile_cart{
        display: block;
        float: left;
        position: static;
        padding-bottom: 0px !important;
        width: 72px;
        margin-top: 25px;
    }
    
    #loadz2.nav-shop li button .nav-shop__circle {
        font-size: 9px;
        display: inline-block;
        background: #384aeb;
        color: #fff;
        padding: 0px 5px;
        border-radius: 50%;
        position: absolute;
        top: -8px;
        right: -12px;
    }
    
    /* normalize img */
    .card-img {
        height: auto;
    }
    .card-img2{
        width:100% !important;
    }
    
    /* Cart Page */
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
	td#sub_total_produk{
	    text-align:right;
	}
	
	td.text-total{
	    text-align:center;
	}
	
	#hapusmenu{
	        float: right;
            margin-bottom: 10px;
	}
	.cart_inner .table tbody tr.bottom_button td:last-child {
        width: 100% !important;
    }
	#baruicart{
	    width:100%;
	   margin-bottom:10px;
	}
	#deletecart{
	    width:100%;
	}
	td.hide_this{
	    display:none !important;
	}
	#cekout{
	    width:50%;
	}
	#lanjut{
	    padding: 0px 0px;
         text-align: center;
         width:50%;
	}
	.cart_inner .table tbody tr.out_button_area .checkout_btn_inner {
        margin-left: 0px !important;
    }
}

</style>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="<?= base_url('');?>"><img src="<?=base_url('assets/gambar/frontend/warnusasli1.png');?>" width="120" alt=""></a>
          <div class="mobile_header_wrap">
          <ul class="nav-shop" id="mobile_cart">
              <li class="nav-item"><button id="belanja"><i class="ti-shopping-cart"></i><span id="loadz2" class="nav-shop__circle"></span></button> </li>
            </ul>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          </div>
           
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item <?php if($this->uri->segment('1')=== 'Home'){ echo "active";}?>"><a class="nav-link" href="<?= base_url('');?>">Home</a></li>
              <li class="nav-item <?php if($this->uri->segment('1')=== 'Home'){ echo "active";}?>"><a class="nav-link" href="<?= base_url('list-produk');?>">Menu</a></li>
              <li class="nav-item <?php if($this->uri->segment('1')=== 'Home'){ echo "active";}?>"><a class="nav-link" href="<?= base_url('frontend/Home/helps');?>">help</a></li>
                
          
           
						
            </ul>

            <ul class="nav-shop">
            
              <li class="nav-item"><button id="belanja"><i class="ti-shopping-cart"></i><span id="loadz" class="nav-shop__circle"></span></button> </li>
          
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
