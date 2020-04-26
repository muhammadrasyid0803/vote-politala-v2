    <div class="row">
        <div class="col-5">
            <form id="form_password">
                <div class="card mt-3 mb-5 ml-5" style="max-width:100% ; padding: 20px; margin:0 auto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div>
                        <div>
                            <div>
                                <h5>Ubah Password</h5>
                            </div>
                            <hr>
                            <div class="text-center confirm3 alert alert-success alert-dismissible">
                                Password berhasil diupdate!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm4 alert alert-warning alert-dismissible">
                                Gagal update password, password salah!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm5 alert alert-warning alert-dismissible">
                                Password baru tidak sama!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div>
                                <input type="hidden" class="form-control" value="<?= $admin[0]['username'] ?>" id="username" name="username" autocomplete="off" readonly>
                                <div class="form-group">
                                    <label for="username">Password Lama </label>
                                    <input type="password" class="form-control" name="old-password" id="old-password" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Password Baru </label>
                                    <input type="password" class="form-control" name="new-password" id="new-password" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Ulangi Password Baru </label>
                                    <input type="password" class="form-control" name="new-repassword" id="new-repassword" autocomplete="off" required>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary float-right" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.confirm3').hide();
            $('.confirm4').hide();
            $('.confirm5').hide();

            $('.alert').on('click', function() {

                $('.confirm3').hide();
                $('.confirm4').hide();
                $('.confirm5').hide();
            });

            // Ubah Password Admin 
            $('#form_password').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url() ?>admin/update_password',
                    method: 'post',
                    data: $('#form_password').serialize(),
                    success: function(val) {
                        if (val == 3) {
                            $('.confirm3').hide();
                            $('.confirm4').show();
                            $('.confirm5').hide();
                            document.getElementById("old-password").value = "";
                        } else if (val == 4) {
                            $('.confirm3').show();
                            $('.confirm4').hide();
                            $('.confirm5').hide();
                            document.getElementById("old-password").value = "";
                            document.getElementById("new-password").value = "";
                            document.getElementById("new-repassword").value = "";
                        } else if (val == 5) {
                            $('.confirm3').hide();
                            $('.confirm4').hide();
                            $('.confirm5').show();
                            document.getElementById("new-password").value = "";
                            document.getElementById("new-repassword").value = "";
                        }
                    }
                });

            });

        });
    </script>