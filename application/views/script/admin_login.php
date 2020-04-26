<script>
    $(document).ready(function() {
        $('.confirm1').hide();
        $('.confirm2').hide();
        $('.confirm3').hide();

        $('.alert').on('click', function() {
            $('.confirm1').hide();
            $('.confirm2').hide();
            $('.confirm3').hide();
        });

        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>auth/auth_AdminLogin',
                type: 'post',
                dataType: "json",
                data: $('form').serialize(),
                success: function(val) {
                    if (val == 1) {
                        $('.confirm1').show();
                        $('.confirm2').hide();
                        $('.confirm3').hide();
                    } else if (val == 2) {
                        $('.confirm1').hide();
                        $('.confirm2').show();
                        $('.confirm3').hide();

                    } else if (val == 3) {
                        $('.confirm1').hide();
                        $('.confirm2').hide();
                        $('.confirm3').show();

                    } else {
                        window.location = "http://localhost/vote/admin/dashboard";
                    }
                }
            });
        });
    });
</script>