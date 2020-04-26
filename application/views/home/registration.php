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

                        <!-- Form untuk validasi nim paslon -->
                        <form class="mt-3 user" method="post">
                            <h2 class="h5 text-gray-900 mb-4 text-center">Silahlan Masukkan NIM Calon Presma dan Wapresma</h2>
                            <div class="text-center confirm1 alert alert-danger alert-dismissible">
                                NIM Presma tidak terdaftar di database!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm2 alert alert-danger alert-dismissible">
                                NIM Wapresma tidak terdaftar di database!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm3 alert alert-warning alert-dismissible">
                                NIM Presma telah terdaftar sebagai paslon!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm4 alert alert-warning alert-dismissible">
                                NIM Wapresma telah terdaftar sebagai paslon!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nim-presma" id="nim-presma" placeholder="NIM Presma..." autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nim-wapresma" id="nim-wapresma" placeholder="NIM Wapresma..." autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>