<!DOCTYPE html>

<html lang="esp">
    <?php
        $nombreImagen = "../public/img/logo/clinikapp-logo.png";
        $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <style>
            .table {
                table-layout: fixed;
                width: 90%;
                margin: 0 auto;
                padding: 30px 0 15px 0;
                border-radius: 5px;
                border: 2px solid black;
            }
            .subtable {
                table-layout: fixed;
                width: 96%;
                margin: auto;
                border: 1px solid black;
                border-radius: 5px;
                padding: 5px;
            }
            .text_h5 {
                display: inline;
                font-family: helvetica;
                font-size: 13.6px;
            }
            .text_h4 {
                display: block;
                font-family: helvetica;
                font-size: 13.6px;
                text-align: center;
                margin: 0;
            }
            .text_span {
                font-family: helvetica;
                font-size: 13.2px;
            }
            .font {
                font-family: helvetica;
            }
            .border {
                border: 1px solid #000000;
            }
            .bord_bottom {
                border-bottom: 1px solid #000000;
            }
            .padd {
                padding: 3px 0 3px 3px; 
            }
            .pad_l {
                padding-left: 3px; 
            }
        </style>
    </head>

    <body>
        <table class="table">
            <thead>
                <tr>
                    <th width="50%">
                        <h2 class="font">CARNÉ DE VACUNACIÓN</h2>
                    </th>
                    <th width="50%">
                        <img src="<?php echo $imagenBase64 ?>" >
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td colspan="2" style="padding-top: 12px">
                        <div class="subtable">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="border padd" width="50%">
                                        <h5 class="text_h5">Nombres:</h5>
                                        <span class="text_span">Marcela Carolina</span>
                                    </td>

                                    <td class="border padd" width="50%">
                                        <h5 class="text_h5">Apellidos:</h5>
                                        <span class="text_span">Cardona Velalcazar</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border padd" width="50%">
                                        <h5 class="text_h5">Tipo Documento:</h5>
                                        <span class="text_span">Cedula de Ciudadanía</span>
                                    </td>
                                    <td class="border padd" width="50%">
                                        <h5 class="text_h5">Número Documento:</h5>
                                        <span class="text_span">0 000 000 000</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border padd" width="50%">
                                        <h5 class="text_h5">Fecha de nacimiento:</h5>
                                        <span class="text_span">DD-MM-AAAA</span>
                                    </td>
                                    <td class="border padd" width="50%">
                                        <h5 class="text_h5">Edad:</h5>
                                        <span class="text_span">00 Años</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding-top: 12px">
                        <div class="subtable">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th class="border" width="25%">
                                            <h5 class="text_h5">Biologicos</h5>
                                        </th>
                                        <th class="border" width="25%">
                                            <h5 class="text_h5">Dosis</h5>
                                        </th>
                                        <th class="border" width="25%">
                                            <h5 class="text_h5">Fecha</h5>
                                        </th>
                                        <th class="border" width="25%">
                                            <h5 class="text_h5">Lote</h5>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="border" width="25%">
                                            <h4 class="text_h4">Hepatitis B</h4>
                                        </td>

                                        <td class="border" width="25%">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">1ra. Dosis</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">2da. Dosis</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pad_l" width="100%">
                                                        <span class="text_span">3ra. Dosis</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        
                                        <td class="border" width="25%">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">DD-MM-AAAA</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">DD-MM-AAAA</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pad_l" width="100%">
                                                        <span class="text_span">DD-MM-AAAA</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td class="border" width="25%">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">000 000 000</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">000 000 000</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pad_l" width="100%">
                                                        <span class="text_span">000 000 000</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="border" width="25%">
                                            <h4 class="text_h4">Antiamarilica</h4>
                                        </td>

                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">Dosis Unica</span>
                                        </td>

                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">DD-MM-AAAA</span>
                                        </td>

                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">000 000 000</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="border" width="25%">
                                            <h4 class="text_h4">SR</h4>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">Dosis Unica</span>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">DD-MM-AAAA</span>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">000 000 000</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="border" width="25%">
                                            <h4 class="text_h4">Influenza (Comorbolidad /Riesgo)</h4>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">Dosis Unica</span>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">DD-MM-AAAA</span>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span">000 000 000</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="border" width="25%">
                                            <h4 class="text_h4">AntiCOVID-19</h4>
                                        </td>
                                         pad_l
                                        <td class="border" width="25%">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">1ra. Dosis</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">2da. Dosis</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pad_l" width="100%">
                                                        <span class="text_span">3ra. Dosis</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td class="border" width="25%">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">DD-MM-AAAA</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">DD-MM-AAAA</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pad_l" width="100%">
                                                        <span class="text_span">DD-MM-AAAA</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td class="border" width="25%">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">000 000 000</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bord_bottom pad_l" width="100%">
                                                        <span class="text_span">000 000 000</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pad_l" width="100%">
                                                        <span class="text_span">000 000 000</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="border" width="25%">
                                            <h4 class="text_h4">Otro</h4>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span"></span>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span"></span>
                                        </td>
                                        <td class="border pad_l" width="25%">
                                            <span class="text_span"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body> 
</html>