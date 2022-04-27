<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.criterias.index">Gestion des pays</a></li>
  <li class="active">Enregistrer un indice de gouvernance</li>
</ol>
<div class="row">
  <div class="col col-md-9 col-md-offset-1 well well-sm">
    <form method="post">
      <fieldset>
        <legend>- Information sur l'indice de gouvernance :</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
            <div class="col-md-12"><?= $form->inputOnline('criteria_name', 'Titre de l\'indice', ['field' => 'required autofocus']); ?></div>
          </div>
         <div class="clearfix"></div>
      </fieldset>
      
      <div class="form-group">
        <div class="col-md-6"><input type="submit" id='submit' value='Enregistrer' class="form-control btn btn-info" /></div>
        <div class="col-md-6"><a href="?p=admin.criterias.index" id='cancel' value='Annuler' class="form-control btn btn-danger"> Annuler</a></div>
      </div>
      </form>
  </div>
</div>