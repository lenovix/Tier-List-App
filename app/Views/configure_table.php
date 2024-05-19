<!-- app/Views/configure_table.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="container-fluid" id="tierListContainer">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><?= esc($tableName) ?>'s Tier List</h1>
            <p>Created by: Ichsanul Kamil Sudarmi</p>
        </div>
        <button class="btn btn-secondary" data-toggle="modal" data-target="#configModal">Configure Table</button>
    </div>
    <hr>
    <div class="row">
        <!-- Sisi Kiri -->
        <div class="col-3" style="border-right: 1px solid #ddd; height: 100vh;" data-html2canvas-ignore>
            <div id="uploadedImages">
                <h4>Uploaded Images</h4>
                <!-- Tempat untuk menampilkan gambar yang diupload -->
                <?php if (session()->has('uploadedImages')) : ?>
                    <?php foreach (session('uploadedImages') as $image) : ?>
                        <img src="<?= base_url('uploads/' . $image) ?>" alt="Uploaded Image" class="img-thumbnail" width="80" height="80" draggable="true" ondragstart="drag(event)" id="<?= esc($image) ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <form id="uploadForm" action="<?= base_url('/Home/uploadImage') ?>" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
                <div class="form-group">
                    <label for="imageUpload">Upload Image:</label>
                    <input type="file" class="form-control-file" id="imageUpload" name="image">
                </div>
            </form>

            <button class="btn btn-success" onclick="downloadTable()" style="margin-top: 20px;">Download Table</button>
        </div>

        <!-- Sisi Kanan -->
        <div class="col-9">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="vertical-align: middle; width:10%; text-align: center; border: solid 1px black;background-color: rgb(255, 127, 127);">S</td>
                        <td class="dropzone" style="vertical-align: middle; width:70%; border: solid 1px black; height: 150px;"></td>
                        <td style="vertical-align: middle; width:10%;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
                        <td style="vertical-align: middle; width:10%; border: solid 1px black;">
                            <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                            <button class="btn btn-info" style="width: 100%;">Down</button>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: middle; text-align: center;border: solid 1px black;background-color: rgb(255, 191, 127);">A
                        </td>
                        <td class="dropzone" style="vertical-align: middle;border: solid 1px black;height: 150px;"></td>
                        <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
                        <td style="vertical-align: middle; border: solid 1px black;">
                            <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                            <button class="btn btn-info" style="width: 100%;">Down</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align: center;border: solid 1px black; background-color: rgb(255, 223, 127);">B</td>
                        <td class="dropzone" style="vertical-align: middle;border: solid 1px black;height: 150px;"></td>
                        <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
                        <td style="vertical-align: middle; border: solid 1px black;">
                            <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                            <button class="btn btn-info" style="width: 100%;">Down</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align: center;border: solid 1px black; background-color: rgb(255, 255, 127);">C</td>
                        <td class="dropzone" style="vertical-align: middle;border: solid 1px black;height: 150px;"></td>
                        <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
                        <td style="vertical-align: middle; border: solid 1px black;">
                            <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                            <button class="btn btn-info" style="width: 100%;">Down</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align: center;border: solid 1px black; background-color: rgb(191, 255, 127);">D</td>
                        <td class="dropzone" style="vertical-align: middle;border: solid 1px black;height: 150px;"></td>
                        <td style="vertical-align: middle;border: solid 1px black;"><button class="btn btn-secondary">Configure</button></td>
                        <td style="vertical-align: middle; border: solid 1px black;">
                            <button class="btn btn-info" style="width: 100%; margin-bottom: 2px;">Up</button><br>
                            <button class="btn btn-info" style="width: 100%;">Down</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="configModal" tabindex="-1" role="dialog" aria-labelledby="configModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="configModalLabel">Configure Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="configForm">
                    <div class="form-group">
                        <label for="tableNameInput">Table Name</label>
                        <input type="text" class="form-control" id="tableNameInput" value="<?= esc($tableName) ?>">
                    </div>
                    <button type="button" class="btn btn-danger" id="deleteTable">Delete Table</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveConfig">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageUpload').addEventListener('change', function() {
        document.getElementById('uploadForm').submit();
    });

    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event) {
        event.preventDefault();
        var data = event.dataTransfer.getData("text");
        var img = document.getElementById(data);
        event.target.appendChild(img);

        // Remove image from the uploaded images div
        var uploadedImagesDiv = document.getElementById('uploadedImages');
        if (uploadedImagesDiv.contains(img)) {
            uploadedImagesDiv.removeChild(img);
        }
    }

    document.querySelectorAll('.dropzone').forEach(zone => {
        zone.ondragover = allowDrop;
        zone.ondrop = drop;
    });

    function downloadTable() {
        if (confirm('Download table as JPEG/PNG?')) {
            const element = document.getElementById('tierListContainer');
            html2canvas(element).then(canvas => {
                let link = document.createElement('a');
                link.download = 'tier_list.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        }
    }

    document.getElementById('saveConfig').addEventListener('click', function() {
        var newTableName = document.getElementById('tableNameInput').value;
        // Ajax call to update table name in backend
        fetch('<?= base_url('/Home/updateTableName') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Assuming you are using CSRF protection
            },
            body: JSON.stringify({
                tableName: newTableName
            })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                document.querySelector('h1').textContent = `${newTableName}'s Tier List`;
                $('#configModal').modal('hide');
            } else {
                alert('Failed to update table name.');
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    });

    document.getElementById('deleteTable').addEventListener('click', function() {
        if (confirm('Are you sure you want to delete this table?')) {
            // Ajax call to delete table in backend
            fetch('<?= base_url('/Home/deleteTable') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Assuming you are using CSRF protection
                },
                body: JSON.stringify({
                    tableName: '<?= esc($tableName) ?>'
                })
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    window.location.href = '<?= base_url('/Home') ?>'; // Redirect to home or another page
                } else {
                    alert('Failed to delete table.');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    });
</script>
<?= $this->endSection() ?>