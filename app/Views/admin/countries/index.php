<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li class="active"><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.countries.index">Gestion des pays</a></li>
</ol>
<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Liste des pays</legend>

        <p>
            <a href="?p=admin.countries.add" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Nouveau pays</a>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du pays</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($countries as $country): ?>
                <tr>
                    <td><?= $country->id; ?></td>
                    <td><?= $country->country_name; ?></td>
                    <td>
                        <a style="font-size: 12px;" class="btn btn-success" href="?p=admin.countries.show&id=<?= $country->id; ?>"><span class="glyphicon glyphicon-eye-open"></span> Accéder aux régions</a>
                        <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.countries.edit&id=<?= $country->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.countries.delete&id=<?= $country->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

    </div>
</div>