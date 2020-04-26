<!-- Tampilan cek nim -->
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
                        <form class="mt-3 user" method="post">
                            <h2 class="h5 text-gray-900 mb-4 text-center">Silahlan Masukkan NIM anda</h2>
                            <div class="text-center confirm1 alert alert-danger alert-dismissible">
                                NIM anda tidak terdaftar di database!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm2 alert alert-warning alert-dismissible">
                                NIM anda telah terdaftar sebagai pencoblos!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nim" id="nim" placeholder="NIM..." autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                            <hr>
                        </form>
                        <div class="text-center">
                            <a class="small" href="<?= base_url() ?>auth">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>