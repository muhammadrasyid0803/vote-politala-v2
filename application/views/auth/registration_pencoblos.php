<!-- Form kelengkapan data pencoblos -->
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
                        <div class="text-center confirm1 alert alert-danger alert-dismissible">
                            Email telah dipakai!
                            <button type="button" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="text-center confirm2 alert alert-warning alert-dismissible">
                            Password tidak sama!
                            <button type="button" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="mt-3 user" method="post">
                            <input type="hidden" id="nim" name="nim" value="<?= $pencoblos[0]['nim'] ?>">
                            <input type="hidden" id="nama" name="nama" value="<?= $pencoblos[0]['nama'] ?>">
                            <input type="hidden" id="angkatan" name="angkatan" value="<?= $pencoblos[0]['angkatan'] ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="NIM            : <?= $pencoblos[0]['nim'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="Nama          : <?= $pencoblos[0]['nama'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mb-0 mb-sm-0">
                                    <div class="form-group">
                                        <select id="jurusan" name="jurusan" class="custom-select" required>
                                            <option selected disabled>Program Studi</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Sistem Komputer">Sistem Komputer</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Diploma Komputer">Diploma Komputer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="Angkatan      : <?= $pencoblos[0]['angkatan'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email..." autocomplete="off" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password..." required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="repassword" id="repassword" placeholder="Re-Password..." required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url() ?>auth">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>