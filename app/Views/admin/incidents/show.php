<div class="row">
    <?php if($message): ?>
        <div class="alert alert-<?= $message['type']; ?>">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $message['label']; ?>
        </div>
    <?php endif; ?>
    <div class="col col-md-10 col-md-offset-1">
        <p style="text-align: right;">
            <?php if($incident->state == 0): ?>
                <a href="?p=admin.incidents.validate&id=<?= $incident->id; ?>" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Marquer comme vérifié</a>
            <?php else: ?>
                    <a href="?p=admin.incidents.unvalidate&id=<?= $incident->id; ?>" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Marquer comme non vérifié</a>
            <?php endif; ?>
            <a href="?p=admin.incidents.edit&id=<?= $incident->id; ?>" class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"></span> Modifier le contenu</a>
        </p>
    </div>
  <div class="col col-md-10 col-md-offset-1 well well-sm">
    <form method="post">
      <fieldset>
        <legend>- Information sur l'incident :</legend>

        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
            <div class="col-md-12"><?= $form->inputOnline('title', 'Titre de l\'incident', ['field' => 'disabled']); ?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><?= $form->selectOnline('incident_cat_id', 'disabled', $categories); ?></div>
            <div class="col-md-6"><?= $form->inputOnline('damage', 'Nombre de morts', ['field' => 'disabled']); ?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><?= $form->selectOnline('country_id', 'disabled', $countries); ?></div>
            <div class="col-md-6"><?= $form->selectOnline('region_id', 'disabled', $regions); ?></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>
      <fieldset>
        <legend>- Description:</legend>
        <div>
          <div class="form-group">
            <div class="col-md-12"><?= $form->inputOnline('content', 'Description', ['type' => 'textarea','field' => 'disabled']); ?></div>
          </div>
        </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6 col-md-offset-3"><a href="?p=admin.incidents.index" id='cancel' value='Retour' class="form-control btn btn-danger"> Annuler</a></div>
      </div>
      </form>
  </div>
</div>