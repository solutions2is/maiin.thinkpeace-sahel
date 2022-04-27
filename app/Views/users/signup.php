<div class="row">
  <div class="col col-md-8 col-md-offset-2 well well-sm">
      <form method="post">
      <fieldset>
        <legend>- Information sur l'utilisateur:</legend>
        <div>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='first_name' id="first_name" value="" class='form-control' placeholder='Prénom' title='Prénom' required autofocus /></div>
            <div class="col-md-6"><input type="text" name='last_name' id='last_name' value="" class='form-control' placeholder='Nom de famille' title='Nom de famille' /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='fname' id='fname' value="" class='form-control' placeholder='Nom du père ou de la mère' title='Nom du père ou de la mère' /></div>
            <div class="col-md-6">
              <label class="radio-inline"><input type="radio" name='gender' value="1" title='Male' checked/>Masculin</label>
              <label class="radio-inline"><input type="radio" name='gender' value="0" title='Female' />Féminin</label>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <div class="col-md-12"><input type="text" name='username' id='username' value="" class='form-control' placeholder='Nom utilisateur' title='Nom utilisateur' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type='password' name='password' id='password' class='form-control' placeholder='Mot de passe' title='Mot de passe' required/></div>
            <div class="col-md-6"><input type='password' name='password_conf' id='password_conf' class='form-control' placeholder='Confirmer mot de passe' title='Confirmer mot de passe' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type='email' name='email' id='email' value="" class='form-control' placeholder='Email' title='Email' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type='phone' name='phone' id='phone' value="" class='form-control' placeholder='Téléphone' title='Téléphone' required/></div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <div class="col-md-12"><input type="text" name='address' id='address' value="" class='form-control' placeholder='Adresse' title='Adresse'/></div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
                <select name="social_cover" id="social_cover" class='form-control' >
                    <option value="none">Non assuré</option>
                    <option value="anam">ANAM</option>
                    <option value="amo">AMO</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='social_id' id='social_id' value="" class='form-control' placeholder='Numéro assurance' title='Numéro assurance' required/></div>
          </div>
          
          <div class="form-group">
            <div class="col-md-6">
              <?= $form->select('group_id', '', $groups); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="date" name='birth_date' id='birth_date' value="" class='form-control' placeholder='Birth Date' title='Birth Date'/></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </fieldset>
      <fieldset>
        <legend>+ Note:</legend>
        <div style="display: none;">
          <div class="form-group">
            <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"></textarea>
          </div>
        </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><button type="submit" class="form-control btn btn-info">Enregistrer</button></div>
        <div class="col-md-6"><a href="?p=users.login" id='cancel' value='Annuler' class="form-control btn btn-danger"> Annuler</a></div>
      </div>

      </form>
  </div>
</div>
<script>
  $(document).ready(function(){

  });
</script>