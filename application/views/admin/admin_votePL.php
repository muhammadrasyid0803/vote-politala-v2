<!-- <div class="container" style="padding: 1px">
    <style>
        table.dataTable {
            margin-bottom: 2em !important;
        }
    </style>
    <table id="tabel-vote" class="table table-striped table-bordered" style="width:100%; margin:0 auto">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Lihat Rules</th>
                <th>Edit Rules</th>
                <th>Hapus Rules</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < sizeof($vote); $i++) { ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $vote[$i]['tahun']; ?></td>
                    <td>
                        <div class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                            View
                        </div>
                    </td>
                    <td>
                        <div class="btn btn-success">
                            <i class="fas fa-pen"></i>
                            Edit
                        </div>
                    </td>
                    <td>
                        <div class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div> -->
<div id="table-mhs" class="container" style="padding: 1px">
    <style>
        table.dataTable {
            margin-bottom: 2em !important;
        }
    </style>


    <?= $this->session->flashdata('message'); ?>
       <div class="btn btn-success" data-target="#modal_tambah_rules" data-toggle="modal">
                        <i class="fas fa-plus"></i>
                            Tambah Rules
                        </div>
                        <br>
    <table id="table-rules" class="table table-striped table-bordered" style="width:100%; margin:0 auto">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Lihat Rules</th>
                <th>Edit Or Delete</th>
               
            </tr>
        </thead>
        <tbody  id="show_data_rules">
            
        </tbody>
    </table>
</div>


<!-- Modal tambah rules -->

   <div class="modal fade" id="modal_tambah_rules" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h4 class="modal-title" id="myModalLabel">Tambah Rules</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_data_rules" action="#" class="cmxform form-horizontal style-form">

                       
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Tahun</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtTahun" placeholder="Description" minlength="2" type="number" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Waktu Mulai</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtStartDate"  minlength="2" type="date" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Waktu Berakhir</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtEndDate"  minlength="2" type="date" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Jam Mulai</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtStartTime" minlength="2" type="time" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Jam Berakhir</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtEndTime"  minlength="2" type="time" required />
                          </div>
                        </div>
                        
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="simpan_data_rules()">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>


               <!-- MOdal detail -->
           <div class="modal fade" id="detail_rules" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                          
                                <h4 class="modal-title" id="myModalLabel">Detail Rules</h4>
                              </div>
                              <div class="modal-body" id="detail_rules">
                              <br>
                                <label>Tahun :</label> <label class="tahun"></label>
                                <br/>
                                <label>WAKTU MULAI :</label> <label class="start_date"></label>
                                <br/>
                                <label>WAKTU BERAKHIR :</label> <label class="end_date"></label>
                                <br/>
                                <label>JAM MULAI :</label> <label class="start_time"></label>
                                <br/>
                                <label>JAM BERAKHIR :</label> <label class="end_time"></label>
                                <br/>
                              
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                    </div>

                    <!-- Modal edit -->
                     <div class="modal fade" id="modal_edit_rules" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h4 class="modal-title" id="myModalLabel">Edit Rules</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_edit_rules" action="#" class="form-horizontal">
                      
                        <div class="form-group ">
                          <input type="hidden" name="txtId" value="" />
                          
                          <label for="cemail" class="control-label col-lg-6">Tahun</label>
                          <div class="col-lg-8">
                            <input class=" form-control " name="txtTahun" id="txtTahun"  type="number" required />
                              <span class="pesan pesan-txtTahun">Silahkan Isi Kolom </span>
                          </div>
                        </div>
                         <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Star Date</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtStartDate"  minlength="2" type="date" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">End Date</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtEndDate"  minlength="2" type="date" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">Star Time</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtStartTime" minlength="2" type="time" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="cemail" class="control-label col-lg-6">End Time</label>
                          <div class="col-lg-8">
                            <input class=" form-control" name="txtEndTime"  minlength="2" type="time" required />
                          </div>
                        </div>
                       

                          
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="simpan_edit_rules()">Simpan</button>
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

       
        tampil_data_rules();
         $('#table-rules').dataTable();
    });
    
         function simpan_data_rules() {
              var url;

            
              url = '<?php echo site_url('Admin/tambah_data_rules') ;?>';

              var formData = new FormData($('#form_data_rules')[0]);
              $.ajax({
                  url : url,
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  dataType: "JSON",
                  success: function(data) {
                      $('#form_data_rules')[0].reset();
                      $('#modal_tambah_rules').modal('hide');
                      tampil_data_rules();                
                      toastr.success('Tambah Data  Berhasil!', 'Success', {timeOut: 5000})
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      alert('Error adding / upader data');
                  }
              });
          }

            //fungsi tampil_data
          function tampil_data_rules(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('Admin/tampil_data_rules') ;?>',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].tahun+'</td>'+
                        

                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-success fas fa-eye btn-xs item_detail" data="'+data[i].id+'"> Detail</a>'+' '+
                                
                            '</td>'+

                             '<td style="text-align:center;">'+
                              
                                '<a href="javascript:;" class="btn btn-primary  btn-xs item_edit" data="'+data[i].id+'"> Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger  btn-xs item_hapus" data="'+data[i].id+'">Delete</a>'+
                            '</td>'+


                            '</tr>';
                }
                $('#show_data_rules').html(html);
            }
        });
    }


     //Tampil Detail 
    $('#show_data_rules').on('click', '.item_detail', function(){
      var id = $(this).attr('data');
      $('#detail_rules').modal('show');
      $('#detail_rules').find('.modal-title').text('Detail Rules');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>Admin/detail_rules',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('#detail_rules').find('.tahun').text(data.tahun);
          $('#detail_rules').find('.start_date').text(data.start_date);
          $('#detail_rules').find('.end_date').text(data.end_date);
          $('#detail_rules').find('.start_time').text(data.start_time);
          $('#detail_rules').find('.end_time').text(data.end_time);

        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    })

     // Tampil Modal Edit 
    $('#show_data_rules').on('click','.item_edit',function(){
      var id=$(this).attr('data');
        $(".pesan-txtTahun").hide();
        // $(".pesan-foto_1").hide();
        // $(".pesan-foto_2").hide();
        // $(".pesan-foto_3").hide();

      //load data dari AJAX
        $.ajax({
            url: "<?php echo base_url() ?>Admin/edit_rules",
            type: "GET",
            dataType: "JSON",
            data : {id:id},
            success: function(data) {
                $('[name="txtId"]').val(data.id);
                $('[name="txtTahun"]').val(data.tahun);
                $('[name="txtStartDate"]').val(data.start_date);
                $('[name="txtEndDate"]').val(data.end_date);
                $('[name="txtStartTime"]').val(data.start_time);
                $('[name="txtEndTime"]').val(data.end_time);
                $('#modal_edit_rules').modal('show');
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


     function simpan_edit_rules() {
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

    var formData = new FormData($('#form_edit_rules')[0]);
        $.ajax({
            url : "<?php echo base_url() ?>Admin/update_rules",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#form_edit_rules')[0].reset();
                $('#modal_edit_rules').modal('hide');
                  tampil_data_rules();  
                toastr.success('Ubah Data  Berhasil!', 'Success', {timeOut: 5000})
                                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Edit Gagal!');
            }
        });
  }


    // Tampil Modal Hapus 
    $('#show_data_rules').on('click','.item_hapus',function(){
      var id=$(this).attr('data');
      $('#modal_hapus').modal('show');
      $('[name="TxtId"]').val(id);
    });


       // Hapus data
    $('#btn_hapus').on('click',function(){
      var TxtId=$('#id').val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url() ?>Admin/hapus_data_rules",
        dataType : "JSON",
        data : {TxtId: TxtId},
        success: function(data){
          $('#modal_hapus').modal('hide');
          tampil_data_rules();
          toastr.success('Hapus Data!', 'Success', {timeOut: 5000})
        }
      });
      return false;
    });



</script>

<script>
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/list_votePL') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }
</script>










