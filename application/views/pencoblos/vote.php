<!-- Modal Popup video-->
<div class="modal-video modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin: 0 auto !important; left:-80px; top: 80px">
        <div class="modal-content" style="width: 680px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dokumentasi Pemilihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="video" class="videoInsert" style="width: 640px; height: 360px; background-color:#333; margin : 0 auto">
                    <video width="640px" height="360px" controls autoplay loop>
                        <!-- Link video di sini -->
                        <source src="<?= base_url() . $video[0]['src'] . $video[0]['file'] ?>" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-video btn btn-danger" data-dismiss="modal">Skip</button>
            </div>
        </div>
    </div>
</div>
<div class="text-center">

    <style type="text/css">
       
        div.#time{
         
          color:#000000;
          font-size:20px;
          text-align:center;
        }


    </style>

    <div style="color:#000000;font-size:20px;text-align:center;">Waktu Voting  <span id="timer"></span></div>
    <h1 class="h1 text-gray-900 mb-0 mt-4 text-center"><b>Daftar Pasangan Calon</b></h1>
    <h1 class="h4 text-gray-900 mb-0 text-center">Presiden dan Wakil Presiden Politeknik Negeri Tanah Laut</h1>
    <?php if ($pemilih[0]['paslon_pilihan'] != 0) { ?>
        <div class="btn btn-danger mt-3 mb-2">
            <h1 class="h4 text-light mb-0 text-center">Anda Telah Menggunakan Hak Pilih</h1>
        </div>
    <?php } ?>

</div>
<div class="mt-3" style="width: 70%; margin:0 auto">
    <hr>
</div>

<!-- Slide List Paslon -->
<div class="list-paslon" style="width: 70%; height:650px;margin:0 auto">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php if (sizeof($paslon) > 0) { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php for ($i = 1; $i < (sizeof($paslon)); $i++) { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                <?php } ?>
            <?php } else { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" style="height:650px !important; width: 100% !important; margin:0 auto;">

            <?php if (sizeof($paslon) > 0) { ?>
                <div class="carousel-item active">
                    <div class="row mb-5" style="height: 450px;">
                        <div class="col-4" style="height:100%; background-image:url('<?= base_url() .'assets/voting_assets/image/paslon/'. $paslon[0]['foto'] ?>'); background-size:cover"></div>
                        <div class="col-8" style="height:100%; padding:30px">
                            <table>
                                <tr>
                                    <td><b>Calon Presiden Mahasiswa</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $presma[0]['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td><?= $presma[0]['nim'] ?></td>
                                </tr>
                                <tr>
                                    <td>Prodi</td>
                                    <td>:</td>
                                    <td><?= $presma[0]['jurusan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Angkatan</td>
                                    <td>:</td>
                                    <td><?= $presma[0]['angkatan'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Calon Wakil Presiden Mahasiswa</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Wapresma</td>
                                    <td>:</td>
                                    <td><?= $wapresma[0]['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td><?= $wapresma[0]['nim'] ?></td>
                                </tr>
                                <tr>
                                    <td>Prodi</td>
                                    <td>:</td>
                                    <td><?= $wapresma[0]['jurusan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Angkatan</td>
                                    <td>:</td>
                                    <td><?= $wapresma[0]['angkatan'] ?></td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <?php if ($pemilih[0]['paslon_pilihan'] == 0) { ?>
                                    <button type="button" id="btn_vote_disable" class="vote btn btn-success" data-toggle="modal" data-target="#Ask<?= $paslon[0]['no_urut'] ?>" style="font-size: 30px !important">Vote</button>
                                <?php } else { ?>
                                    <button type="button" id="btn_vote_disable" class="vote btn btn-secondary" data-toggle="modal" style="font-size: 30px !important">Vote</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php for ($i = 1; $i < (sizeof($paslon)); $i++) { ?>
                    <div class="carousel-item">

                        <div class="row mb-5" style="height: 450px;">
                            <div class="col-4" style="height:100%; background-image:url('<?= base_url() .'assets/voting_assets/image/paslon/'. $paslon[$i]['foto'] ?>'); background-size:cover"></div>
                            <div class="col-8" style="height:100%; padding:30px">
                                <table>
                                    <tr>
                                        <td><b>Calon Presiden Mahasiswa</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $presma[$i]['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td>:</td>
                                        <td><?= $presma[$i]['nim'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prodi</td>
                                        <td>:</td>
                                        <td><?= $presma[$i]['jurusan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td>:</td>
                                        <td><?= $presma[$i]['angkatan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Calon Wakil Presiden Mahasiswa</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Wapresma</td>
                                        <td>:</td>
                                        <td><?= $wapresma[$i]['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td>:</td>
                                        <td><?= $wapresma[$i]['nim'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prodi</td>
                                        <td>:</td>
                                        <td><?= $wapresma[$i]['jurusan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td>:</td>
                                        <td><?= $wapresma[$i]['angkatan'] ?></td>
                                    </tr>
                                </table>
                                <div class="des h5 mt-4">
                                    <?php if ($pemilih[0]['paslon_pilihan'] == 0) { ?>
                                        <button type="button" id="btn_vote_disable" class="vote btn btn-success" data-toggle="modal" data-target="#Ask<?= $paslon[$i]['no_urut'] ?>" style="font-size: 30px !important">Vote</button>
                                    <?php } else { ?>
                                        <button type="button" id="btn_vote_disable" class="vote btn btn-secondary" data-toggle="modal" style="font-size: 30px !important">Vote</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url() . "assets/image/no-image.jpg" ?>">
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div id="confirm_alert" class="confirm_alert">
    <?php if (sizeof($paslon) > 0) { ?>
        <?php for ($i = 0; $i < sizeof($paslon); $i++) { ?>
            <!-- Modal -->
            <div class="modal fade" id="Ask<?= $paslon[$i]['no_urut'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin untuk memilih pasangan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                            <button id="confirm<?= $paslon[$i]['no_urut'] ?>" type="button" class="ca btn btn-success" data-vote="<?= $paslon[$i]['no_urut'] ?>">Iya</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<script type="text/javascript">

    

       function get_time(){
              $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('Admin/tampil_data_rules') ;?>',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<strong>'+
                         '<p id="tes" style="color:red;">'+data[i].start_time+ ' Sampai ' +data[i].end_time+'</p>'+                       
                            '</strong>';                          
                }
                $('#timer').html(html);
               
            }
        });
        }

    

        // document.getElementById('timer').innerHTML =
        //   01 + ":" + 00;
          
        startTimer();
        function startTimer() {
          var presentTime = document.getElementById('timer').innerHTML;
          var timeArray = presentTime.split(/[:]+/);
          var m = timeArray[0];
          // var n = get_time();
          var s = checkSecond((timeArray[1] - 1));
          if(s==59){m=m-1}
           if(m<0){
            alert('Waktu Voting Habis');
              document.getElementById("btn_vote_disable").disabled = true;  

       }
          document.getElementById('timer').innerHTML =
            m + ":" + s;
            
          setTimeout(startTimer, 1000);
          get_time();
        }
        function checkSecond(sec) {
          if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
          if (sec < 0) {sec = "59"};
          return sec;
        }


      
    


        


</script>