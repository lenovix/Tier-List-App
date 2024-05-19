<!-- app/Views/table_view.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<table class="table">
    <thead>
        <tr>
            <th colspan="2" style="text-align: center;"><img src="<?= esc($tableIcon) ?>" alt="Table Icon" style="height: 50px;"> <?= esc($tableName) ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ranks as $rank) : ?>
            <tr>
                <td><?= esc($rank) ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>