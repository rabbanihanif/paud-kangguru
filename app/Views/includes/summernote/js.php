<script src="<?= base_url('assets/vendors/summernote/dist/summernote-bs4.js'); ?>"></script>
<script>
  if (jQuery().summernote) {
    $(".summernote").summernote({
      dialogsInBody: true,
      minHeight: 250,
    });
  }
</script>
