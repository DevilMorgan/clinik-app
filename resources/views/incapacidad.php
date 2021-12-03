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
                        <h2 style="text-align: center; font-family: 'Helvetica';">No. 00742967</h2>
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
                        <p class="txt"> <b class="txt">Fecha y Hora:</b> 19 Abr 2021 10:00</p>
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
                        <p class="txt"> <b class="txt">Nombre:</b> Salud Total EPS - Operado Virrey Solis</p>
                    </td>

                    <td class="cell_row txt_center border">
                        <p class="txt"> <b class="txt">Código:</b> EPS002</p>
                    </td>
                </tr>

                <tr> <!-- DATOS DEL PACIENTE -->
                    <th colspan="2">
                        <h4 class="title_section">DATOS DEL PACIENTE</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Tipo de Documento:</b> CÉDULA DE CIUDADANÍA</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Documento:</b> 72216528</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Nombre:</b> ALEXANDER ZABALETA JIMENEZ</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Fecha de Nacimiento:</b> 29 ENE 1976</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Dirección:</b> CR 21C No 28 - 04 PI 2 AP 201</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Teléfono:</b> </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Departamento:</b> (47) MAGDALENA</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Municipio:</b> (001) SANTA MARTA</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Teléfono Celular:</b> 3218126597</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Email:</b> ALEXANDERZABALETA@HOTMAIL.COM</p>
                    </td>
                </tr>

                <tr> <!-- DATOS DE LA TRANSACCIÓN -->
                    <th colspan="2">
                        <h4 class="title_section">DATOS DE LA TRANSACCIÓN</h4>
                    </th>
                </tr>
                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Tipo:</b> AMBULATORIA</p>
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
                        <p class="txt"> <b class="txt">Fecha de Vencimiento:</b> 29 ENE 1976</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Diagnóstico:</b> H00.0</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Nap Anterior:</b> 319882116974499</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Ubicación del Paciente:</b> CONSULTA EXTERNA</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">No Solicitud:</b> </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Origen del Servicio:</b> Otra</p>
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
                        <p class="txt"> <b class="txt">Días de Incapacidad:</b> 2 (DOS)</p>
                    </td>

                    <td class="cell_row border"></td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Fecha Inicio Incapacidad:</b> 19 ABR 2021</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt"> PR - 1374837</b> </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Fecha Final Incapacidad:</b> 20 abr 2021</p>
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
                        <p class="txt"> <b class="txt">Nombre:</b> JAMITH RICARDO MAESTRE GARZÓN</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Teléfono:</b> </p>                        
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Cargo o Actividad:</b> MEDICINA DE URGENCIAS</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Teléfono Celular:</b> </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Ips que Prescribe:</b> VS AVENIDA LIBERTADORES</p>
                    </td>

                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Teléfono:</b> 4328777 - 4328750</p>
                    </td>
                </tr>

                <tr>
                    <td class="cell_row border">
                        <p class="txt"> <b class="txt">Dirección:</b> (SANTA MARTA) CR 32 24 - 11</p>
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
                        <span class="txt">ESTA INCAPACIDAD NO REQUIERE SER TRANSCRITA, POR LO TANTO, ES VÁLIDA PARA PRESENTAR AL EMPLEADOR, DE ACUERDO AL PARÁGRAFO 1 DEL DECRETO 2943 DE 2013.
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>