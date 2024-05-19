<!-- app/Views/configure_table.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1><?= esc($tableName) ?> Tier List</h1>
<br>
<table class="table">
    <tbody>
        <tr>
            <td style="vertical-align: middle; width:10%; text-align: center; border: solid 1px black;">S</td>
            <td style="vertical-align: middle; width:70%; border: solid 1px black;">Tier List Rank S</td>
            <td style="vertical-align: middle;  width:10%;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
            <td style="width:10%; border: solid 1px black;">
                <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                <button class="btn btn-info" style="width: 100%;">Down</button>
            </td>
        </tr>
        <tr>
            <td style=" vertical-align: middle; text-align: center;border: solid 1px black;">A
            </td>
            <td style="vertical-align: middle;border: solid 1px black;">Tier List Rank A</td>
            <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
            <td style="border: solid 1px black;">
                <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                <button class="btn btn-info" style="width: 100%;">Down</button>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle; text-align: center;border: solid 1px black;">B</td>
            <td style="vertical-align: middle;border: solid 1px black;">Tier List Rank C</td>
            <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
            <td style="border: solid 1px black;">
                <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                <button class="btn btn-info" style="width: 100%;">Down</button>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle; text-align: center;border: solid 1px black;">C</td>
            <td style="vertical-align: middle;border: solid 1px black;">Tier List Rank C</td>
            <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
            <td style="border: solid 1px black;">
                <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                <button class="btn btn-info" style="width: 100%;">Down</button>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle; text-align: center;border: solid 1px black;">D</td>
            <td style="vertical-align: middle;border: solid 1px black;">Tier List Rank D</td>
            <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
            <td style="border: solid 1px black;">
                <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                <button class="btn btn-info" style="width: 100%;">Down</button>
            </td>
        </tr>
    </tbody>
</table>

<form action="<?= base_url('/Home/uploadImage') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="imageUpload">Upload Image:</label>
        <input type="file" class="form-control-file" id="imageUpload" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Upload Image</button>
</form>

<div id="uploadedImages">
    <!-- Tempat untuk menampilkan gambar yang diupload -->
    <?php if (session()->has('uploadedImages')) : ?>
        <?php foreach (session('uploadedImages') as $image) : ?>
            <img src="<?= base_url('uploads/' . $image) ?>" alt="Uploaded Image" class="img-thumbnail" width="80" height="80">
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<button class="btn btn-success" onclick="downloadTable()">Download Table</button>

<script>
    function downloadTable() {
        if (confirm('Download table as JPEG/PNG?')) {
            // Implementasi download table sebagai gambar di sini
            alert('Download feature not implemented yet.');
        }
    }
</script>

<?= $this->endSection() ?>