@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">Pacientes</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="ver información del paciente">Home</a>
                </li>
                <li class="breadcrumb-item ">Pacientes</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="card card-body" style="padding-top: 14px; padding-bottom: 14px">
            <div class="row">
                <div class="col-md-1 p-0 pt-2 content_img_top_user">
                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="85"/>
                </div>
                <div class="col-md-7 p-0">
                    <!-- <h2 class="txt_blue_bold f-10">Paciente: Homero Thompson</h2> -->
                    <h4 class="txt_dark_400 fs-5 mb-1">CC: 000 000 000 | Fecha de Nacimiento: 28/11/1985</h4>
                    <h4 class="txt_dark_400 fs-5 mb-1">Servicio de salud: Sura E.P.S.</h4>
                </div>
                <div class="col-md-4 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 pad_btn_new_consult">
                    <button type="reset" class="btn font-weight-medium fs-7 px-4 me-4" style="background: #DE714B; color: white; font-weight: 100">
                        {{ __('trans.cancel') }} 
                    </button>
                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                        {{ __('trans.save-and-exit') }} 
                    </button>   
                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                        {{ __('trans.save-and-exit') }} 
                    </button>  
                </div>
                <div class="offset-1 col-3 p-0">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item border-0">
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse content_acordion" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body px-0">
                                    <h4 class="txt_blue_bold">Información de contacto:
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                            <i data-feather="edit-3" class="icon_info fs-9"></i>
                                        </a>
                                    </h4>
                                    <p class="txt_dark_400 fs-5 m-0">Teléfono: 000 00 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">Móvil: 000 000 00 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">Correo: name@mail.com</p>
                                    <p class="txt_dark_400 fs-5 m-0">Dirección: Carrera 0 # 0 - 00</p>
                                    <p class="txt_dark_400 fs-5 m-0">Ciudad: Bogotá D.C.</p>
                                </div>
                            </div>

                            <button class="accordion-button collapsed btn_acordion p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" 
                                aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <h4 class="accordion-header txt_blue_light" id="panelsStayOpen-headingOne">
                                    Más información
                                </h4>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!-- End Container fluid  -->
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>

    <script>
 
    </script>
@endsection
