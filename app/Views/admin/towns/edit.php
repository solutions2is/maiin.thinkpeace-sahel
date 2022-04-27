<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.categorie.index">Gestion des pays</a></li>
  <li class="active">Enregistrer une commune </li>
</ol>
<div class="row">
  <div class="col col-md-9 col-md-offset-1 well well-sm">
    <form method="post">
      <fieldset>
        <legend>- Information sur le cercle :</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
            <div class="col-md-12"><?= $form->inputOnline('town_name', 'Nom de la commune', ['field' => 'required autofocus']); ?></div>
          </div>
         <div class="clearfix"></div>
      </fieldset>
      
      <div class="form-group">
        <div class="col-md-6"><input type="submit" id='submit' value='Enregistrer' class="form-control btn btn-info" /></div>
        <div class="col-md-6"><a href="?p=admin.towns.index&town_id=<?= $town->id; ?>&circle_id=<?= $circle->id; ?>" id='cancel' value='Annuler' class="form-control btn btn-danger"> Retour</a></div>
      </div>
      </form>
  </div>
</div>