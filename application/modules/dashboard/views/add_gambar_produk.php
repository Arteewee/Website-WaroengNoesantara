   <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Menu</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>

              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/produk');?>">Menu</a></div>

              <div class="breadcrumb-item">Tambah Gambar Menu</div>

            </div>

          </div>



          <div class="section-body">

           



            <div class="row">

              <div class="col-11">

                <div class="card">

                  <div class="card-header">

                    <h4>Tambah Gambar Menu</h4>

                  </div>

                  <div class="card-body">

                    <div class="row">

                        <dic class ="col-12">

                          <form action = "<?= base_url('dashboard/gambar_produk1');?>" method="post" enctype="multipart/form-data">

                               <input type="file" id="pro-image" name="gambar[]" class="form-control" multiple="multiple">



                                <fieldset class="form-group">

                                  

                              

                                </fieldset>

                        <div class="preview-images-zone">



                        </div>

                          <input type="hidden" name ="id_produk" value="<?= $this->uri->segment(3);?>">

                       <br> 

                        <button class="btn btn-primary">Tambah</button>

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



<script>

$(document).ready(function() {



    document.getElementById('pro-image').addEventListener('change', readImage);

    

    $( ".preview-images-zone" ).sortable();

    

    $(document).on('click', '.image-cancel', function() {

      

        let no = $(this).data('no');

        $(".preview-image.preview-show-"+no).remove();

    });

});







var num = 4;

function readImage() {

    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object

        var output = $(".preview-images-zone");



        for (let i = 0; i < files.length; i++) {

            var file = files[i];

            if (!file.type.match('image')) continue;

            

            var picReader = new FileReader();

            

            picReader.addEventListener('load', function (event) {

                var picFile = event.target;

                var html =  '<div class="preview-image preview-show-' + num + '">' +

                            '<div class="image-cancel" data-no="' + num + '">x</div>' +

                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +

                            

                            '</div>';



                output.append(html);

                num = num + 1;

            });



            picReader.readAsDataURL(file);

        }

    $(".preview-images-zone").html("");    

    } else {

        console.log('Browser not support');

    }

}



</script>