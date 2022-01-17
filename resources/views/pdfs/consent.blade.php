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
                margin: 5px 0 0 0;
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
                    <h4>CONSENTIMIENTO</h4>
                </td>
                <td width="35%">
                    <table class="table_main" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="border">
                                <h5 class="txt">Fecha y Hora de Expedición</h5>
                                <hr class="line_hr">
                                <p class="txt"> {{ date('d-M/Y h:i a') }}</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5 class="txt">Referencia No.</h5>
                                <hr class="line_hr">
                                <p class="txt">{{ $document->reference }}</p>
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
                            {{ "{$document->record->basic_information->patient_card_type->name_short} {$document->record->basic_information->patient_id_card}" }}
                        </p>
                    </td>

                    <td width="77%" class="border" colspan="2">
                        <h5 class="txt">Nombre:</h5>
                        <p class="txt">
                            {{ $document->record->basic_information->full_name_patient }}
                        </p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Correo Electrónico:</h5>
                        <p class="txt">{{ $document->record->basic_information->patient_email }}</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Teléfono Celular:</h5>
                        <p class="txt">{{ $document->record->basic_information->patient_cellphone }}</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Teléfono Fijo:</h5>
                        <p class="txt">{{ $document->record->basic_information->patient_phone }}</p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Departamento:</h5>
                        <p class="txt">{{ $document->record->basic_information->patient_departament }}</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Ciudad o Municipio:</h5>
                        <p class="txt">{{ $document->record->basic_information->patient_city }}</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Dirección de Residencia:</h5>
                        <p class="txt">{{ $document->record->basic_information->patient_address }}</p>
                    </td>
                </tr>
            </table>
        </div>

        <div> <!-- Datos del Prestador -->
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
                        @php //dd($document) @endphp
                    </td>
                </tr>

                <tr>
                    <td width="50%" class="border">
                        <h5 class="txt">Dirección:</h5>
                        <p class="txt"> {{ $document->record->surgery->clinic->address }}</p>

                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Código Habilitación:</h5>
                        <p class="txt">{{ $document->record->surgery->number }} {{ $document->record->surgery->description }}</p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Departamento:</h5>
                        <p class="txt">{{ $document->record->surgery->clinic->department }}</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Municipio o ciudad:</h5>
                        <p class="txt">{{ $document->record->surgery->clinic->city }}</p>
                    </td>
                </tr>
            </table>
        </div>

        <div> <!-- Datos del Prestador -->
            {!! $document->consent->content !!}
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
                        <p class="txt">
                            {{ $document->record->user->card_type->name_short }} {{ $document->record->user->id_card }}
                        </p>
                    </td>

                    <td width="50%" class="border">
                        <h5 class="txt">Nombre:</h5>
                        <p class="txt">{{ "{$document->record->user->name} {$document->record->user->last_name}" }}</p>
                    </td>
                </tr>

                <tr>
                    <td width="50%" class="border">
                        <h5 class="txt">Registro Profesional:</h5>
                        <p class="txt">{{ $document->record->user->code_profession }}</p>
                    </td>

                    <td width="50%" class="border">
                        <h5 class="txt">Especialidad:</h5>
                        <p class="txt">{{ $document->record->user->profession }}</p>
                    </td>


                </tr>

                <tr >

                    <td width="50%" class="border" style="height: 100px; vertical-align: bottom !important;">
                        <img src="#" style="height: 60%; width: auto; margin-left: 10px;">
                        <p class="txt_firma">Firma - Especialista</p>
                    </td>

                    <td width="50%" class="border" style="height: 100px; vertical-align: bottom !important;">
                        <img src="{{ $image }}" style="height: 60%; width: auto; margin-left: 10px;">
                        <p class="txt_firma">Firma - Paciente</p>
                    </td>

                </tr>
            </table>
        </div>

        <p class="txt txt_center" style="margin-top: 5px;">
            <b>ORIGINAL</b>
        </p>
    </body>
</html>
