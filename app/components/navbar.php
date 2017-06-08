<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= APP_NAME; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php if($session->has_active_user()): ?>
      <ul class="nav navbar-nav">
        <li><a href="#">Notiications</a></li>
        <li><a href="#">Account</a></li>
      </ul>
      <?php else: ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
