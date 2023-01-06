<?=$header;?>

<div class="container"><br/>
    <div class="row">
        <div class="col-lg-10">
            <h2>Codeigniter 4 CRUD Ajax </h2>
        </div>
        <div class="col-lg-2">
            
        </div>
    </div>
 
    <table class="table table-bordered table-striped" id="indicadorTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Indicador</th>
                <th>Código</th>
                <th>Unidad de medida</th>
                <th>Valor</th>
                <th>Fecha</th>
                <th>Hora</th>                 
                <th>Origen</th>
                <th>Acciones</th>
            </tr>
        </thead>  
        <tbody>
       <?php
        foreach($indicadores_detail as $row){
        ?>
        <tr id="<?php echo $row['id']; ?>">
            <td><?=$row['id'];?></td>
            <td><?=$row['nombreIndicador'];?></td>
            <td><?=$row['codigoIndicador'];?></td>
            <td><?=$row['unidadMedidaIndicador'];?></td>
            <td><?=$row['valorIndicador'];?></td>
            <td><?=$row['fechaIndicador'];?></td>
            <td><?=$row['tiempoIndicador'];?></td>
            <td><?=$row['origenIndicador'];?></td>
            <td>
            <a data-id="<?php echo $row['id']; ?>" class="btn btn-primary btnEdit">Editar</a>
            <a data-id="<?php echo $row['id']; ?>" class="btn btn-danger btnDelete">Eliminar</a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addIndicador" name="addIndicador" action="<?php echo site_url('indicadores/store');?>" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNombre">Nombre Indicador:</label>
                        <input type="text" class="form-control" id="txtNombre" placeholder="Nombre" name="txtNombre">
                    </div>
                    <div class="form-group">
                        <label for="txtCodigo">Código:</label>
                        <input type="text" class="form-control" id="txtCodigo" placeholder="Código" name="txtCodigo">
                    </div>
                    <div class="form-group">
                        <label for="txtUnidad">Unidad de medida:</label>
                        <input type="text" class="form-control" id="txtUnidad" placeholder="Enter Last Name" name="txtUnidad">
                    </div>
                    <div class="form-group">
                        <label for="txtValor">Valor:</label>
                        <input type="number" step="any" class="form-control" id="txtValor" placeholder="Valor" name="txtValor">
                    </div>
                    <div class="form-group">
                        <label for="txtFecha">Fecha:</label>
                        <input type="date"  class="form-control" id="txtFecha" placeholder="Fecha" name="txtFecha">
                    </div>
                    <div class="form-group">
                        <label for="txtTiempo">Hora:</label>
                        <input type="text"  class="form-control" id="txtTiempo" placeholder="Hora" name="txtTiempo">
                    </div>
                    <div class="form-group">
                        <label for="txtOrigen">Origen:</label>
                        <input type="text" class="form-control" id="txtOrigen" placeholder="Origen" name="txtOrigen">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
            </div>
        </div>
    </div>
 
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Actualizar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateIndicador" name="updateIndicador" action="<?php echo site_url('indicadores/update');?>" method="post">
            <div class="modal-body">
                <input type="hidden" name="hdnIndicadorId" id="hdnIndicadorId"/>
                    <div class="form-group">
                        <label for="txtNombre">Nombre Indicador:</label>
                        <input type="text" class="form-control" id="txtNombre" placeholder="Nombre" name="txtNombre">
                    </div>
                    <div class="form-group">
                        <label for="txtCodigo">Código:</label>
                        <input type="text" class="form-control" id="txtCodigo" placeholder="Código" name="txtCodigo">
                    </div>
                    <div class="form-group">
                        <label for="txtUnidad">Unidad de medida:</label>
                        <input type="text" class="form-control" id="txtUnidad" placeholder="Enter Last Name" name="txtUnidad">
                    </div>
                    <div class="form-group">
                        <label for="txtValor">Valor:</label>
                        <input type="number" step="any" class="form-control" id="txtValor" placeholder="Valor" name="txtValor">
                    </div>
                    <div class="form-group">
                        <label for="txtFecha">Fecha:</label>
                        <input type="date"  class="form-control" id="txtFecha" placeholder="Fecha" name="txtFecha">
                    </div>
                    <div class="form-group">
                        <label for="txtTiempo">Hora:</label>
                        <input type="text"  class="form-control" id="txtTiempo" placeholder="Hora" name="txtTiempo">
                    </div>
                    <div class="form-group">
                        <label for="txtOrigen">Origen:</label>
                        <input type="text" class="form-control" id="txtOrigen" placeholder="Origen" name="txtOrigen">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
            </div>
        </div>
    </div>
 
</div>
 
<script>
$(document).ready(function () {
    $('#indicadorTable').DataTable();
 
    $("#addIndicador").validate({
        rules: {
            txtNombre: "required",
            txtCodigo: "required",
            txtUnidad: "required",
            txtValor:  "required",
            txtFecha: "required",
            txtTiempo: "required",
            txtOrigen: "required"
        },
        messages: {
        },
           
        submitHandler: function(form) {
            var form_action = $("#addIndicador").attr("action");
            $.ajax({
                data: $('#addIndicador').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    var indicador = '<tr id="'+res.data.id+'">';
                    indicador += '<td>' + res.data.id + '</td>';
                    indicador += '<td>' + res.data.nombreIndicador + '</td>';
                    indicador += '<td>' + res.data.codigoIndicador + '</td>';
                    indicador += '<td>' + res.data.unidadMedidaIndicador  + '</td>';
                    indicador += '<td>' + res.data.valorIndicador + '</td>';
                    indicador += '<td>' + res.data.fechaIndicador+ '</td>';
                    indicador += '<td>' + res.data.tiempoIndicador+ '</td>';
                    indicador += '<td>' + res.data.origenIndicador+ '</td>';
                    indicador += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Editar</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Eliminar</a></td>';
                    indicador += '</tr>';            
                    $('#indicadorTable tbody').prepend(indicador);
                    $('#addIndicador')[0].reset();
                    $('#addModal').modal('hide');
                },
                    error: function (data) {
                }
            });
        }
    });
 
    $('body').on('click', '.btnEdit', function () {
        var indicador_id = $(this).attr('data-id');
        $.ajax({
            url: 'indicadores/edit/'+indicador_id,
            type: "GET",
            dataType: 'json',
            success: function (res) {
                $('#updateModal').modal('show');
                $('#updateIndicador #hdnIndicadorId').val(res.data.id); 
                $('#updateIndicador #txtNombre').val(res.data.nombreIndicador);
                $('#updateIndicador #txtCodigo').val(res.data.codigoIndicador);
                $('#updateIndicador #txtUnidad').val(res.data.unidadMedidaIndicador);
                $('#updateIndicador #txtValor').val(res.data.valorIndicador);
                $('#updateIndicador #txtFecha').val(res.data.fechaIndicador);
                $('#updateIndicador #txtTiempo').val(res.data.tiempoIndicador);
                $('#updateIndicador #txtOrigen').val(res.data.origenIndicador);
            },
                error: function (data) {
            }
        });
    });
     
    $("#updateIndicador").validate({
        rules: {
            txtNombre: "required",
            txtCodigo: "required",
            txtUnidad: "required",
            txtValor:  "required",
            txtFecha: "required",
            txtTiempo: "required",
            txtOrigen: "required"
        },
            messages: {
        },
        submitHandler: function(form) {
            var form_action = $("#updateIndicador").attr("action");
            $.ajax({
                data: $('#updateIndicador').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    var indicador = '<td>' + res.data.id + '</td>';
                    indicador += '<td>' + res.data.nombreIndicador + '</td>';
                    indicador += '<td>' + res.data.codigoIndicador + '</td>';
                    indicador += '<td>' + res.data.unidadMedidaIndicador + '</td>';
                    indicador += '<td>' + res.data.valorIndicador + '</td>';
                    indicador += '<td>' + res.data.fechaIndicador + '</td>';
                    indicador += '<td>' + res.data.tiempoIndicador + '</td>';
                    indicador += '<td>' + res.data.origenIndicador + '</td>';
                    indicador += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Editar</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Eliminar</a></td>';
                    $('#indicadorTable tbody #'+ res.data.id).html(indicador);
                    $('#updateIndicador')[0].reset();
                    $('#updateModal').modal('hide');
                },
                    error: function (data) {
                }
            });
        }
    }); 
 
    $('body').on('click', '.btnDelete', function () {
        var indicador_id = $(this).attr('data-id');
        $.get('indicadores/delete/'+indicador_id, function (data) {
            $('#indicadorTable tbody #'+ indicador_id).remove();
        })
    });  
});   
</script>
<?=$footer;?>
