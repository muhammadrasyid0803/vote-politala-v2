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
                url: '<?= base_url() ?>validation/Pencoblos_NIMValidation',
                type: 'post',
                data: $('form').serialize(),
                success: function(val) {
                    $("form ")[0].reset();
                    if (val == 1) {
                        $('.confirm2').show();
                        $('.confirm1').hide();
                    } else if (val == 2) {
                        $('.confirm1').show();
                        $('.confirm2').hide();
                    } else {
                        FormPost('<?= base_url() ?>auth/registration', {
                            nim: val
                        });
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