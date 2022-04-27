<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li class="active"><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.countries.index">Gestion des pays</a></li>
</ol>
<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Les régions du/de : <?= $country->country_name; ?></legend>

        <p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ajouter une région</button>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Régions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($CountryRegions as $region): ?>
                <tr>
                    <td><?= $region->id; ?></td>
                    <td><?= $region->region_name; ?></td>
                    <td>
                    <a style="font-size: 12px;" class="btn btn-success" href="?p=admin.circles.index&id=<?= $country->id; ?>&region_id=<?= $region->id; ?>"><span class="glyphicon glyphicon-eye-open"></span>Acceder aux cercles</a>
                        <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.countries.region_edit&region_id=<?= $region->id; ?>&id=<?= $country->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.countries.region_delete&region_id=<?= $region->id; ?>&id=<?= $country->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle région</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <?= $form->input('region_name', 'Nom de la région', ['field' => 'required']); ?>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Commentaire:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <div class="col-md-6"><input type="submit" id='submit' value='Enregistrer' class="form-control btn btn-info" /></div>
                <div class="col-md-6"><a id='cancel' value='Annuler' class="form-control btn btn-danger " data-dismiss="modal"> Annuler</a></div>
            </div>
        </div>
    </form>
    </div>
  </div>
</div>
