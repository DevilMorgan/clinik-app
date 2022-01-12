<!DOCTYPE html>

<html lang="es">
<?php
$nombreImagen = "../public/img/logo/clinikapp-logo.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
?>
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
            <h2 style="text-align: center; font-family: 'Helvetica';">No. {{ $days_off->reference }}</h2>
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
            <p class="txt"> <b class="txt">Fecha y Hora:</b> {{ date('Y-m-d h:i:s A', strtotime($days_offPdf->created_at)) }}</p>
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
                {{ "{$responsable->name_agreement} " . ($responsable->second_name_agreement ?? '') . " " . ($responsable->firsth_lastname_agreement ?? '') . " " . ($responsable->second_lastname_agreement ?? '') . " "}}
            </p>
        </td>

        <td class="cell_row txt_center border">
            <p class="txt">
                <b class="txt">Código:</b>
                {{ $responsable->code_agreement ?? '' }}
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
            <p class="txt"> <b class="txt">Tipo de Documento:</b> {{ $record->basic_information->patient_card_type->name_short }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Documento:</b> {{ $record->patient->id_card }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Nombre:</b> {{ "{$record->patient->name} {$record->patient->last_name}" }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha de Nacimiento:</b> {{ $record->patient->date_birth }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Dirección:</b> {{ $record->basic_information->patient_address }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Teléfono:</b> {{ $record->basic_information->patient_phone }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Departamento:</b>
                {{ $config['DEPARTMENT']->config_data->value }}
            </p>
        </td>

        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Municipio:</b>
                {{ $config['CITY']->config_data->value }}
            </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Teléfono Celular:</b>
                {{ $record->basic_information->patient_cellphone }}
            </p>
        </td>

        <td class="cell_row border">
            <p class="txt">
                <b class="txt">Email:</b>
                {{ $record->basic_information->patient_email }}
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
            <p class="txt"> <b class="txt">Régimen:</b> {{ $record->basic_information->patient_contributory_regime }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Motivo:</b> ??</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha de Vencimiento:</b> ?29 ENE 1976?</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Diagnóstico:</b> {{ "{$record->diagnosis->code}-{$record->diagnosis->description}" }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Nap Anterior:</b> ?319882116974499?</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Ubicación del Paciente:</b> ?CONSULTA EXTERNA?</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">No Solicitud:</b> ??</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Origen del Servicio:</b> ?Otra?</p>
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
            <p class="txt"> <b class="txt">Días de Incapacidad:</b> {{ $days_off->days_off }}</p>
        </td>

        <td class="cell_row border"></td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha Inicio Incapacidad:</b> {{ date('Y-m-d') }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt"> PR - ?1374837?</b> </p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Fecha Final Incapacidad:</b> {{ date('Y-m-d', strtotime(date('Y-m-d') . "+ {$days_off->days_off} days")) }}</p>
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
            <p class="txt"> <b class="txt">Nombre:</b> {{ "{$record->user->name} {$record->user->last_name}" }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Celular:</b> {{ $record->user->cellphone }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Cargo o Actividad:</b> {{ $record->user->profession }}</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Teléfono Celular:</b> {{ $record->user->phone }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Ips que Prescribe:</b> ?VS AVENIDA LIBERTADORES?</p>
        </td>

        <td class="cell_row border">
            <p class="txt"> <b class="txt">Teléfono:</b> {{ $record->user->phone }}</p>
        </td>
    </tr>

    <tr>
        <td class="cell_row border">
            <p class="txt"> <b class="txt">Dirección:</b> {{ $config['ADDRESS']->config_data->value }}</p>
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
