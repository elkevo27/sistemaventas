<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas | La Vecinita</title>
    <?php
    include_once '../includes/link.php';
    ?>
</head>

<body class="sb-nav-fixed">
    <?php
    include_once '../includes/header.php';
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Registro de Ventas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Ventas</li>
                </ol>

                <div class="content-invoice m-2">
                    <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate>
                        <div class="load-animate animated fadeInUp">

                            <input id="currency" type="hidden" value="$">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <h3>Distribuidora de Agua Splendor "La Vecinita"</h3>
                                    <h5>Vendedor</h5><?php echo $_SESSION['nombre']; ?><br>
                                    <h6>karolmilena@gmail.com</h6>
                                    <h6>09858742- 0986272565</h6><br>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                                    <h3>Datos del Cliente</h3>


                                    <div class="form-row">

                                        <div class="col">
                                            <?php
                                            $Object = new DateTime();

                                            $Object->setTimezone(new DateTimeZone('America/Guayaquil'));
                                            $DateAndTime = $Object->format("d-m-Y h:i: a");   ?>
                                            <label name="fecha"><?php echo ($DateAndTime); ?></label>
                                        </div>
                                        <div class="col">
                                            <input autofocus type="text" class="form-control input-medium ui-autocomplete-input mb-1" placeholder="Ruc - Cedula" autocomplete="off" id="curso" name="curso" value="">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control mb-1" id="usuarios" name="dni" placeholder="Nombre de Empresa" disabled require>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control mb-1" rows="2" id="nombres" name="direccion" placeholder="Su dirección" disabled require></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <table class="table table-bordered table-hover" id="invoiceItem">
                                        <tr>
                                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>

                                            <th width="38%">Nombre Producto</th>
                                            <th width="15%">Cantidad</th>
                                            <th width="15%">Precio</th>
                                            <th width="15%">Total</th>
                                        </tr>
                                        <tr>
                                            <td><input class="itemRow" type="checkbox"></td>
                                            <td><?php
                                                include("../conexion.php");
                                                $sql = "SELECT * FROM producto";
                                                $resultado = $mysqli->query($sql);
                                                ?>
                                                <?php while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                    <select name="productos" class="custom-select mb-1">
                                                        <option selected>Producto</option>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                                                    </select>
                                                <?php } ?>
                                            </td>
                                            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                            <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                            <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                                        </tr>
                                    </table>
                                    <div class="credito mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Credito</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Efectivo</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
                                    <button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <h3>Notas: </h3>
                                    <div class="form-group">
                                        <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Notas"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                                        <input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar Factura" class="btn btn-success submit_btn invoice-save-btm">
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-right: 5px;">
                                    <span class="form-inline">
                                        <div class="form-group">
                                            <label>Subtotal: &nbsp;</label>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text">$</div>
                                                <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Subtotal">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tasa Impuesto: &nbsp;</label>
                                            <div class="input-group mb-1">
                                                <input value="12" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tasa de Impuestos">
                                                <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Monto Inpuesto: &nbsp;</label>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text">$</div>
                                                <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Monto de Impuesto">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total: &nbsp;</label>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text">$</div>
                                                <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Total">
                                            </div>
                                        </div>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>
        </main>
        <?php
        include_once '../includes/footer.php';
        ?>
    </div>


    <script type="text/javascript">
        $(function() {
            $("#curso").autocomplete({
                source: "../admin/Personal.php",
                minLength: 2,
                select: function(event, ui) {
                    event.preventDefault();
                    $('#curso').val(ui.item.Nombres);
                    $('#usuarios').val(ui.item.usuarios);
                    $('#nombres').val(ui.item.nombres);
                    

                    $("#curso").focus();
                }
            });
        });
    </script>
    <!-- Custom styles for this template -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

</body>

</html>