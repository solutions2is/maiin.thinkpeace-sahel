<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li class="active"><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.criterias.index">Gestion des critères de gouvernance</a></li>
</ol>
<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Les critères de gouvernances</legend>

        <p>
            <a href="?p=admin.criterias.add" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Nouveau critère</a>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Critères de gouvernances</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($criterias as $criteria): ?>
                <tr>
                    <td><?= $criteria->id; ?></td>
                    <td><?= $criteria->criteria_name; ?></td>
                    <td>
                        <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.criterias.edit&id=<?= $criteria->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.criterias.delete&id=<?= $criteria->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                    </tbody>
            </table>
        </div>

    </div>
</div>
