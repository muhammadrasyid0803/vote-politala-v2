    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-check"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <div class="user-img"></div>
                            </div>
                            <h2 class="h5 text-gray-900 mb-2 text-center">Selamat email anda : <b><?= $pencoblos[0]['email'] ?></b></h2>
                            <h2 class="h5 text-gray-900 mb-2 text-center">sudah di aktifasi, silahkan login</h2>
                            <h2 class="h5 text-gray-900 mb-2 text-center">untuk mengakses hak pilih anda dalam pemilu tahun ini.</h2>
                            <hr>
                            <a href="<?= base_url()?>auth">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>