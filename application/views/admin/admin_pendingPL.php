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
                <th>Presma</th>
                <th>Wapresma</th>
                <th>Berkas</th>
                <th>Seleksi</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">KHS</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <img src="" class="img" id="foto" style="width: 100%; height: 100%; margin: auto;">
            </div>
        </div>
    </div>
</div>
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
                "url": "<?php echo site_url('admin/list_pendingPL/') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

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


    function lihat_presma(id) {
        // $('#modal_foto').modal('show');
        $.ajax({
            url: "<?php echo site_url('Admin/get_foto/'); ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
               
                $('#foto').attr('src', '<?php echo site_url('assets/voting_assets/image/paslon/'); ?>' + data.berkas_presma);
                 
                $("#modal_form").css("z-index", "1500");
                $("#modal_form").css("overflow-y", "scroll");
                $('#modal_form').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Deleting Data');
            }
        });
    }

    function lihat_wapresma(id) {
        // $('#modal_foto').modal('show');
        $.ajax({
            url: "<?php echo site_url('Admin/get_foto/'); ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                
                $('#foto').attr('src', '<?php echo site_url('assets/voting_assets/image/paslon/'); ?>' + data.berkas_wapresma);
                $("#modal_form").css("z-index", "1500");
                $("#modal_form").css("overflow-y", "scroll");
                $('#modal_form').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Deleting Data');
            }
        });
    }

    function terima(id) {
        // $('#modal_foto').modal('show');
        $.ajax({
            url: "<?php echo site_url('Admin/terima'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                reload_table();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Deleting Data');
            }
        });
    }

    function tolak(id) {
        // $('#modal_foto').modal('show');
        $.ajax({
            url: "<?php echo site_url('Admin/tolak'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                reload_table();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Deleting Data');
            }
        });
    }
</script>