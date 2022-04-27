<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Indices de gouvernances enregistrés</legend>

        <p>
            <a href="?p=admin.gouvernances.add" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Nouvel indice</a>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Localité</th>
                    <th>Indice de gouvernance</th>
                    <th>Valeur</th>
                     <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($gouvernances as $gouvernance): ?>
                <tr>
                    <td><?= $gouvernance->id; ?></td>
                    <td><?= $gouvernance->country_name; ?> - <?= $gouvernance->region_name; ?> <br>
                    <?= $gouvernance->circle_name; ?> - <?= $gouvernance->town_name; ?></td>
                    <td><?= $gouvernance->criteria_name; ?></td>
                    <td><?= $gouvernance->criteria_value; ?></td>
                    <td>
                        <!-- <a style="font-size: 12px;" class="btn btn-primary" href="?p=admin.gouvernances.show&id=<?= $gouvernance->id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a> -->
                        <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.gouvernances.edit&id=<?= $gouvernance->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.gouvernances.delete&id=<?= $gouvernance->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

    </div>
</div>