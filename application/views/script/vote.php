  <script>
      $(document).ready(function() {
          var pencoblos = <?= $status_hak_pilih; ?>;
          var src = $('#video').children('video').attr('src');

          $('.close-video').click(function(e) {
              e.preventDefault();
              $('#video').children('video').attr('src', '');
          });
          if (pencoblos[0]['paslon_pilihan'] == 0) {
              $('.modal-video').modal('show');
          } else {
              $('#video').children('video').attr('src', '');
          }


          $('.close').click(function(e) {
              e.preventDefault();
              $('#video').children('video').attr('src', '');
          });

          var btnContainer = document.getElementById("confirm_alert");
          var btns = btnContainer.getElementsByClassName("ca");
          for (var i = 0; i < btns.length; i++) {
              btns[i].addEventListener("click", function() {
                  var vote_value = $(this).data('vote');
                  //   console.log(vote_value);
                  FormPost('<?= base_url() ?>vote', {
                      no_urut: vote_value
                  });
              });
          }

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