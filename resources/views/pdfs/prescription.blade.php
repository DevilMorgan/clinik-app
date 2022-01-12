<!DOCTYPE html>

<html lang="es">
<?php
//dd($prescriptionPdf);
$nombreImagen = "../public/img/logo/clinikapp-logo.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <style>
        /* Tablas Y Secciones*/
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
        .celda_medicamento {
            border: 1px solid black;
            background: #dddada;
            vertical-align: middle;
            text-align: center;
            padding: .3em;
        }
        /* Títulos */
        .title_section {
            font-family: 'Helvetica';
            font-size: 12px;
            padding: .2em;
            margin: 0;
        }
        .title_medicamento {
            font-family: 'Helvetica';
            font-size: 10px;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }
        /* Textos */
        .txt {
            font-family: 'Helvetica';
            font-size: 11px;
            padding-left: 3px;
            margin: 0;
        }
        .txt_medicamento {
            font-family: 'Helvetica';
            font-size: 9px;
            padding: .5em .3em;
            margin: 0;
        }
        .txt_firma {
            font-family: 'Helvetica';
            font-size: 11px;
            text-align: center;
            margin: 20px 0 0 0;
        }
        .txt_posicionado{
            font-family: 'Helvetica';
            font-size: 11px;
            position: absolute;
            right: 0;
            padding-right: 5px;
        }
        .txt_center {
            text-align: center;
        }
        /* Línea de división y bordes */
        .line_hr {
            padding: 0;
            margin: 1px 0 ;
        }
        .border {
            border: 1px solid black;
        }
    </style>
</head>

