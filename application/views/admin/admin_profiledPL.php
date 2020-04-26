    <div class="row">
        <div class="col-5">
            <form id="form_profile">
                <div class="card mt-3 mb-5 ml-5" style="max-width:100% ; padding: 20px; margin:0 auto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div>
                        <div>
                            <div>
                                <h5>Detail Admin</h5>
                            </div>
                            <hr>
                            <div class="text-center confirm1 alert alert-success alert-dismissible">
                                Data berhasil di update!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="text-center confirm2 alert alert-warning alert-dismissible">
                                Password Salah!
                                <button type="button" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="username">Nama </label>
                                    <input type="text" class="form-control" value="<?= $admin[0]['nama'] ?>" id="nama" name="nama" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username </label>
                                    <input type="text" class="form-control" value="<?= $admin[0]['username'] ?>" id="username" name="username" autocomplete="off" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="username">Email </label>
                                    <input type="text" class="form-control" value="<?= $admin[0]['email'] ?>" id="email" name="email" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Password </label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                                </div>
                            </div>
                            <div>
                                <input id="update_profile" type="submit" class="btn btn-primary float-right" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.confirm1').hide();
            $('.confirm2').hide();

            $('.alert').on('click', function() {
                $('.confirm1').hide();
                $('.confirm2').hide();
            });

            // Ubah Profile Admin 
            $("#update_profile").click(function() {
                $('#form_profile').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '<?= base_url() ?>admin/update_profile',
                        method: 'post',
                        data: $('#form_profile').serialize(),
                        success: function(val) {
                            if (val == 1) {
                                $('.confirm1').show();
                                $('.confirm2').hide();
                                document.getElementById("password").value = "";
                            } else if (val == 2) {
                                $('.confirm1').hide();
                                $('.confirm2').show();
                                document.getElementById("password").value = "";
                            }
                        }
                    });
                });
            });

        });
    </script>