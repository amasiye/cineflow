<div class="container-fluid margin-top-128">
  <div class="col-xs-12 col-sm-offset-4 col-sm-4">
    <div class="row">
      <form class="form">
        <?php if(isset($_GET['action']) && !empty($_GET['action'])): ?>
          <h1 class="padding-bottom-16">Forgot Email/Password</h1>
          <?php if(streq('help-password', $_GET['action'])): ?>
          <p class="padding-bottom-16">We will send you an email with instructions on how to reset your password.</p>
          <div class="form-group padding-bottom-16">
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
          </div>
          <div class="form-group padding-bottom-16">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="send-email">Email Me</button>
          </div>
          <p><a href="login/?action=help-email">I don't remember my email.</a></p>
        <?php elseif(streq('help-email', $_GET['action'])): ?>
          <p class="padding-bottom-16">Please provide this information to help us find your account (all fields required):</p>
          <div class="form-group padding-bottom-16">
            <label for="first-name">First name on account</label>
            <input type="text" class="form-control" name="first-name" placeholder="First name on account">
          </div>
          <div class="form-group padding-bottom-16">
            <label for="last-name">Last name on account</label>
            <input type="text" class="form-control" name="last-name" placeholder="Last name on account">
          </div>
          <div class="form-group padding-bottom-16">
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Find Account</button>
            &nbsp;
            <a href="login/?action=help-password" class="btn btn-ghost btn-lg" name="cancel">Cancel</a>
          </div>
          <?php endif; ?>
        <?php else: ?>
        <h1 class="text-center padding-bottom-16">Sign in to your account</h1>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Username or Email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <p class="text-info small margin-bottom-16">(Password must be at least 6 and no longer than 20 characters.)</p>
        <div class="form-group">
          <button type="button" class="btn btn-primary btn-lg btn-block margin-bottom-16" name="login">Login</button>
          <label class="checkbox-inline"><input type="checkbox" name="remember" value="">Remember Me</label>
        </div>

        <p><a href="login/?action=help-password">Forgot your email or password?</a></p>
        <hr>
        <p>New to <?= APP_NAME; ?>? <a href="register/">Register now.</a></p>
      <?php endif; ?>
      </form>
    </div>
  </div>
</div>
