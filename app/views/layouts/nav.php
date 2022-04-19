<div class="container-fluid">
  <nav class="container navbar navbar-light bg-light">
    <ul class="nav">
      <a class="navbar-brand" href="#">Forum</a>
      <?php if (getUserSession()) : ?>
      <li class="nav-item">
        <a class="nav-link" href="/category/home">Categories</a>
      </li>
      <?php endif; ?>
    </ul>
    <ul class="nav ml-0 ">
      <?php if (getUserSession()) : ?>
        <li>
          <a class="nav-link" href="/home/welcome">Dashboard</a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome <?php echo getUserSession()->name   ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo URLROOT . 'user/logout' ?>">Logout</a>
          </div>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="/user/login">Login </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/user/register">Register</a>
        </li>

      <?php endif; ?>
    </ul>
  </nav>
</div>