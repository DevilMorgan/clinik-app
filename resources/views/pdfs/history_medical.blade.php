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
        .line_hr2 {
            padding: 0;
            margin: 2px 0;
            background: #297589;
            height: 10px;
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
            <h4>HISTORIA MÉDICA</h4>
        </td>
        <td width="35%">
            <table class="table_main" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="border">
                        <h5 class="txt">Fecha y Hora de Expedición (AAAA-MM-DD)</h5>
                        <hr class="line_hr">
                        <p class="txt"> {{ $historyPdf->reference }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5 class="txt">Referencia No.</h5>
                        <hr class="line_hr">
                        <p class="txt">{{ date('Y-m-d h:i:s A', strtotime($historyPdf->created_at)) }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

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
                <p class="txt">
                    {{ $record->basic_information->patient_card_type->name_short }}
                    {{ $record->basic_information->patient_id_card }}
                </p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Nombres:</h5>
                <p class="txt">{{ $record->patient->name }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Apellidos:</h5>
                <p class="txt">{{ $record->patient->last_name }}</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Fecha de Nacimiento:</h5>
                <p class="txt">{{ $record->patient->date_birth }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Lugar de Nacimiento:</h5>
                <p class="txt">{{ $record->patient->place_birth }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Genero:</h5>
                <p class="txt">{{ __('trans.' . $record->patient->gender) }}</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="boder">
                <h5 class="txt">Grupo Sanguineo y RH:</h5>
                <p class="txt">{{ $record->patient->blood_group }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Ocupación:</h5>
                <p class="txt">{{ $record->basic_information->patient_occupation }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Estado Civil:</h5>
                <p class="txt">{{ __('trans.' . $record->basic_information->patient_marital_status) }}</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Correo Electrónico:</h5>
                <p class="txt">{{ $record->basic_information->patient_email }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Teléfono Celular:</h5>
                <p class="txt">{{ $record->basic_information->patient_cellphone }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Teléfono Fijo:</h5>
                <p class="txt">{{ $record->basic_information->patient_phone }}</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Departamento:</h5>
                <p class="txt">{{ $record->basic_information->patient_department }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Ciudad o Municipio:</h5>
                <p class="txt">{{ $record->basic_information->patient_city }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Dirección de Residencia:</h5>
                <p class="txt">{{ $record->basic_information->patient_address }}</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Entidad Médica:</h5>
                <p class="txt">{{ $record->basic_information->patient_entity }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Regimen Contributivo:</h5>
                <p class="txt">{{ $record->basic_information->patient_contributory_regime }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Estado Medico:</h5>
                <p class="txt">{{ $record->basic_information->patient_status_medical }}</p>
            </td>
        </tr>
    </table>
</div>

@if(!empty($record->basic_information->responsable_name))
    <div> <!-- Datos del acompañante -->
        <table class="table_main" cellspacing="0" cellpadding="0">
            <tr>
                <th colspan="3">
                    <h4 class="title_section">DATOS DEL ACOMPAÑANTE</h4>
                </th>
            </tr>

            <tr>
                <td width="33%" class="border">
                    <h5 class="txt">Nombres:</h5>
                    <p class="txt">{{ $record->basic_information->responsable_name }}</p>
                </td>

                <td width="33%" class="border">
                    <h5 class="txt">Apellidos:</h5>
                    <p class="txt">{{ $record->basic_information->responsable_last_name }}</p>
                </td>

                <td width="34%" class="border">
                    <h5 class="txt">Parentesco:</h5>
                    <p class="txt">{{ $record->basic_information->responsable_relationship }}</p>
                </td>
            </tr>

            <tr>
                <td width="33%" class="border">
                    <h5 class="txt">Número de Identificación:</h5>
                    <p class="txt">
                        {{ $record->basic_information->responsable_card_type->name_short }}
                        {{ $record->basic_information->responsable_id_card }}
                    </p>
                </td>

                <td width="33%" class="border">
                    <h5 class="txt">Teléfono Celular:</h5>
                    <p class="txt">
                        {{ $record->basic_information->responsable_cellphone }}
                    </p>
                </td>

                <td width="34%" class="border">
                    <h5 class="txt">Correo Electrónico:</h5>
                    <p class="txt">
                        {{ $record->basic_information->responsable_email }}
                    </p>
                </td>
            </tr>

            <tr>
                <td width="33%" class="border">
                    <h5 class="txt">Departamento:</h5>
                    <p class="txt">{{ $record->basic_information->responsable_department }}</p>
                </td>

                <td width="33%" class="border">
                    <h5 class="txt">Ciudad o Municipio:</h5>
                    <p class="txt">{{ $record->basic_information->responsable_city }}</p>
                </td>

                <td width="34%" class="border">
                    <h5 class="txt">Dirección de Residencia:</h5>
                    <p class="txt">{{ $record->basic_information->responsable_address }}</p>
                </td>
            </tr>
        </table>
    </div>
@endif
<div> <!-- Consulta -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="3">
                <h4 class="title_section">CONSULTA</h4>
            </th>
        </tr>

        <tr>
            <td class="border">
                <h5 class="txt">Número Historia Clínica:</h5>
                <p class="txt">{{ $record->reference }}</p>
            </td>

            <td colspan="2" class="border">
                <h5 class="txt">Ámbito Atención:</h5>
                <p class="txt">?HOSPITALARIO - INTERNACIÓN?</p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Nombre Entidad Aseguradora:</h5>
                <p class="txt">{{ $config['NAME']->config_data->value }}</p>
            </td>

            <td class="border">
                <h5 class="txt">Consultorio:</h5>
                <p class="txt">{{ "{$record->sugery->number}-{$record->sugery->type}" }}</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Departamento:</h5>
                <p class="txt">{{ $record->sugery->clinic->department }}</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Ciudad o Municipio:</h5>
                <p class="txt">{{ $record->sugery->clinic->city }}</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Dirección de Residencia:</h5>
                <p class="txt">{{ $record->sugery->clinic->address }}</p>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Categoria 1 -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="2">
                <h4 class="title_section">CATEGORIA 1</h4>
            </th>
        </tr>

        <tr>
            <td class="border">
                <h5 class="txt">Número de Consulta (Númerico):</h5>
                <p class="txt">20210519 24687598 00025</p>
            </td>

            <td class="border">
                <h5 class="txt" >Clasificación del Triage (Rango):</h5>
                <span class="txt">3</span>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Motivo de la Consulta (Texto corto):</h5>
                <p class="txt">
                    Sintomas que hacen que el paciente consulte por primera vez escrito en una palabra o frase corta, empleando para ello el término
                    semiológico adecuado. Las palabras coloquiales usadas por el paciente se emplearán encerradas en comillas.
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Antecedentes Personales (Texto)</h5>
                <p class="txt">
                    Sintomas previos, complicaciones, intervensiones y enfermedades propias del paciente o heredada de algun familiar.
                    Medicaciones y tratamientos.
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Alergias e intolerancias (Listas):</h5>
                <ul class="" style="padding: 3px 0 5px 15px; margin: 0">
                    <li class="txt">Lactosa</li>
                    <li class="txt">Maní</li>
                    <li class="txt">Naproxeno (medicamento)</li>
                </ul>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <h5 class="txt" style="margin-bottom: 2px">Hábitos Cotidianos (Booleano)</h5>

                <span class="txt" style="font-weight: bold">Realiza deporte (booleano):</span>
                <span class="txt">SI</span>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <span class="txt" style="font-weight: bold">Realiza Dietas (booleano):</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <span class="txt" style="font-weight: bold">Consumo de Tabaco (booleano):</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <span class="txt" style="font-weight: bold">Consumo de Bebidas Alcoholicas (booleano):</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <span class="txt" style="font-weight: bold">Consumo de alusinogenos (booleano):</span>
                <span class="txt">NO</span>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Seccion adicional -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="3">
                <h4 class="title_section">CATEGORIA 2</h4>
            </th>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Padecimiento (Texto):</h5>
                <p class="txt">Descripción de la afeccción o dolor del paciente</p>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Sintomas (Listas):</h5>
                <ul class="" style="padding: 3px 0 5px 15px; margin: 0">
                    <li class="txt">Fiebre</li>
                    <li class="txt">Dolor de Cabeza</li>
                    <li class="txt">Dolor Muscular</li>
                    <li class="txt">Dolor de Articulaciones</li>
                    <li class="txt">Visión Borrosa</li>
                    <li class="txt">Escalofrio</li>
                </ul>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Temperatura (°C) (Númerico):</h5>
                <p class="txt">36</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Peso (Kg) (Númerico):</h5>
                <p class="txt">80</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Estatura (Mts) (Númerico):</h5>
                <p class="txt">1.75</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Presión Arterial (mm/Hg) (Númerico):</h5>
                <p class="txt">120/80</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Ritmo Cardiaco (lat/min) (Númerico):</h5>
                <p class="txt">70</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Frecuencia Respiratoria (Rpm) (Númerico):</h5>
                <p class="txt">120/80</p>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Auscultación Pulmonar (Texto corto):</h5>
                <p class="txt">Descripción de los ruidos respiratorios.</p>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <h5 class="txt" style="margin-bottom: 2px">Causas o Sintomas Aleatorios (Booleano)</h5>

                <span class="txt" style="font-weight: bold">A sufrido algun golpe recientemente (booleano).</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <span class="txt" style="font-weight: bold">A tenido contacto con un positivo por covid-19 (booleano).</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <span class="txt" style="font-weight: bold">A tenido nauseas o mareos en los ultimos días (booleano).</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Observaciones (Texto):</h5>
                <p class="txt">Descripción del estado del paciente.</p>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Recomendaciones (Texto):</h5>
                <p class="txt">Descripción de la recomendaciones hechas por el médico.</p>
            </td>
        </tr>

        <tr>  <!-- División de las secciones adicionales -->
            <td colspan="3">
                <hr class="line_hr2">
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Padecimiento (Texto):</h5>
                <p class="txt">Descripción de la afeccción o dolor del paciente</p>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Sintomas (Listas):</h5>
                <ul class="" style="padding: 3px 0 5px 15px; margin: 0">
                    <li class="txt">Fiebre</li>
                    <li class="txt">Dolor de Cabeza</li>
                    <li class="txt">Dolor Muscular</li>
                    <li class="txt">Dolor de Articulaciones</li>
                    <li class="txt">Visión Borrosa</li>
                    <li class="txt">Escalofrio</li>
                </ul>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Temperatura (°C) (Númerico):</h5>
                <p class="txt">36</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Peso (Kg) (Númerico):</h5>
                <p class="txt">80</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Estatura (Mts) (Númerico):</h5>
                <p class="txt">1.75</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Presión Arterial (mm/Hg) (Númerico):</h5>
                <p class="txt">120/80</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Ritmo Cardiaco (lat/min) (Númerico):</h5>
                <p class="txt">70</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Frecuencia Respiratoria (Rpm) (Númerico):</h5>
                <p class="txt">120/80</p>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Auscultación Pulmonar (Texto corto):</h5>
                <p class="txt">Descripción de los ruidos respiratorios.</p>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <h5 class="txt" style="margin-bottom: 2px">Causas o Sintomas Aleatorios (Booleano)</h5>

                <span class="txt" style="font-weight: bold">A sufrido algun golpe recientemente (booleano).</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <span class="txt" style="font-weight: bold">A tenido contacto con un positivo por covid-19 (booleano).</span>
                <span class="txt">NO</span>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <span class="txt" style="font-weight: bold">A tenido nauseas o mareos en los ultimos días (booleano).</span>
                <span class="txt">SI</span>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Observaciones (Texto):</h5>
                <p class="txt">Descripción del estado del paciente.</p>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="border">
                <h5 class="txt">Recomendaciones (Texto):</h5>
                <p class="txt">Descripción de la recomendaciones hechas por el médico.</p>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Diagnostico -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="2">
                <h4 class="title_section">DIAGNOSTICO</h4>
            </th>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Diagnostico:</h5>
                <p class="txt">{{ "{$record->diagnosis->code}-{$record->diagnosis->description}" }}</p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Diagnostico 1 (opcional):</h5>
                <p class="txt">{{ "{$record->diagnosis->code_optional_one}-{$record->diagnosis->description_optional_one}" }}</p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Diagnostico 2 (opcional):</h5>
                <p class="txt">{{ "{$record->diagnosis->code_optional_two}-{$record->diagnosis->description_optional_two}" }}</p>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="border">
                <h5 class="txt">Resumen:</h5>
                <p class="txt">{{ $record->diagnosis->abstract }}</p>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Procedimiento -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="3">
                <h4 class="title_section">PROCEDIMIENTO</h4>
            </th>
        </tr>

        @if(isset($procedure))
            @foreach($procedure as $item)
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;">
                        <p class="txt">{{ $item->code }}</p>
                    </td>

                    <td style="border: 1px solid black;">
                        <p class="txt">{{ $item->amount }}</p>
                    </td>

                    <td style="border: 1px solid black;">
                        <p class="txt">{{ $item->description }}</p>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>

<div> <!-- Medicamentos -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="9">
                <h4 class="title_section">PRESCRIPCIÓN MÉDICA</h4>
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

        @if(isset($prescription))
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
        @endif
    </table>
</div>

@if(isset($days_off))
    <div> <!-- Incapacidad -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="3">
                <h4 class="title_section">INCAPACIDAD</h4>
            </th>
        </tr>

        <td class="border">
            <h5 class="txt" >Días de Incapacidad:</h5>
            <span class="txt">{{ $days_off->days_off }}</span>
        </td>

        <td class="border">
            <h5 class="txt" >Fecha Inicio de Incapacidad:</h5>
            <span class="txt">{{ date('Y-m-d') }}</span>
        </td>

        <td class="border">
            <h5 class="txt" >Fecha Fin de Incapacidad:</h5>
            <span class="txt">{{ date('Y-m-d', strtotime(date('Y-m-d') . "+ {$days_off->days_off} days")) }}</span>
        </td>
    </table>
</div>
@endif
<!-- Datos del Prestador -->
<div>
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="2">
                <h4 class="title_section">DATOS DEL PRESTADOR</h4>
            </th>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Nombre Prestador del Servicio de Salud:</h5>
                <p class="txt">CLÍNICA LA MILAGROSA S.A</p>
            </td>

            <td width="50%" class="border">
                <h5 class="txt">Documento de Identificación:</h5>
                <p class="txt">8000067515</p>
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Dirección:</h5>
                <p class="txt"> CALLE 22 # 13A - 09</p>
            </td>

            <td width="33%" class="border">
                <h5 class="txt">Código Habilitación:</h5>
                <p class="txt">470010043501</p>
            </td>
        </tr>

        <tr>
            <td width="33%" class="border">
                <h5 class="txt">Departamento:</h5>
                <p class="txt">MAGDALENA</p>
            </td>

            <td width="34%" class="border">
                <h5 class="txt">Municipio:</h5>
                <p class="txt">SANTA MARTA</p>
            </td>
        </tr>
    </table>
</div>

<div> <!-- Convenio -->
    <table class="table_main" cellspacing="0" cellpadding="0">
        <tr>
            <th colspan="2">
                <h4 class="title_section">CONVENIO</h4>
            </th>
        </tr>

        <tr>
            <td width="30%" class="border">
                <h5 class="txt">Código:</h5>
                <p class="txt">0240</p>
            </td>

            <td width="70%" class="border">
                <h5 class="txt">Nombre Institución:</h5>
                <p class="txt">EPS SALUD TOTAL (VIRREY SOLIS)</p>
            </td>
        </tr>
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
                <p class="txt">C.C 25467349</p>
            </td>

            <td width="50%" class="border">
                <h5 class="txt">Nombre:</h5>
                <p class="txt">JOSE GREGORIO ALDEMAR</p>
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Registro Profesional:</h5>
                <p class="txt">47158B</p>
            </td>

            <td rowspan="2" width="50%" class="border">
                <p class="txt_firma">Firma - Firma Electrónica</p>
                <hr class="line_hr">
                <span class="txt">CodVer</span><span class="txt_posicionado">1234265343843834</span>
            </td>
        </tr>

        <tr>
            <td width="50%" class="border">
                <h5 class="txt">Especialidad:</h5>
                <p class="txt">MÉDICO GENERAL</p>
            </td>
        </tr>
    </table>
</div>

<p class="txt txt_center" style="margin-top: 5px;">
    <b>ORIGINAL</b>
</p>

<script>
    // if (isset($pdf)) {
    //     $font = Font_Metrics::get_font("Arial", "bold");
    //     // $pdf->page_text(765, 550, "Pagina {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0, 0, 0));
    //     $dompdf->page_text(1,1, "{PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
    // }
</script>
</body>
</html>
