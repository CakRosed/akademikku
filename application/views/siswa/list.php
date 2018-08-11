<div class="panel panel-default" style="position: static; zoom: 1;">
  <div class="panel-heading">
      <i class="fa fa-external-link-square"></i> Dynamic Table
      <div class="panel-tools">
          <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
          <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
          <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
          <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
          <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
      </div>
  </div>
  <div class="panel-body" style="display: block;">
    <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>NO</th>
          <th>FOTO</th>
          <th>NIS</th>
          <th>NAMA</th>
          <th>TEMPAT LAHIR</th>
          <th>TANGGAL LAHIR</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script>
  $(document).ready(function() {
    // selecter table sesuai id
      var t = $('#mytable').DataTable( {
          // pengambilan data
          "ajax": '<?php echo site_url('siswa/data'); ?>',
          "order": [[ 2, 'asc' ]],
          "columns": [
              {
                  "data": null,
                  "width": "50px",
                  "sClass": "text-center",
                  "orderable": false,
              },
              {
                  "data": "foto",
                  "width": "50px",
                  "orderable": false,
                  "sClass": "text-center",
              },
              {
                  "data": "nim",
                  "width": "120px",
                  "sClass": "text-center"
              },
              { "data": "nama" },
              { "data": "tempat_lahir" },
              { "data": "tanggal_lahir", "width": "120px"},
              { "data": "aksi" },
          ]
      } );

      t.on( 'order.dt search.dt', function () {
          t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();
  } );
</script>
