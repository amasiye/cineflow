<nav class="navbar navbar-inverse">
  <div class="contrainer-fluid">
    <div class="navbar-header"><a class="navbar-brand">Cineflow</a></div>
  </div>
  <?php if($session->has_active_user()): ?>
  <form class="navbar-form navbar-right">
    <div class="form-group">
      <input type="search" name="search" class="form-control" placeholder="Search Title, Person or Genre">

    </div>
  </form>
  <ul class="nav navbar-nav navbar-right">
    <li>Notiications</li>
    <li>Account</li>
  </ul>
    <? else: ?>
  <ul class="nav navbar-nav navbar-right">
    <li>Login</li>
  </ul>
<?php endif; ?>
</nab>
