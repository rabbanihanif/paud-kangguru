<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div style='height:20px;'></div>
<div style='padding: 10px;'>
  <?php echo $output; ?>

</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?php foreach ($js_files as $file) : ?>
  <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?php foreach ($css_files as $file) : ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?= $this->endSection() ?>
