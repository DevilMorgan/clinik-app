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
                        <img src="">
                    </td>
                    
                    <td width="50%">
                        <h2 style="text-align: center; font-family: 'Helvetica';">No. 00742967</h2>
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
                        <p class="txt"> <b class="txt">Número Autorización:</b> 01161V1612138481</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Fecha y Hora:</b> 24 JUN 2016 16:22</p>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr> <!-- ENTIDAD RESPONSABLE DEL PAGO -->
                    <th colspan="2">
                        <h4 class="title_section">ENTIDAD RESPONSABLE DEL PAGO</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Nombre:</b> SALUD TOTAL EPSS</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Código:</b> EPS002</p>
                    </td>
                </tr>

                <tr> <!-- INFORMACIÓN DEL PRESTADOR -->
                    <th colspan="2">
                        <h4 class="title_section">INFORMACIÓN DEL PRESTADOR</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Nombre:</b> VS UUBC LAS AMERICAS</p>
                    </td>

                    <td class="cell_row">
                        <span class="txt"> <b class="txt">Nit:</b> 800003765</span>
                        <span class="txt txt_situado"> <b class="txt">Código:</b> 110010952310</span>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Dirección:</b> CRA 67 4G - 68</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Teléfono:</b> 4473536</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Departamento:</b> (11) BOGOTÁ</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Municipio:</b> (001) BOGOTÁ - CUNDINAMARCA</p>
                    </td>
                </tr>

                <tr> <!-- DATOS DEL PACIENTE -->
                    <th colspan="2">
                        <h4 class="title_section">DATOS DEL PACIENTE</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Tipo Documento:</b> CÉDULA DE CIUDADANÍA</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Documento:</b> 63483014</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Nombre:</b> CARMEN CECILIA DIAZ SUAREZ </p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Fecha de Nacimiento:</b> 25 SEP 1972</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Dirección:</b> CRA 6 31 - 31 SUR</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Teléfono:</b> 5754764</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Departamento:</b> (25) CUNDINAMARCA</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Municipio:</b> (754) SOACHA - CUNDINAMARCA</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Teléfono Celular:</b> 3218189694</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Correo:</b> MONTENEGRITO182@HOTMAIL.COM</p>
                    </td>
                </tr>

                <tr> <!-- DATOS DE LA TRANSACCIÓN -->
                    <th colspan="2">
                        <h4 class="title_section txt_center">DATOS DE LA TRANSACCIÓN</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Tipo:</b> AUTORIZACIÓN</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Régimen:</b> VI CONTRIBUTIVO</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Motivo:</b> </p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Fecha Vencimiento:</b> 26 JUN 2016</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Diagnóstico:</b> R07.2</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Nap Anterior:</b> 01161V1612135136</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Ubicación del Paciente:</b> URGENCIAS</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">No Solicitud:</b> 1600117232</p>
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
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;">
                        <p class="txt">895100</p>
                    </td>

                    <td style="border: 1px solid black;">
                        <p class="txt">1</p>
                    </td>

                    <td style="border: 1px solid black;">
                        <p class="txt">PROCEDIMENTOS UNIDADES ELECTROCARDIOGRAMA - (CUPS 895100)</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table_main" cellspacing="0" cellpadding="0"> <!-- Pagos Compartidos -->
            <tbody>
                <tr> <!-- PAGOS COMPARTIDOS -->
                    <th colspan="2">
                        <h4 class="title_section">PAGOS COMPARTIDOS</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Tipo de Recaudo:</b> CÉDULA DE CIUDADANÍA</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Valor:</b> 0</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Semanas Cotizadas:</b> 281</p>
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
                        <p class="txt"> <b class="txt">Nombre:</b> LORENA GARCIA LEON</p>
                    </td>

                    <td class="cell_row" rowspan="4">
                        <hr class="line_hr">
                        <p class="txt_firma">Firma - Firma Electrónica</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Cargo o Actividad:</b> MEDICINA DE URGENCIAS</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Teléfono:</b> </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Teléfono Celular:</b> </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Ips que Prescribe :</b> VS UUBC LAS AMERICAS</p>
                    </td>

                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Teléfono:</b> 4473536</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row">
                        <p class="txt"> <b class="txt">Dirección:</b> (BOGOTÁ CUNDINAMARCA) CR 67 4G - 68</p>
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