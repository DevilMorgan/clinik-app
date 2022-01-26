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

        <!-- Consulta -->
        <div>
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

                        <p class="txt">{{ "{$record->surgery->number}-{$record->surgery->type}" }}</p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Departamento:</h5>
                        <p class="txt">{{ $record->surgery->clinic->department }}</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Ciudad o Municipio:</h5>
                        <p class="txt">{{ $record->surgery->clinic->city }}</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Dirección de Residencia:</h5>
                        <p class="txt">{{ $record->surgery->clinic->address }}</p>
                    </td>
                </tr>
            </table>
        </div>
        <!--Categorías-->
        @php
            $categories = $record->history_medical_model->history_medical_categories;
        @endphp
        @foreach($categories as $key_category => $category)
            <div>
                <table class="table_main" cellspacing="0" cellpadding="0">

                    <tr>
                        <th colspan="2">
                            <h4 class="title_section">{{ $category->name }}</h4>
                        </th>
                    </tr>
                    @php
                        $registers = $category->record_categories->where('record_id', $record->id);
                    @endphp
                    @foreach($registers as $register)
                        @if($category->is_various and $key_category =! 0)
                            <tr>
                                <td colspan="2">
                                    <hr class="line_hr2">
                                </td>
                            </tr>
                        @endif
                    <!-- Number -->
                        @php
                            $numbers = $register->record_data->whereIn('history_medical_variable.variable_type_id', [1, 4])->values();
                        @endphp
                        @foreach($numbers as $key => $number)
                            @if($key == 0 or $key % 2 == 0) <tr> @endif
                                <td class="border" @if($key % 2 == 0 and $key == $numbers->keys()->last()) colspan="2" @else width="50%" @endif>
                                    <h5 class="txt">{{ $number->value['label'] }}</h5>
                                    <p class="txt">{{ $number->value['value'] }}</p>
                                </td>
                                @if($key == 1 or $key % 2 == 1 or $key == $numbers->keys()->last() ) </tr> @endif
                        @endforeach

                        @php
                            $texts = $register->record_data->whereIn('history_medical_variable.variable_type_id', [2, 3]);
                        @endphp

                        @foreach($texts as $key => $text)
                            <tr>
                                <td colspan="2" class="border">
                                    <h5 class="txt">{{ $text->value['label'] }}</h5>
                                    <p class="txt">{{ $text->value['value'] }}</p>
                                </td>
                            </tr>
                        @endforeach
                        {{--list--}}
                        @php
                            $lists = $register->record_data->whereIn('history_medical_variable.variable_type_id', [6]);
                        @endphp

                        @foreach($lists as $key => $list)
                            <tr>
                                <td colspan="2" class="border">
                                    <h5 class="txt">{{ $list->value['label'] }}</h5>
                                    @if(is_array($list->value['value']))
                                        <ul class="txt" style="padding: 3px 0 5px 15px; margin: 0">
                                            <li>{!! implode('</li><li>', $list->value['value']) !!}</li>
                                        </ul>
                                    @else
                                        <p class="txt">
                                            {{ $list->value['value'] }}
                                        </p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{--booleans--}}
                        @php
                            $booleans = $register->record_data->where('history_medical_variable.variable_type_id', 5);
                        @endphp
                        @foreach($booleans as $key => $boolean)
                            <tr>
                                <td colspan="2">
                                    <span class="txt" style="font-weight: bold">{{ $boolean->value['label'] }}</span>
                                    <span class="txt">{{ $boolean->value['value'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
        @endforeach
        @php //dd(array()) @endphp
        <!-- Diagnostico -->
        <div>
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

        <!-- Procedimiento -->
        <div>
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

        <!-- Medicamentos -->
        <div>
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

        <!-- Incapacidad -->
        @if(isset($days_off))
            <div>
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
                        <p class="txt"> {{ $config['ADDRESS']->config_data->value ?? '' }}</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Código Habilitación:</h5>
                        <p class="txt">{{ "{$record->surgery->number}-{$record->surgery->description}" }}</p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Departamento:</h5>
                        <p class="txt">{{ $config['DEPARTMENT']->config_data->value }}</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Municipio:</h5>
                        <p class="txt">{{ $config['CITY']->config_data->value }}</p>
                    </td>
                </tr>
            </table>
        </div>

        @php
            $responsable = $record->agreement ?? null;
        @endphp
        <!-- Convenio -->
        @if(!empty($responsable))
            <div>
                <table class="table_main" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="2">
                            <h4 class="title_section">CONVENIO</h4>
                        </th>
                    </tr>
                    <tr>
                        <td width="30%" class="border">
                            <h5 class="txt">Código:</h5>
                            <p class="txt">{{ $record->agreement->code_agreement }}</p>
                        </td>

                        <td width="70%" class="border">
                            <h5 class="txt">Nombre Institución:</h5>
                            <p class="txt">{{ "{$responsable->name_agreement} " . ($responsable->second_name_agreement ?? '') . " " . ($responsable->firsth_lastname_agreement ?? '') . " " . ($responsable->second_lastname_agreement ?? '') . " "}}</p>
                        </td>
                    </tr>
                </table>
            </div>
        @endif

        <!-- Profesional Tratante -->
        <div>
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
                        {{--                <span class="txt">CodVer</span><span class="txt_posicionado">1234265343843834</span>--}}
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
