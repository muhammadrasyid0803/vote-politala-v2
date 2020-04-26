<!-- Tampilan halaman login Admin -->
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
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
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                </div>
                                <div class="text-center confirm1 alert alert-warning alert-dismissible">
                                    Akun anda belum di aktivasi!
                                    <button type="button" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="text-center confirm2 alert alert-danger alert-dismissible">
                                    Password Salah!
                                    <button type="button" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="text-center confirm3 alert alert-danger alert-dismissible">
                                    Anda Belum Mendaftar
                                    <button type="button" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Username..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password..." required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url() ?>admin/registration">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>