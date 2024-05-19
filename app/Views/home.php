<!-- app/Views/home.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1>Welcome to Home Page</h1>
<p>This is the home page content.</p>

<!-- Tambahkan Tombol untuk Membuat Tabel -->
<a href="<?= base_url('/createTable') ?>" class="btn btn-primary">Membuat Table</a>

<?= $this->endSection() ?>