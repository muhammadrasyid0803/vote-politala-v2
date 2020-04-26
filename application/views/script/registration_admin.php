<script>
    $(document).ready(function() {
        $('.confirm1').hide();
        $('.confirm2').hide();

        $('.alert').on('click', function() {
            $('.confirm1').hide();
            $('.confirm2').hide();
        });

        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>validation/Admin_DataValidation',
                type: 'post',
                data: $('form').serialize(),
                success: function(val) {
                    if (val == 1) {
                        $('.confirm1').hide();
                        $('.confirm2').show();
                    } else if (val == 2) {
                        $('.confirm1').show();
                        $('.confirm2').hide();
                    } else {
                        if ($('#password').val() == $('#repassword').val()) {
                            FormPost('<?= base_url() ?>auth/need_AdminVerification', {
                                nama: document.getElementById("nama").value,
                                username: document.getElementById("username").value,
                                email: document.getElementById("email").value,
                                password: document.getElementById("password").value
                            });
                        } else {
                            alert("Password tidak sama!");
                        }
                    }
                }
            });
        });

        function FormPost(url, data) {
            var form = document.createElement('form');
            document.body.appendChild(form);
            form.method = 'post';
            form.action = url;
            for (var name in data) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = data[name];
                form.appendChild(input);
            }
            form.submit();
        }
    });
</script>