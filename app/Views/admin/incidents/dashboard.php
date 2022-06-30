<?php 

    if($country == 'Mali')
        require_once("cartes/map_mali.php");

    if($country == 'Niger')
        require_once("cartes/map_niger.php");

    if($country == 'Burkina-Faso')
        require_once("cartes/map_burkina.php");

?>

<div class="row">
    <div class="col col-sm-6 col-6">
        <a style="font-size: 25px;" href="#" class="btn btn-primary btn-lg cPanel">
        <span style="margin-left:5px; font-size: 25px;" class="glyphicon glyphicon-eye-open"></span> 
            Incidents signalés (<?= $nbr_incidents?>)
        </a>
    </div>
    <div class="col col-sm-6 col-6">
        <a style="font-size: 25px;" href="#" class="btn btn-danger btn-lg cPanel">
        <span style="margin-left:5px; font-size: 25px;" class="glyphicon glyphicon-fire"></span> 
            Incidents vérifiés (<?= $nbr_verified ?>)
        </a>
    </div>
</div>

<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Tous les incidents signalés</legend>
        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Statut</th>
                    <th>Dégats</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($incidents as $incident): ?>
                <tr>
                    <td><?= $incident->id; ?></td>
                    <td><?= $incident->title; ?></td>
                    <td><?= $incident->categorie; ?></td>
                    <td><?= $incident->state == '0' ? '<span style="font-size: 13px;" class="label label-danger">En attente</span>' : '<span style="font-size: 13px;" class="label label-success">Vérifié</span>' ; ?></td>
                    <td><?= $incident->damage; ?></td>
                    <td>
                        <a style="font-size: 12px;" class="btn btn-primary" href="?p=admin.incidents.show&id=<?= $incident->id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <!-- <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.incidents.edit&id=<?= $incident->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a> -->
                        <!-- <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.incidents.delete&id=<?= $incident->id; ?>"><span class="glyphicon glyphicon-trash"></span></a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

    </div>
</div>