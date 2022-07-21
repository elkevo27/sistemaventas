<?php

require '../conexion.php';
session_start();

if (!isset($_SESSION['id'])) {

  header("Location: ../index.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 1) {

  $where = "";
} else if ($tipo_usuario == 2) {

  $where = "WHERE id=$id";
}

$sql = "SELECT * FROM usuarios $where";
$resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Reportes - SB Admin</title>
  <?php
  include '../includes/link.php';
  ?>
</head>

<body class="sb-nav-fixed">

  <?php
  include '../includes/header.php';
  ?>

  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
          <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For
            more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
        </div>
        <div class="card mb-4">
          <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Nombre</th>
                    <th>Tipo Usuario</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Nombre</th>
                    <th>Tipo Usuario</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php while ($row = $resultado->fetch_assoc()) { ?>

                    <tr>
                      <td><?php echo $row['usuario']; ?></td>
                      <td><?php echo $row['password']; ?></td>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><?php echo $row['tipo_usuario']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php
    include '../includes/footer.php';
    ?>

  </div>


</body>

</html>