<div class="container" style="padding: 1px" >
    <style>
        table.dataTable {
            margin-bottom: 2em !important;
        }
    </style>
                <div class="btn btn-success" data-target="#modal_tambah" data-toggle="modal">
                        <i class="fas fa-plus"></i>
                            Tambah KPUM
                        </div>
                        <br>
    <table id="tabel-kpum" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun</th>
             <!--    <th>Struktur Kepengurusan</th> -->
            <!--     <th>Visi</th>
                <th>Misi</th> -->
               <th>Edit or Delete</th>

            </tr>
        </thead>
        <tbody id="show_data_kpum">
         
        </tbody>
    </table>
</div>





 <!-- Modal tmbh -->
              <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h4 class="modal-title" id="myModalLabel">Tambah KPUM</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_data_kpum" action="#" class="cmxform form-horizontal style-form">

                       
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Tahun</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtTahun" placeholder="Description" minlength="2" type="number" required />
                          </div>
                        </div>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Struktur Kepengurusan</label>
                          <div class="col-lg-8">
                            <input type="file" accept="image/*" name="foto_1"  capture="camera">
                          </div>
                        </div>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-3">Visi</label>
                          <div class="col-lg-8">
                             <input type="file" accept="image/*" name="foto_2"  capture="camera">
                          </div>
                        </div>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-3">Misi</label>
                          <div class="col-lg-8">
                             <input type="file" accept="image/*" name="foto_3"  capture="camera">
                          </div>
                        </div>
                        <br>
                         <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-3">Dokumentasi</label>
                          <div class="col-lg-8">
                             <input type="file" accept="image/*" name="foto_4" multiple capture="camera">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="simpan_data_kpum()">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

          <!-- Modal Edit -->
           <div class="modal fade" id="modal_edit_kpum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h4 class="modal-title" id="myModalLabel">Edit KPUM</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_edit_kpum" action="#" class="form-horizontal">
                      
                        <div class="form-group ">
                          <input type="hidden" name="txtId" value="" />
                          
                          <label for="cemail" class="control-label col-lg-6">Tahun</label>
                          <div class="col-lg-8">
                            <input class=" form-control " name="txtTahun" id="txtTahun"  type="number" required />
                              <span class="pesan pesan-txtTahun">Silahkan Isi Kolom </span>
                          </div>
                        </div>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Struktur Kepengurusan</label>
                          <div class="col-lg-8">
                            <input type="file" accept="image/*" name="foto_1" id="foto_1"  capture="camera">
                          </div>
                        </div>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-3">Visi</label>
                          <div class="col-lg-8">
                             <input type="file" accept="image/*" name="foto_2" id="foto_2"  capture="camera">
                          </div>
                        </div>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-3">Misi</label>
                          <div class="col-lg-8">
                             <input type="file" accept="image/*" name="foto_3" id="foto_3"  capture="camera">
                          </div>
                        </div>
                        <br>
                          <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-3">Dokumentasi</label>
                          <div class="col-lg-8">
                             <input type="file" accept="image/*" name="foto_4" multiple capture="camera">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="simpan_edit_kpum()">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

          <!-- MOdal detail -->
           <div class="modal fade" id="detail_kpum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                          
                                <h4 class="modal-title" id="myModalLabel">KPUM</h4>
                              </div>
                              <div class="modal-body" id="detail_kpum">
                              <br>
                                <label>Tahun :</label> <label class="tahun"></label>
                                <br/>
                                <label>Struktur Kepengurusan :</label><img src="" id="file_str" class="img" width="240">
                                <br/><br>
                                <label>Visi :</label><img src="" id="file_visi" class="img" width="240">
                                <br/><br>
                                 <label>Misi :</label><img src="" id="file_misi" class="img" width="240">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                    </div>

            <!-- Modal Hapus -->
          <div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                    </div>
                    <form class="form-horizontal">
                      <div class="modal-body">
                        <input type="hidden" name="TxtId" id="id" value="">
                        <div class="alert alert-warning">
                          <p>Apakah Anda yakin ingin menghapus data ini?</p></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                        </div>
                    </form>
                  </div>
                </div>
          </div>


  <script type="text/javascript">

  window.base_url = <?php echo json_encode(base_url()); ?>;
    $(document).ready(function() {

       
        tampil_data_kpum();
         $('#tabel-kpum').dataTable();
    });


          function simpan_data_kpum() {
              var url;            
              url = '<?php echo site_url('Admin/tambah_data_kpum') ;?>';
              var formData = new FormData($('#form_data_kpum')[0]);
              $.ajax({
                  url : url,
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  dataType: "JSON",
                  success: function(data) {
                      $('#form_data_kpum')[0].reset();
                      $('#modal_tambah').modal('hide');
                      tampil_data_kpum();                
                      toastr.success('Tambah Data  Berhasil!', 'Success', {timeOut: 5000})
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      alert('Error adding / upader data');
                  }
              });
          }

           //fungsi tampil_data
          function tampil_data_kpum(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('Admin/tampil_data_kpum') ;?>',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i =1 ;
                for(i; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+ i +'</td>'+
                            '<td>'+data[i].tahun+'</td>'+
                        

                            '<td style="text-align:right;">'+
                                '<a href="javascript:;" class="btn btn-success fas fa-eye btn-xs item_detail" data="'+data[i].id+'"> Detail</a>'+' '+
                                '<a href="javascript:;" class="btn btn-primary  btn-xs item_edit" data="'+data[i].id+'"> Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger  btn-xs item_hapus" data="'+data[i].id+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                }
                $('#show_data_kpum').html(html);
            }
        });
    }

    //Tampil Detail s
    $('#show_data_kpum').on('click', '.item_detail', function(){
      var id = $(this).attr('data');
      $('#detail_kpum').modal('show');
      $('#detail_kpum').find('.modal-title').text('KPUM');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>Admin/detail_kpum',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('#detail_kpum').find('.tahun').text(data.tahun);
          $('#detail_kpum').find('#file_str').attr('src', base_url + "assets/voting_assets/image/kpum/" + data.struktur_kepengurusan);
           $('#detail_kpum').find('#file_visi').attr('src', base_url + "assets/voting_assets/image/kpum/" + data.visi);
            $('#detail_kpum').find('#file_misi').attr('src', base_url + "assets/voting_assets/image/kpum/" + data.misi);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    })



    // Tampil Modal Hapus 
    $('#show_data_kpum').on('click','.item_hapus',function(){
      var id=$(this).attr('data');
      $('#modal_hapus').modal('show');
      $('[name="TxtId"]').val(id);
    });


     // Tampil Modal Edit 
    $('#show_data_kpum').on('click','.item_edit',function(){
      var id=$(this).attr('data');
        $(".pesan-txtTahun").hide();
        // $(".pesan-foto_1").hide();
        // $(".pesan-foto_2").hide();
        // $(".pesan-foto_3").hide();

      //load data dari AJAX
        $.ajax({
            url: "<?php echo base_url() ?>Admin/edit_kpum",
            type: "GET",
            dataType: "JSON",
            data : {id:id},
            success: function(data) {
                $('[name="txtId"]').val(data.id);
                $('[name="txtTahun"]').val(data.tahun);
                // $('[name="foto_1"]').val(data.struktur_kepengurusan);
                // $('[name="foto_2"]').val(data.visi);
                // $('[name="foto_3"]').val(data.misi);
                $('#modal_edit_kpum').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From AJAX');
            }
        });
    });

    $(document).ready(function(){
          // aksi untuk hide span di modal Building
          $("#txtTahun").keyup(function () {
              $(".pesan-txtTahun").hide();
          });
          // $("#foto_1").keyup(function () {
          //     $(".pesan-foto_1").hide();
          // });
          // $('#foto_2').change(function(){
          //     $(".pesan-foto_2").hide();
          // });
          // $('#foto_3').change(function(){
          //     $(".pesan-foto_3").hide();
          // });

      });


     function simpan_edit_kpum() {
          var txtTahun = $('#txtTahun').val().length;
          // var foto_1 = $('#foto_1').val().length;                    
          // var foto_2 = $('#foto_2').val().length;         
          // var foto_3 = $('#foto_3').val().length;
      

          if (txtTahun == 0  ) {              
                    if (txtTahun == 0) {              
                        $(".pesan-txtTahun").css('display','block');
                    }
                    
                    
                    return false;
          }

    var formData = new FormData($('#form_edit_kpum')[0]);
        $.ajax({
            url : "<?php echo base_url() ?>Admin/update_kpum",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#form_edit_kpum')[0].reset();
                $('#modal_edit_kpum').modal('hide');
                  tampil_data_kpum();  
                toastr.success('Ubah Data  Berhasil!', 'Success', {timeOut: 5000})
                                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Edit Gagal!');
            }
        });
  }



        // Hapus data
    $('#btn_hapus').on('click',function(){
      var TxtId=$('#id').val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url() ?>Admin/hapus_data_kpum",
        dataType : "JSON",
        data : {TxtId: TxtId},
        success: function(data){
          $('#modal_hapus').modal('hide');
          tampil_data_kpum();
          toastr.success('Hapus Data!', 'Success', {timeOut: 5000})
        }
      });
      return false;
    });
</script>

