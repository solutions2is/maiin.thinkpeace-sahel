<style>
    .map{
        overflow: hidden;
    }

    .map__image path{
        fill: #a4ced2;
        stroke: #fff;
        stroke-width: 1px;
        transition: fill 0.3s;
    }

    .map__image .is-active path{
        fill: #19692c;
    }

    .map__list {
        float: right;
    }

    .map__list li a{
        font-size: 24px;
        font-family: "Arial";
        line-height: 45px;
    }

    .map__list a{
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }
    .map__list a.is-active{
        color: #19692c;
        font-weight: bold;
    }

    .indice{
        font-size: 32px;
        text-align: center;
        color: fff;
    }
    .indice-label{
        background-color: #5cb85c;
        padding: 10px 20px;
    }
</style>
<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.incidents.index">Incidents</a></li>
  <li class="active">Région de <?= $_GET['region_name']; ?></li>
</ol>

<div class="row">
        <?php foreach($indices as $indice): ?>
            <div class="col col-md-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><?= $indice->criteria_name; ?></div>
                    <div class="panel-body indice">
                       <div class="indice-label"><?= $indice->criteria_value; ?>%</div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
</div>
<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Tous les incidents signalés dans la région de <?= $_GET['region_name']; ?></legend>
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
                <?php foreach($RegionIncidents as $RegionIncident): ?>
                <tr>
                    <td><?= $RegionIncident->id; ?></td>
                    <td><?= $RegionIncident->title; ?></td>
                    <td><?= $RegionIncident->categorie; ?></td>
                    <td><?= $RegionIncident->state == '0' ? '<span style="font-size: 13px;" class="label label-danger">En attente</span>' : '<span style="font-size: 13px;" class="label label-success">Vérifié</span>' ; ?></td>
                    <td><?= $RegionIncident->damage; ?></td>
                    <td>
                        <a style="font-size: 12px;" class="btn btn-primary" href="?p=admin.incidents.show&id=<?= $RegionIncident->id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <!-- <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.incidents.edit&id=<?= $RegionIncident->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a> -->
                        <!-- <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.incidents.delete&id=<?= $RegionIncident->id; ?>"><span class="glyphicon glyphicon-trash"></span></a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

    </div>
</div>