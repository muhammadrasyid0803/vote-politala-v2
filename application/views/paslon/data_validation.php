<!-- Halaman untuk melengkapi data paslon -->
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <form action="" class="user" id="form_daftar">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <div class="user-img mb-3"></div>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Data Presma</h1>
                            </div>
                            <input type="hidden" id="nim_presma" name="nim_presma" value="<?= $presma[0]['nim'] ?>">
                            <input type="hidden" id="nama_presma" name="nama_presma" value="<?= $presma[0]['nama'] ?>">
                            <input type="hidden" id="angkatan_presma" name="angkatan_presma" value="<?= $presma[0]['angkatan'] ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="NIM            : <?= $presma[0]['nim'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="Nama          : <?= $presma[0]['nama'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mb-0 mb-sm-0">
                                    <div class="form-group">
                                        <select id="jurusan_presma" name="jurusan_presma" class="custom-select" required>
                                            <option selected disabled>Program Studi</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Sistem Komputer">Sistem Komputer</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Diploma Komputer">Diploma Komputer</option>
                                            <option value="Mesin Otomotif" >Mesin Otomotif</option>
                                            <option value="Teknologi Industri Pertanian" >Teknologi Industri Pertanian</option>
                                            <option value="Akuntansi" >Akuntansi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="Angkatan      : <?= $presma[0]['angkatan'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email_presma" id="email_presma" placeholder="Email..." autocomplete="off" required="">
                                 <span id="email_result"></span>
                            </div>
                              <div class="form-group ">
                              <label for="#file_paslon" class="control-label col-lg-6">Foto Paslon</label>
                              <div class="col-lg-8">
                                <input class=" form-control" accept="image/*" capture="camera" id="file_paslon" name="file_paslon" type="file"  />
                              </div>
                              
                            </div>
                            <div class="form-group ">
                              <label for="#file_visi" class="control-label col-lg-6">Visi</label>
                              <div class="col-lg-8">
                                <input class=" form-control" id="file_visi" name="file_visi" type="file"  accept="image/*" capture="camera"/>
                              </div>
                              
                            </div>
                            <div class="form-group ">
                              <label for="#file_misi" class="control-label col-lg-6">Misi</label>
                              <div class="col-lg-8">
                                <input class=" form-control" id="file_misi" name="file_misi" type="file" accept="image/*" capture="camera" />
                              </div>
                              
                            </div>
                            <label for="#file_presma">Berkas Transkrip Nilai Presma</label>
                            <input type="file" name="file_presma" id="file_presma" accept="image/*" capture="camera">
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <div class="user-img mb-3"></div>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Data Wapresma</h1>
                            </div>
                            <input type="hidden" id="nim_wapresma" name="nim_wapresma" value="<?= $wapresma[0]['nim'] ?>">
                            <input type="hidden" id="nama_wapresma" name="nama_wapresma" value="<?= $wapresma[0]['nama'] ?>">
                            <input type="hidden" id="angkatan_wapresma" name="angkatan_wapresma" value="<?= $wapresma[0]['angkatan'] ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="NIM            : <?= $wapresma[0]['nim'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="Nama          : <?= $wapresma[0]['nama'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mb-0 mb-sm-0">
                                    <div class="form-group">
                                        <select id="jurusan_wapresma" name="jurusan_wapresma" class="custom-select" required>
                                             <option selected disabled>Program Studi</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Sistem Komputer">Sistem Komputer</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Diploma Komputer">Diploma Komputer</option>
                                            <option value="Mesin Otomotif" >Mesin Otomotif</option>
                                            <option value="Teknologi Industri Pertanian" >Teknologi Industri Pertanian</option>
                                             <option value="Akuntansi" >Akuntansi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" value="Angkatan      : <?= $wapresma[0]['angkatan'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email_wapresma" id="email_wapresma" placeholder="Email..." autocomplete="off" required="">
                                 <span id="email_result2"></span>
                            </div>
                          
                            <label for="#file_presma">Berkas Transkrip Nilai Wapresma</label>
                            <input type="file" name="file_wapresma" id="file_wapresma" accept="image/*" capture="camera">
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center confirm1 alert alert-danger alert-dismissible">
                            Email Presma telah dipakai!
                            <button type="button" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="text-center confirm2 alert alert-danger alert-dismissible">
                            Email Wapresma telah dipakai!
                            <button type="button" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                    <div class="col-12" style="margin:0 auto; height:50px">
                        <button type="submit" class="btn btn-primary" id="sub_button"  style="height:100%;width: 100%; border-radius:0px !important">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


