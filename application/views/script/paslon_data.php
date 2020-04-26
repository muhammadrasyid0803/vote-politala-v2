<script>
    $(document).ready(function() {
         $("#email_presma").keyup((function (e) {
        var email = $('#email_presma').val();
        
        if(email != ''){
          $.ajax({
          url: "<?php echo base_url(); ?>validation/cekEmail",
          method: "POST",
          data: {email:email},
          success: function(response){
            if (response == 'taken') {
              $('#email_result').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> Email Sudah Ada</span></label>');
              $('#sub_button').attr("disabled", true);
            } 
            else if (response == 'not_taken') {
              $('#email_result').html('<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email Tersedia</span></label>');
              $('#sub_button').attr("disabled", false);
            }
          }
          });
        }
        else{
          $('#email_result').html('');
        }
      }));

         $("#email_wapresma").keyup((function (e) {
        var email = $('#email_wapresma').val();
        
        if(email != ''){
          $.ajax({
          url: "<?php echo base_url(); ?>validation/cekEmail2",
          method: "POST",
          data: {email:email},
          success: function(response){
            if (response == 'taken') {
              $('#email_result2').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> Email Sudah Ada</span></label>');
              $('#sub_button').attr("disabled", true);
            } 
            else if (response == 'not_taken') {
              $('#email_result2').html('<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email Tersedia</span></label>');
              $('#sub_button').attr("disabled", false);
            }
          }
          });
        }
        else{
          $('#email_result2').html('');
        }
      }));





        $('.confirm1').hide();
        $('.confirm2').hide();
        $('.alert').on('click', function() {
            $('.confirm1').hide();
            $('.confirm2').hide();
        });
        $('form').submit(function(e) {
            e.preventDefault();
             var url;            
              url = '<?php echo site_url('paslon/Insert_Data') ;?>';
              var formData = new FormData($('#form_daftar')[0]);
            $.ajax({
               url : url,
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  dataType: "JSON",
                  success: function(data) {                     
                    window.location.href = '<?php echo base_url('home/registration') ;?>';
                    
                  }
            });
        });

       
    });
</script>