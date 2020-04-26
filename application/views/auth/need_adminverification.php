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
                        <h2 class="h5 text-gray-900 mb-2 text-center">Hai, <b><?= $nama." " ?></b>Silahlan cek email anda di <b><?= $email ?></b></h2>
                        <h2 class="h5 text-gray-900 mb-2 text-center">diharapkan untuk segera melakukan</h2>
                        <h2 class="h5 text-gray-900 mb-2 text-center">aktifasi untuk mengakses hak pilih anda dalam pemilu tahun ini.</h2>
                        <div class="text-center">
                            <a class="small" href="<?= base_url() ?>admin/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>