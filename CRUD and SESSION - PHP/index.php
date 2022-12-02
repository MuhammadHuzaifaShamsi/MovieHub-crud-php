<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "links.php";
    ?>
    <title>Main Page | MovieHub</title>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img style="margin-left: 30px;" src="profile-img.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                MovieHub
            </a>
            <h2>
              <?php
                  session_start();
                  if(isset($_SESSION['name'])){
                    echo $_SESSION['name'];
                    }
              ?>
            </h2>
        <button class="btn btn-outline-success" style="margin-right: 30px;" name="logout" type="submit">LOGOUT</button>
        </div>
    </nav>


    <ol class="list-group list-group-numbered m-5">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Avengers: Endgame</div>
    </div>
    <span class="badge bg-primary rounded-pill">20</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Avatar</div>
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Avengers: Infinity War</div>
    </div>
    <span class="badge bg-primary rounded-pill">12</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Justice League</div>
    </div>
    <span class="badge bg-primary rounded-pill">10</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Batman: The Dark Knight</div>
    </div>
    <span class="badge bg-primary rounded-pill">9</span>
  </li>
</ol>
</body>

</html>



