<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>validation/admin_CodeVerification',
                type: 'post',
                dataType: "json",
                data: $('form').serialize(),
                success: function(val) {
                    $("form ")[0].reset();
                    if (val == 0) {
                        window.location = "http://localhost/vote/admin/login";
                    } else {
                        alert("Kode akses salah!");
                    }
                }
            });
        });
    });
</script>