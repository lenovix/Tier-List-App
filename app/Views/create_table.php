<!-- app/Views/create_table.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1>Configure Table</h1>

<form action="<?= base_url('/submitTableConfig') ?>" method="post">
    <div class="form-group">
        <label for="tableName">Table Name:</label>
        <input type="text" class="form-control" id="tableName" name="tableName" required>
    </div>
    <div class="form-group">
        <label for="tableIcon">Table Icon URL:</label>
        <input type="url" class="form-control" id="tableIcon" name="tableIcon" required>
    </div>
    <div class="form-group">
        <label>Ranks:</label><br>
        <input type="checkbox" id="rankSPlus" name="ranks[]" value="S+" checked>
        <label for="rankSPlus">S+</label><br>
        <input type="checkbox" id="rankS" name="ranks[]" value="S">
        <label for="rankS">S</label><br>
        <input type="checkbox" id="rankA" name="ranks[]" value="A">
        <label for="rankA">A</label><br>
        <input type="checkbox" id="rankB" name="ranks[]" value="B">
        <label for="rankB">B</label><br>
        <input type="checkbox" id="rankC" name="ranks[]" value="C">
        <label for="rankC">C</label><br>
    </div>
    <button type="submit" class="btn btn-primary">Apply</button>
</form>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        if (checkboxes.length === 0) {
            alert('At least one rank must be selected.');
            event.preventDefault();
        }
    });
</script>

<?= $this->endSection() ?>