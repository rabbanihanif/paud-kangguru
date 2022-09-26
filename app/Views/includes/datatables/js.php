<!-- JS Libraies -->
<script src="<?= base_url('assets/vendors/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-select-bs4/js/select.bootstrap4.min.js'); ?>"></script>

<script>
  $("#tabel").dataTable({
    "columnDefs": [{
      "sortable": true,
    }]
  });
  $("#tabel2").dataTable({
    "columnDefs": [{
      "sortable": true,
    }]
  });
</script>