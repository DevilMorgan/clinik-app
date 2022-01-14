<!DOCTYPE html>

<html lang="es">
<?php
$nombreImagen = "../public/img/logo/clinikapp-logo.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
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
            width: 50%;
            margin: 0;
            padding: 0;
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
        .txt_posicionado {
            font-family: 'Helvetica';
            font-size: 12px;
            position: absolute;
            right: 0;
            padding-right: 5px;
            top: 10px;
        }
        .txt_center {
            text-align: center;
        }
        /* Bordes */
        .border {
            border: 1px solid black;
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
            <h4 class="txt_center" STYLE="margin: 8px 0;">INCAPACIDAD</h4>
            <span class="txt_posicionado">Página 1</span>
        </td>
    </tr>

    <tr>
        <td width="50%">
            <p class="txt"> <b class="txt">Fecha y Hora:</b> </p>
        </td>

        <td width="50%"></td>
    </tr>
    </thead>

    <tbody>
    <tr> <!-- ENTIDAD RESPONSABLE DEL PAGO -->
        <th colspan="2">
            <h4 class="title_section">ENTIDAD RESPONSABLE DEL PAGO</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Nombre:</b>
                <br>
            </p>
        </td>

        <td class="cell_row txt_center border">
            <p class="txt">
                <b class="txt">Código:</b>
                <br>
            </p>
        </td>
    </tr>

    <tr> <!-- DATOS DEL PACIENTE -->
        <th colspan="2">
            <h4 class="title_section">DATOS DEL PACIENTE</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Tipo de Documento:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Documento:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Nombre:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha de Nacimiento:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Dirección:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Teléfono:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Departamento:</b>

            </p>
        </td>

        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Municipio:</b>

            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Teléfono Celular:</b>

            </p>
        </td>

        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Email:</b>

            </p>
        </td>
    </tr>

    <tr> <!-- DATOS DE LA TRANSACCIÓN -->
        <th colspan="2">
            <h4 class="title_section">DATOS DE LA TRANSACCIÓN</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Tipo:</b> ?AMBULATORIA?</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Régimen:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Motivo:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha de Vencimiento:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Diagnóstico:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Nap Anterior:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Ubicación del Paciente:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">No Solicitud:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Origen del Servicio:</b> </p>
        </td>

        <td class="cell_row border"></td>
    </tr>

    <tr> <!-- DETALLE -->
        <th colspan="2">
            <h4 class="title_section txt_center">DETALLE</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row border" colspan="2" style="padding-left: 5px;">
            <span class="txt">PRESENTE ESTE FORMATO EN LA BARRA DE ATENCIÓN PARA QUE LE SEA EFECTUADA LA LIQUIDACIÓN CORRESPONDIENTE</span>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Días de Incapacidad:</b> </p>
        </td>

        <td class="cell_row border"></td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha Inicio Incapacidad:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt"></b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha Final Incapacidad:</b> </p>
        </td>

        <td class="cell_row border"></td>
    </tr>

    <tr> <!-- INFORMACIÓN DEL PRESCRIPTOR -->
        <th colspan="2">
            <h4 class="title_section txt_center">INFORMACIÓN DEL PRESCRIPTOR</h4>
        </th>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Nombre:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Celular:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Cargo o Actividad:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Teléfono Celular:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Ips que Prescribe:</b> </p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Teléfono:</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Dirección:</b> </p>
        </td>

        <td class="cell_row border"></td>
    </tr>

    <tr> <!-- OBSERVACIONES -->
        <th colspan="2">
            <h4 class="title_section txt_center">OBSERVACIONES</h4>
        </th>
    </tr>
    <tr>
        <td class="cell_row border" colspan="2" style="padding-left: 5px;">
            <span class="txt">ESTA INCAPACIDAD NO REQUIERE SER TRANSCRITA, POR LO TANTO, ES VÁLIDA PARA PRESENTAR AL EMPLEADOR, DE ACUERDO AL PARÁGRAFO 1 DEL DECRETO 2943 DE 2013.</span>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
