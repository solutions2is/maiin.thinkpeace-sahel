
<div class="col col-md-9 col-md-offset-1 well well-sm">
    <form method="post">
    <fieldset>
      <legend>- Information sur l'utilisateur:</legend>
      <div>
        <div class="form-group">
          <div class="col-md-6"><?= $form->inputOnline('first_name', 'Prénom', ['field' => 'required autofocus']); ?></div>
          <div class="col-md-6"><?= $form->inputOnline('last_name', 'Nom de famille', ['field' => 'required']); ?></div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
          <div class="col-md-6"><?= $form->inputOnline('username', 'Nom d\'utilisateur', ['field' => 'required']); ?></div>
          <div class="col-md-6"><input type='password' name='password' id='password' class='form-control' placeholder='Mot de passe' title='Mot de passe'/></div>
        </div>
        <div class="form-group">
          <div class="col-md-6"><?= $form->selectOnline('user_type_id', 'Rôle', $usertypes); ?></div>
          <div class="col-md-6"><input type='password' name='password_conf' id='password_conf' class='form-control' placeholder='Confirmer mot de passe' title='Confirmer mot de passe' /></div>
        </div>
        <div class="form-group">
          <div class="col-md-6"><?= $form->inputOnline('email', 'Email', ['field' => 'required']); ?></div>
          <div class="col-md-6"><?= $form->inputOnline('phone', 'Téléphone', ['field' => 'required']); ?></div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
        </div>
        <div class="clearfix"></div>
      </div>
    </fieldset>
    <fieldset>
      <legend>+ Note:</legend>
      <div>
        <div class="form-group">
          <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"></textarea>
        </div>
      </div>
    </fieldset>
    <div class="form-group">
      <div class="col-md-6"><button type="submit" class="form-control btn btn-info">Enregistrer</button></div>
      <div class="col-md-6"><a href="?p=admin.users.index" id='cancel' value='Annuler' class="form-control btn btn-danger"> Annuler</a></div>
    </div>

    </form>
</div>
<script>
  $(document).ready(function(){

  });
</script>