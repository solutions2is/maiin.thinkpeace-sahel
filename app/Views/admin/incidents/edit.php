<div class="row">
  <div class="col col-md-9 col-md-offset-1 well well-sm">
    <form method="post">
      <fieldset>
        <legend>- Information sur l'incident :</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
            <div class="col-md-12"><?= $form->inputOnline('title', 'Titre de l\'incident', ['field' => 'required autofocus']); ?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><?= $form->selectOnline('incident_cat_id', 'Catégorie', $categories); ?></div>
            <div class="col-md-6"><?= $form->inputOnline('damage', 'Nombre de morts', ['field' => 'required']); ?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><?= $form->selectOnline('country_id', 'Pays', $countries); ?></div>
            <div class="col-md-6"><?= $form->selectOnline('region_id', 'Région', $regions); ?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><?= $form->selectOnline('circle_id', 'Cercle', $circles); ?></div>
            <div class="col-md-6"><?= $form->selectOnline('town_id', 'Commune', $towns); ?></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>
      <fieldset>
        <legend>- Description:</legend>
        <div>
          <div class="form-group">
            <div class="col-md-12"><?= $form->inputOnline('content', 'Description', ['type' => 'textarea','field' => 'required']); ?></div>
          </div>
        </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><input type="submit" id='submit' value='Enregistrer' class="form-control btn btn-info" /></div>
        <div class="col-md-6"><a href="?p=admin.incidents.index" id='cancel' value='Annuler' class="form-control btn btn-danger"> Annuler</a></div>
      </div>
      </form>
  </div>
</div>