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
                    <h4>CONSENTIMIENTO</h4>
                </td>
                <td width="35%">
                    <table class="table_main" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="border">
                                <h5 class="txt">Fecha y Hora de Expedición (AAAA-MM-DD)</h5>
                                <hr class="line_hr">
                                <p class="txt"> 2019-08-29 16:00</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5 class="txt">Referencia No.</h5>
                                <hr class="line_hr">
                                <p class="txt">20190829120014063273</p>
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
                        <p class="txt">CC 36522866</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Nombres:</h5>
                        <p class="txt">CARMEN MARÍA</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Apellidos:</h5>
                        <p class="txt">MASRTINEZ DE MARQUEZ</p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Correo Electrónico:</h5>
                        <p class="txt">MARIAC177@HOTMAIL.COM</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Teléfono Celular:</h5>
                        <p class="txt">320 478 2569</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Teléfono Fijo:</h5>
                        <p class="txt">425 6987</p>
                    </td>
                </tr>

                <tr>
                    <td width="33%" class="border">
                        <h5 class="txt">Departamento:</h5>
                        <p class="txt">CUNDINAMARCA</p>
                    </td>

                    <td width="33%" class="border">
                        <h5 class="txt">Ciudad o Municipio:</h5>
                        <p class="txt">BOGOTÁ</p>
                    </td>

                    <td width="34%" class="border">
                        <h5 class="txt">Dirección de Residencia:</h5>
                        <p class="txt">DIAGONAL 32C SUR # 6C - 85 ESTE</p>
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
    </body>
</html>
