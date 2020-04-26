<script>
    $(document).ready(function() {
        $('.confirm1').hide();
        $('.confirm2').hide();
        $('.confirm3').hide();
        $('.confirm4').hide();
        $('.alert').on('click', function() {
            $('.confirm1').hide();
            $('.confirm2').hide();
            $('.confirm3').hide();
            $('.confirm4').hide();
        });
        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>validation/Paslon_NIMValidation',
                type: 'post',
                data: $('form').serialize(),
                success: function(val) {
                    if (val == 1) {
                        $('.confirm1').show();
                        $('.confirm2').hide();
                        $('.confirm3').hide();
                        $('.confirm4').hide();

                    } else if (val == 2) {
                        $('.confirm1').hide();
                        $('.confirm2').show();
                        $('.confirm3').hide();
                        $('.confirm4').hide();
                    } else if (val == 3) {
                        $('.confirm1').hide();
                        $('.confirm2').hide();
                        $('.confirm3').show();
                        $('.confirm4').hide();
                    } else if (val == 4) {
                        $('.confirm1').hide();
                        $('.confirm2').hide();
                        $('.confirm3').hide();
                        $('.confirm4').show();
                    } else {
                        FormPost('<?= base_url() ?>paslon/Data_Validation', {
                            nim_presma: document.getElementById("nim-presma").value,
                            nim_wapresma: document.getElementById("nim-wapresma").value
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