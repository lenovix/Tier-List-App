<!-- app/Views/create_table.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 for="tableName">Create Tier List Name:</h1>

<form action="<?= base_url('/Home/processTableName') ?>" method="post">
    <div class="form-group">
        <input type="text" class="form-control" id="tableName" name="tableName" required>
    </div>
    <button type="submit" class="btn btn-primary">Make Your Own Template</button>
</form>

<?= $this->endSection() ?>