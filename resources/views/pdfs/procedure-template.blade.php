<!DOCTYPE html>

<html lang="es">
<?php
$nombreImagen = "../public/img/logo/clinikapp-logo.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
//dd($record->agreement);
?>
@php
    $responsable = $record->agreement ?? null;
@endphp
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <style>
        .table_main {
            border: 1px solid black;
            width: 100%;
            padding: 0;
            margin: 0;
        }
        .table_main tr > th {
            border: 1px solid black;
            background: #cecece;
            text-align: center;
        }
        .cell_row {
            border: 1px solid black;
            width: 50%;
            margin: 0;
            padding: 0;
        }
        .cell_table {
            background: #dddada;
            vertical-align: middle;
            text-align: center;
        }
        /* Títulos */
        .title_section {
            font-family: 'Helvetica';
            font-size: 12px;
            padding: 2px;
            margin: 0;
        }
        /* Textos */
        .txt{
            font-family: 'Helvetica';
            font-size: 12px;
            vertical-align: middle;
            padding-left: 1.5px;
            margin: 0;
        }
        .title_subTable {
            border: 1px solid black;
            font-family: 'Helvetica';
            font-size: 12px;
            font-weight: bold;
            padding: .3em;
            margin: 0;
        }
        .txt_posicionado {
            font-family: 'Helvetica';
            font-size: 12px;
            position: absolute;
            right: 0;
            padding-right: 5px;
            top: 10px;
        }
        .txt_situado {
            position: absolute;
            right: 0;
            padding-top: 2px;
            padding-right: 3px;
        }
        .txt_center {
            text-align: center;
        }
        .txt_firma {
            font-family: 'Helvetica';
            font-size: 11px;
            text-align: center;
            margin: 0;
        }
        /* Línea de división */
        .line_hr {
            width: 95%;
            padding: 0;
            margin-top: 50px;
            margin-right: auto;
            margin-bottom: 0;
            margin-left: auto;
        }
    </style>
</head>

<body>
<table class="table_main" cellspacing="0" cellpadding="0"> <!-- Encabezado de la tabla -->
    <thead>
    <tr>
        <td width="50%">
            <img src="<?php echo $imagenBase64 ?>">
        </td>

        <td width="50%">
            <h2 style="text-align: center; font-family: 'Helvetica';">No. </h2>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <h4 class="txt_center" style="margin: 8px 0;">AUTORIZACIÓN PROCEDIMIENTOS UNIDADES</h4>
            <span class="txt_posicionado">Página 1</span>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Número Autorización:</b> <br></p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">Fecha y Hora:</b> <br></p>
        </td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <!-- ENTIDAD RESPONSABLE DEL PAGO -->
        <th colspan="2">
            <h4 class="title_section">ENTIDAD RESPONSABLE DEL PAGO</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Nombre:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Código:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr> <!-- INFORMACIÓN DEL PRESTADOR -->
        <th colspan="2">
            <h4 class="title_section">INFORMACIÓN DEL PRESTADOR</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Nombre:</b> <br></p>
        </td>

        <td class="cell_row">
            <span class="txt"> <b class="txt">Nit:</b> <br></span>
{{--            <span class="txt txt_situado"> <b class="txt">Código:</b> ?110010952310?</span>--}}
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Dirección:</b> <br> </p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">Teléfono:</b> <br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Departamento:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Municipio:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr>
        <!-- DATOS DEL PACIENTE -->
        <th colspan="2">
            <h4 class="title_section">DATOS DEL PACIENTE</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Tipo Documento:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Documento:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Nombre:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Fecha de Nacimiento:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Dirección:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Teléfono:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Departamento:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Municipio:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Teléfono Celular:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Correo:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr> <!-- DATOS DE LA TRANSACCIÓN -->
        <th colspan="2">
            <h4 class="title_section txt_center">DATOS DE LA TRANSACCIÓN</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Tipo:</b> <br></p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">Régimen:</b> <br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Motivo:</b> <br></p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">Fecha Vencimiento:</b> <br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Diagnóstico:</b> <br></p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">Nap Anterior:</b> <br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Ubicación del Paciente:</b> <br></p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">No Solicitud:</b> <br></p>
        </td>
    </tr>
    </tbody>
</table>

<table class="table_main" cellspacing="0" cellpadding="0">
    <thead>
    <tr> <!-- SERVICIOS AUTORIZADOS -->
        <th colspan="3">
            <h4 class="title_section txt_center">SERVICIOS AUTORIZADOS</h4>
        </th>
    </tr>

    <tr class="cell_table">
        <td width="15%" class="title_subTable">Código</td>
        <td width="15%" class="title_subTable">Cantidad</td>
        <td width="70%" class="title_subTable">Detalle Transacción (Servicio)</td>
    </tr>
    </thead>

    <tbody>
    @for($i = 0; $i > 3; $i++)
        <tr>
            <td style="border: 1px solid black; padding: 1.5px;">
                <p class="txt"><br></p>
            </td>

            <td style="border: 1px solid black;">
                <p class="txt"><br></p>
            </td>

            <td style="border: 1px solid black;">
                <p class="txt"><br></p>
            </td>
        </tr>
    @endfor
    </tbody>
</table>

<table class="table_main" cellspacing="0" cellpadding="0"> <!-- Pagos Compartidos -->
    <tbody>
    <tr>
        <!-- PAGOS COMPARTIDOS -->
        <th colspan="2">
            <h4 class="title_section">PAGOS COMPARTIDOS</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row">
            <p class="txt">
                <b class="txt">Tipo de Recaudo:</b>
                <br>
            </p>
        </td>

        <td class="cell_row">
            <p class="txt">
                <b class="txt">Valor:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Semanas Cotizadas:</b> <br></p>
        </td>

        <td class="cell_row"></td>
    </tr>

    <tr> <!-- INFORMACIÓN DE LA PERSONA QUE AUTORIZA -->
        <th colspan="2">
            <h4 class="title_section">INFORMACIÓN DE LA PERSONA QUE AUTORIZA</h4>
        </th>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Nombre:</b> <br></p>
        </td>

        <td class="cell_row" rowspan="4">
            <hr class="line_hr">
            <p class="txt_firma">Firma - Firma Electrónica</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Cargo o Actividad:</b><br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Teléfono:</b><br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Teléfono Celular:</b><br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Ips que Prescribe :</b> <br></p>
        </td>

        <td class="cell_row">
            <p class="txt"> <b class="txt">Teléfono:</b><br></p>
        </td>
    </tr>

    <tr>
        <td class="cell_row">
            <p class="txt"> <b class="txt">Dirección:</b> <br></p>
        </td>

        <td class="cell_row"></td>
    </tr>

    <tr> <!-- OBSERVACIONES -->
        <th colspan="2">
            <h4 class="title_section">OBSERVACIONES</h4>
        </th>
    </tr>

    <tr>
        <td colspan="2">
            <p class="txt">Señor Usuario no sobreescribir ni enmendar este documento.</p>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
