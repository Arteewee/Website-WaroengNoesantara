   <!-- Main Content -->
   <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kategori Menu</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item">Kategori</div>
            </div>
         
          </div>

          <div class="section-body">
           <?php if($this->session->flashdata('message')){ ?>
                              <div class="alert alert-success">
                               
                                 <strong>Berhasil!</strong> <?php echo $this->session->flashdata('message'); ?>
                                  
                              </div>

                          <?php }?>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a class="btn btn-success" href="<?= base_url('dashboard/tambah-kategori');?>">Tambah kategori</a>
                    
                
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="datatable">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama Kategori</th>
                            <th>Gambar</th>
                            <th>Dekripsi</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
              
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
     </section>
    </div>
    
<script type="text/javascript">
    $(document).ready(function(){
      tampil();   
    });
    function tampil()
    {
          $('#datatable').DataTable({ 
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "language": 
                    {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang cocok",
                    "info": "Menampilkan _START_ sampai _END_  dari _MAX_ data",
                    "infoEmpty": "Data tidak ditemukan",
                    "infoFiltered": "(Terfilter _END_ data dari _MAX_ total data)"
                    },
                "responsive": true,
                "destroy" : true,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": 
                {
                    "url": "<?php echo base_url('dashboard/Kategori/get_data')?>",
                    "type": "POST",
                    "data" : {'csrf_test_name': $('input[name=csrf_test_name]').val()},
                    "data" : function(data){
                      data.csrf_test_name =  $('input[name=csrf_test_name]').val();
                    },
                    "dataSrc": function(response){
                      $('input[name=csrf_test_name]').val(response.csrf_test_name);
                      return response.data;
                    }
                },
           
                //Set column definition initialisation properties.
                "columnDefs": 
                [
                    { 
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                    },
                ],

                });
      }      
    
      function reload_table()
    {
      var table =  $('#datatable').DataTable({ 
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "language": 
                    {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang cocok",
                    "info": "Menampilkan _START_ sampai _END_  dari _MAX_ data",
                    "infoEmpty": "Data tidak ditemukan",
                    "infoFiltered": "(Terfilter _END_ data dari _MAX_ total data)"
                    },
                "responsive": true,
                "destroy" : true,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": 
                {
                    "url": "<?php echo base_url('dashboard/Kategori/get_data')?>",
                    "type": "POST",
                    "data" : {'csrf_test_name': $('input[name=csrf_test_name]').val()},
                    "data" : function(data){
                      data.csrf_test_name =  $('input[name=csrf_test_name]').val();
                    },
                    "dataSrc": function(response){
                      $('input[name=csrf_test_name]').val(response.csrf_test_name);
                      return response.data;
                    }
                },
           
                //Set column definition initialisation properties.
                "columnDefs": 
                [
                    { 
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                    },
                ],

                });
      
      table.ajax.reload(null,false);
      //reload datatable ajax 
    } 
    
    function hapus(id)
    {
      
      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Akan haps data ini",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
      }).then((result) =>
      {
        if (result.value) 
          {
              $.ajax({
                
                    url: "<?php echo base_url('dashboard/Kategori/hapus/')?>"+id,
                    type: "post",
                    dataType: "JSON",
                    data : {'csrf_test_name': $('input[name=csrf_test_name]').val()},  
                    success: function(result) {

                      $('input[name=csrf_test_name]').val(result.token);
                      reload_table();
                      Swal.fire(
                      'Terhapus',
                      'Data telah di hapus !',
                      'success'
                      )
                          
                     }
                     
           
            });
              
          }
      })
   }
  
</script>