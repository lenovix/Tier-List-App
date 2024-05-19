<!-- app/Views/home.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1>Tier List Application</h1>
<p>This is Tier List Application, where you can create your own tier list character from games or somewhere.</p>

<!-- Tambahkan Tombol untuk Membuat Tabel -->
<a href="<?= base_url('/createTable') ?>" class="btn btn-primary">Make a Template</a>

<?= $this->endSection() ?>