<body>
<table class="table_main" cellspacing="0" cellpadding="0"> <!-- Encabezado de la tabla -->
    <tr>
        <td>
            <img src="<?php echo $imagenBase64 ?>" >
        </td>
        <td width="25%">
            <h4>FÓRMULA MÉDICA</h4>
        </td>
        <td width="35%">
            <table class="table_main" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="border">
                        <h5 class="txt">Fecha y Hora de Expedición (AAAA-MM-DD)</h5>
                        <hr class="line_hr">
                        <p class="txt">{{ date('Y-m-d h:i:s A', strtotime($prescriptionPdf->created_at)) }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5 class="txt">Nro. Prescripción</h5>
                        <hr class="line_hr">
                        <p class="txt">{{ $prescriptionPdf->reference }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div>
    <!-- Datos del Prestador -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="2">
                <h4 class="title_section">DATOS DEL PRESTADOR</h4>
            </th>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Nombre Prestador del Servicio de Salud:</h5>
                <p class="txt">{{ $config['NAME']->config_data->value }}</p>
            </td>

            <td width="50%" class="border">
                <h5 class="txt">Documento de Identificación:</h5>
                <p class="txt">{{ $config['ID_CARD']->config_data->value }}</p>
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Dirección:</h5>
                <p class="txt"> {{ $record->surgery->clinic-> }}</p>
            </td>
            <td width="50%" class="border">
                <h5 class="txt">Teléfono:</h5>
                <p class="txt">{{ $record->surgery->clinic->phone . '-' . $record->surgery->clinic->cellphone }}</p>
            </td>
        </tr>
    </table>

    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Código Habilitación:</h5>
                <p class="txt">{{ $record->surgery->number }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Departamento:</h5>
                <p class="txt">{{ $record->surgery->clinic->department }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Municipio:</h5>
                <p class="txt">{{ $record->surgery->clinic->city }}</p>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Datos del Paciente -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="3">
                <h4 class="title_section">DATOS PACIENTE</h4>
            </th>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Documento de Identificación:</h5>
                <p class="txt">{{ $record->patient->id_card }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Nombres:</h5>
                <p class="txt">{{ $record->patient->name }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Apellidos:</h5>
                <p class="txt">{{ $record->patient->last_name }}</p>
            </td>
        </tr>
    </table>

    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Número Historia Clínica:</h5>
                <p class="txt">{{ $record->reference }}</p>
            </td>

            <td width="50%" class="border">
                <h5 class="txt">Diagnostico Principal:</h5>
                <p class="txt">{{ "{$record->diagnosis->code} {$record->diagnosis->description}" }}</p>
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Usuario Régimen:</h5>
                <p class="txt">{{ $record->basic_information->patient_contributory_regime }}</p>
            </td>

            <td width="50%" class="border">
                <h5 class="txt">Ámbito Atención:</h5>
                <p class="txt">?HOSPITALARIO - INTERNACIÓN?</p>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Medicamentos -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="9">
                <h4 class="title_section">MEDICAMENTOS</h4>
            </th>
        </tr>

        <tr>
            <td width="6%" class="celda_medicamento">
                <span class="title_medicamento">No. Entregas</span>
            </td>

            <td width="14%" class="celda_medicamento">
                <span class="title_medicamento">Nombre Medicamento/ Forma Farmacéutica</span>
            </td>

            <td width="6%" class="celda_medicamento">
                <span class="title_medicamento">Dosis</span>
            </td>

            <td width="10%" class="celda_medicamento">
                <span class="title_medicamento">Vía Administración</span>
            </td>

            <td width="10%" class="celda_medicamento">
                <span class="title_medicamento">Frecuencia Administración</span>
            </td>

            <td width="10%" class="celda_medicamento">
                <span class="title_medicamento">Indicaciones Específicas</span>
            </td>

            <td width="10%" class="celda_medicamento">
                <span class="title_medicamento">Duración Tratamiento (Días)</span>
            </td>

            <td width="10%" class="celda_medicamento">
                <span class="title_medicamento">Recomendaciones</span>
            </td>

            <td width="14%" class="celda_medicamento">
                <span class="title_medicamento">Cantidades Farmacéuticas Nro./ Letras/ Unidades Farmacéuticas</span>
            </td>
        </tr>
        @foreach($prescription as $item)
            <tr>
                <td width="6%" class="border">
                    <p class="txt_medicamento txt_center">{{ $item->delivery }}</p>
                </td>

                <td width="14%" class="border">
                    <p class="txt_medicamento">{{ "{$item->name}" }}</p>
                </td>

                <td width="6%" class="border">
                    <p class="txt_medicamento txt_center">{{ $item->dose }}</p>
                </td>

                <td width="10%" class="border">
                    <p class="txt_medicamento">{{ $item->via_administration }}</p>
                </td>

                <td width="10%" class="border">
                    <p class="txt_medicamento txt_center">{{ $item->frequency }} HORA(S)</p>
                </td>

                <td width="10%" class="border">
                    <p class="txt_medicamento">{{ $item->indications }}</p>
                </td>

                <td width="10%" class="border">
                    <p class="txt_medicamento txt_center">{{ $item->duration }} DÍA(S)</p>
                </td>

                <td width="10%" class="border">
                    <p class="txt_medicamento">{{ $item->recommendations }}</p>
                </td>

                <td width="14%" class="border">
                    <p class="txt_medicamento">{{ $item->pharmaceutical_quantity }}</p>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div> <!-- Profesional Tratante -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="2">
                <h4 class="title_section">PROFESIONAL TRATANTE</h4>
            </th>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Documento de Identificación:</h5>
                <p class="txt">{{ "{$record->user->card_type->name_short} {$record->user->id_card}" }}</p>
            </td>

            <td width="50%" class="border">
                <h5 class="txt">Nombre:</h5>
                <p class="txt">{{ "{$record->user->name} {$record->user->last_name}" }}</p>
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Registro Profesional:</h5>
                <p class="txt">{{ $record->user->code_profession }}</p>
            </td>

            <td rowspan="2" width="50%" class="border">
                <p class="txt_firma">Firma - Firma Electrónica</p>
                <hr class="line_hr">
                {{--                        <span class="txt">CodVer</span><span class="txt_posicionado">1234265343843834</span>--}}
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Especialidad:</h5>
                <p class="txt">{{ $record->user->profession }}</p>
            </td>
        </tr>
    </table>
</div>

<p class="txt">La vigencia de la prescripción es la establecida en la Resolución 1885 de 2018.Art. 13. Numeral 5.</p>
<p class="txt txt_center">
    Esata orden tiene validez por treinta (30) días calendario, contados a partir de la fecha de expedición <br>
    Los medicamentos NO incluidos en el Plan Obligatorio de Salud - POS, deben ser cancelados en su totalidad por el usuario. <br>
    <b>ORIGINAL</b>
</p>
</body>
</html>
