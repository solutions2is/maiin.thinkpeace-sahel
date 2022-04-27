<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li class="active"><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.circles.index">Gestion des communes</a></li>
</ol>
<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Les communes du cercle de : <?= $circle->circle_name; ?></legend>

        <p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="glyphicon glyphicon-plus-sign"></span> Nouvelle commune</button>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Communes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($towns as $town): ?>
                <tr>
                    <td><?= $town->id; ?></td>
                    <td><?= $town->town_name; ?></td>
                    <td>
                        <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.towns.edit&town_id=<?= $town->id; ?>&circle_id=<?= $circle->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.towns.delete&town_id=<?= $town->id; ?>&circle_id=<?= $circle->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle commune</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <?= $form->input('town_name', 'Nom de la commune', ['field' => 'required']); ?>
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