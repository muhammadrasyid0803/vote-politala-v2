<div id="table-mhs" class="container" style="padding: 1px">
    <style>
        table.dataTable {
            margin-bottom: 2em !important;
        }
    </style>
    <?= $this->session->flashdata('message'); ?>
    <table id="table" class="table table-striped table-bordered" style="width:100%; margin:0 auto">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>semester</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Angkatan</th>
                <th>Edit or Delete</th>
            </tr>
        </thead>
    </table>
</div>
<!-- Edit Modal-->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" id="edit">
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label for="username">NIM </label>
                            <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Nama </label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Semester </label>
                            <input type="text" class="form-control" id="semester" name="semester" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Kelas </label>
                            <input type="text" class="form-control" id="kelas" name="kelas" autocomplete="off" required>
                        </div>
                         <div class="form-group">
                            <label for="username">Angkatan </label>
                            <input type="text" class="form-control" id="angkatan" name="angkatan" autocomplete="off" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" id="sub_button" onclick="simpan()" type="submit">Simpan</button>
                 
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
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
                "url": "<?php echo site_url('admin/list_mahasiswaPL') ?>",
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


    function edit_mahasiswa(nim) {
        save_method = 'update';
        $('#edit')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('Admin/edit_mhs/') ?>/" + nim,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="nim"]').val(data.nim);
                $('[name="nama"]').val(data.nama);
                $('[name="semester"]').val(data.semester);
                $('[name="kelas"]').val(data.kelas);
                $('[name="angkatan"]').val(data.angkatan);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Mahasiswa'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function simpan() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('person/ajax_add') ?>";
        } else {
            url = "<?php echo site_url('admin/update_mahasiswa') ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#edit').serialize(),
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }

    function delete_mahasiswa(nim) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('Admin/delete_mahasiswa/') ?>/" + nim,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }
</script>