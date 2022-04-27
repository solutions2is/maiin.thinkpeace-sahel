<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.gouvernances.index">Gouvernances</a></li>
  <li class="active">Ajouter un indice de gouvernance</li>
</ol>
<div class="row">
  <div class="col col-md-9 col-md-offset-1 well well-sm">
    <form method="post">
      <fieldset>
        <legend>- Localité :</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
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
        <legend>- Indices de gouvernance en pourcentage (%):</legend>
        <div>
          <div class="form-group">
            <div class="col-md-6"><?= $form->selectOnline('criteria_id', 'Critères de grouvernance', $criterias); ?></div>
            <div class="col-md-6"><?= $form->inputOnline('criteria_value', 'Valeur', ['type' => 'number','field' => 'required']); ?></div>
          </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><input type="submit" id='submit' value='Enregistrer' class="form-control btn btn-info" /></div>
        <div class="col-md-6"><a href="?p=admin.gouvernances.index" id='cancel' value='Annuler' class="form-control btn btn-danger"> Annuler</a></div>
      </div>
      </form>
  </div>
</div>