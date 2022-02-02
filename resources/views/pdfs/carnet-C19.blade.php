<!DOCTYPE html>

<html lang="esp">
    <?php
        $nombreImagen = "../public/img/logo/mi-vacuna.png";
        $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));

        $nombreImagen_2 = "../public/img/logo/logo-mini-salud.png";
        $imagenBase64_2 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen_2));
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
  

        <style>
            .bord_2 { border: 2px solid black; }
            .border_bot2 { border-bottom: 2px solid black; }
            .border_rig2 { border-right: 2px solid black; }
            .bord_rad { border-radius: 20px; }
            .bord_rad_style1 { border-radius: 45px; }
            .bord_spac { border-spacing: 0; }

            .noPad { padding: 0; }
            .pad_style1 { padding: 15px 5px 5px 5px; }
            .pad_style2 { padding: 14px 10px; }
            .pad_y_22 { padding-top: 22px; padding-bottom: 22px; }
            .pad_x_7 { padding-left: 9px; padding-right: 9px;}

            .noMar { margin: 0; }
            .mar_lef1 { margin-left: 8px; }

            html {
                margin: 0;
                padding: 0,
            }
            .img_portada {
                width: 225px;
                height: 100px; 
                margin-left: 65px; 
            }
            .logo_min_salud {
                width: 200px;
                height: 40px;
                margin-left: 12px;
            }
            .logo_mi_vacuna {
                width: 110px; 
                height: 40px; 
                margin-left: 5px;
            }
            .text_h3 {
                font-family: helvetica;
                font-size: 13px;
                text-align: center;
                margin: 0;
            }
            .text_h5 {
                font-family: helvetica;
                font-size: 11px;
                text-align: center;
                margin: 0;
            }
            .text_label {
                font-family: Helvetica;
                font-size: 11.5px;
            }
            .input_txt {
                background: #ccc;
                margin: 0;
                padding: 13px;
                border-radius: 6px;
                border: none;
                width: 90%;
            }
            .div_type_input {
                background: #ccc;
                margin: 0;
                padding: 6px 0 6px 3px;
                border-radius: 6px;
            }
            .input_type_check {
                width: 8px;
                height: 9px;
                margin: 2px 1px 0 3px;
            }
            .input_type_check2 {
                width: 37px;
                height: 9px;
                margin: 2px 1px 0 3px;
            }
            .input_type_date {
                width: 12px; 
                height: 12px;
                margin: 2px 1px 0 2px;
            }
            .input_type_date2 {
                width: 12px;
                height: 12px; 
                margin: 2px 2px 0 0;
            }
        </style>
    </head>

    <body>
        <table class="bord_2" width="100%" cellspacing="10" cellpadding="0">
            <tr>
                <td class="bord_2 bord_rad noPad" width="49%">
                    <div>
                        <img class="img_portada" src="<?php echo $imagenBase64 ?>">
                    </div>
                    <h3 class="text_h3 noMar">www.minisalud.gov.co</h3>  
                </td>
                
                <td></td>

                <td class="bord_2 bord_rad pad_style1" width="49%">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <img src="<?php echo $imagenBase64_2 ?>" class="logo_min_salud">
                            </td>

                            <td>
                                <img src="<?php echo $imagenBase64 ?>" class="logo_mi_vacuna">
                            </td> 
                        </tr>
                    </table>

                    <table width="100%">
                        <tr>
                            <td colspan="2">
                                <h3 class="text_h3 noMar">Certificado de vacunación</h3>
                            </td>
                        </tr>

                        <tr>
                            <td width="20%">
                                <label class="text_label noMar">Nombres:</label>
                            </td>

                            <td width="80%" >
                                <input class="input_txt" type="text">
                            </td>
                        </tr>

                        <tr>
                            <td width="20%">
                                <label class="text_label noMar">Apellidos:</label>
                            </td>

                            <td width="80%" >
                                <input class="input_txt" type="text">
                            </td>
                        </tr>

                        <tr>
                            <td width="20%">
                                <label class="text_label noMar">Documento de Identidad:</label>
                            </td>

                            <td width="80%" >
                                <div class="div_type_input">
                                    <label class="text_label noMar">C.C</label><input type="text" class="input_type_check">
                                    <label class="text_label noMar">T.I</label><input type="text" class="input_type_check">
                                    <label class="text_label noMar">Pasaporte</label><input type="text" class="input_type_check">
                                    <label class="text_label noMar">PEP</label><input type="text" class="input_type_check">
                                    <label class="text_label noMar">Cual</label><input type="text" class="input_type_check2">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td width="20%">
                         
                            </td>

                            <td width="80%">
                                <div class="div_type_input">
                                    <label class="text_label noMar">No.</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td width="20%">
                                <label class="text_label noMar">Fecha de Nacimiento:</label>
                            </td>

                            <td width="80%">
                                <div class="div_type_input">
                                    <label class="text_label noMar">Día</label>
                                    <input type="text" class="input_type_date"><input type="text" class="input_type_date">

                                    <label class="text_label mar_lef1">Mes</label>  
                                    <input type="text" class="input_type_date"><input type="text" class="input_type_date">

                                    <label class="text_label mar_lef1">Año</label>
                                    <input type="text" class="input_type_date"><input type="text" class="input_type_date">
                                    <input type="text" class="input_type_date2"><input type="text" class="input_type_date">
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="bord_2 pad_style2" width="97%">
            <table class="bord_2 bord_rad_style1 bord_spac" width="100%">
                <thead >
                    <tr>
                        <th class="text_h5 border_bot2 border_rig2 pad_y_22">Biologico</th>
                        <th class="text_h5 border_bot2 border_rig2 pad_y_22">Dosis</th>
                        <th class="text_h5 border_bot2 border_rig2 pad_y_22">Fecha</th>
                        <th class="text_h5 border_bot2 border_rig2 pad_y_22">Fabricante</th>
                        <th class="text_h5 border_bot2 border_rig2 pad_x_7">Lote</th>
                        <th class="text_h5 border_bot2 border_rig2 pad_y_22">IPS vacunadora</th>
                        <th class="text_h5 border_bot2 border_rig2 pad_y_22">Nombre vacunador</th>
                        <th class="text_h5 border_bot2 pad_y_22">Cedula vacunador</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td rowspan="3" class="text_h5 border_rig2">COVID-19</td>
                        <td class="text_h5 border_bot2 border_rig2 pad_y_22">1</td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 pad_y_22"></td>
                    </tr>

                    <tr>
                        <td class="text_h5 border_bot2 border_rig2 pad_y_22">2</td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 border_rig2 pad_y_22"></td>
                        <td class="border_bot2 pad_y_22"></td>
                    </tr>

                    <tr>
                        <td class="text_h5 border_rig2 pad_y_22">3</td>
                        <td class="border_rig2 pad_y_22"></td>
                        <td class="border_rig2 pad_y_22"></td>
                        <td class="border_rig2 pad_y_22"></td>
                        <td class="border_rig2 pad_y_22"></td>
                        <td class="border_rig2 pad_y_22"></td>
                        <td class="pad_y_22"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body> 
</html>