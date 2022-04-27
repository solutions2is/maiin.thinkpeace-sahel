<aside class="col col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 login" >
  <form id="loginForm" role="form" method="post" action="">
    <fieldset>
      <p id="login-legend">Se connecter</p>
        <?php if($errors): ?>
            <div class="alert alert-danger">
                <p>
                    Identifiant et/ou mot de passe incorrect
                </p>
            </div>
        <?php endif; ?>
      <div class="form-group">
        <label for="username" class="sr-only">Nom utilisateur: </label>
        <input type="text" title="Nom utilisateur" class="form-control" id="username" name="username" placeholder="Nom utilisateur"/>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">Mot de passe: </label>
        <input type="password" title="Mot de passe" class="form-control" id="password" name="password" placeholder="Mot de passe"/>
      </div>
      <div class="checkbox">
        <label>
          <input name="remember_me" type="checkbox" value="1"> Se souvenir de moi
        </label>
      </div>
      
      <div class="form-group">
        <button type="submit" class="form-control btn btn-info">Se connecter</button>
      </div>
      <div class="form-group text-center">
          <a  href="index.php?p=users.signup">Créer un compte</a> / <a  href="#">Mot de passe oublié ?</a>
      </div>
    </fieldset>
  </form>
</aside>

