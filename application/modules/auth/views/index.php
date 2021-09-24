<body>

  <div id="app">

    <section class="section">

      <div class="container mt-5">

        <div class="row">

          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="login-brand">

              <!-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
               <img width="200" height="200" class="img-fluid"  src="<?= base_url('assets/gambar/frontend/warnusasli1.png');?>" alt="">
               <h1>Waroeng Noesantara</h1>

            </div>



            <div class="card card-primary ">

              <div class="card-header"><h4>Login</h4></div>



              <div class="card-body">

                <form method="POST" action="<?= base_url('auth/Auth/login');?>" class="needs-validation" novalidate="">

                  <div class="form-group">

                    <label for="email">Username</label>

                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>

                    <div class="invalid-feedback">

                      Harap Masukan Username anda

                    </div>

                  </div>



                  <div class="form-group">

                    <div class="d-block">

                    	<label for="password" class="control-label">Password</label>

                      

                    </div>

                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>

                    <div class="invalid-feedback">

                      Harap Masukan Password

                    </div>

                  </div>

                   <?= $this->session->flashdata('message');?> 



                  <div class="form-group">

                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">

                      Login

                    </button>
                    <!-- <br>
                    <p>Tidak Mempunyai Akun? <a href="<?= base_url('auth/Auth/register');?>">Buat Akun</a>.</p>
 -->
                  </div>


                </form>



              </div>

            </div>

            

            <div class="simple-footer">

              Copyright &copy; 2021 Design By RestoTech 

            </div>

          </div>

        </div>

      </div>

    </section>

  </div>

