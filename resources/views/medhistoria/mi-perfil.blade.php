@extends('medhistoria.layouts.app')
@section('title', __('trans.home'))

@section('styles')

@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">{{ __('trans.my_profile') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">{{ __('trans.home') }}</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.my_profile') }}</li>
                <li class="breadcrumb-item ">{{ __('trans.medical_profile') }}</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="card card-body" style="padding-top: 27px; padding-bottom: 55px">
            <div class="row">
                <!-- Imagen del Usuario -->
                <div class="col-md-2 p-0 perfil_img_top_user">
                    <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="180"/>
                </div>
                <!-- Información del Usuario -->
                <div class="col-md-7 ps-5 align-self-end">
                    <h2 class="txt_blue_bold fs-11">{{ __('trans.name') }}: Dr. jonathan Buenaventura</h2>
                    <h4 class="txt_dark_bold fs-10 mb-3">{{ __('trans.main_specialty') }}: PEDIATRÍA</h4>
                    <div class="mb-3">
                        <span class="badge fs-4 txt_dark_bold perfil_pill_espec py-3 px-4">PEDIATRÍA</span>
                        <span class="badge fs-4 txt_dark_bold perfil_pill_espec py-3 px-4">MEDICINA GENERAL</span>
                        <span class="badge fs-4 txt_dark_bold perfil_pill_espec py-3 px-4">CIRUGÍA GENERAL</span>
                    </div>
                    <div class="row m-0">
                        <!-- Información del Usuario del Desplegable -->
                        <div class="col-md-12 p-0">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item border-0 header_accordion">
                                    <!-- Contenido oculto informcaión del Usuario  -->
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse content_acordion" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body px-0">
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.birthday') }}: 28/11/1985</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.card_typeid_') }}: Cédula de ciudadanía</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.id_card') }}: 000 000 000</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.college') }}: Universidad Nacional de Colombia</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.proffessional_card') }}: 000 000-T</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.phone') }}: 0000 000</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.mobile') }}: 310 0000 000</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.address') }}: Avenida Rojas # 69 - 52</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.city') }}: Bogotá D.C.</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.email') }}: name@mail.com.co</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.web_site') }}: www.dominio.com.co</h4>
                                            <h4 class="txt_dark_bold fs-10 mb-2">{{ __('trans.linkedln') }}: www.linkedin.com/jonathanBuenaventura</h4>
                                        </div>
                                    </div>

                                    <button class="accordion-button collapsed btn_acordion p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" 
                                        aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" onclick="cambiarTexto()" id="cambiar">
                                        <h4 class="accordion-header txt_blue_light" id="texto">
                                            Más información
                                        </h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-end mt-3 mt-md-0 pad_btn_new_consult">
                    <div class="action-btn show-btn" style="display: none">
                        <a href="javascript:void(0)"
                           class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-weight-medium"></a>
                    </div>
                    <a href="javascript:void(0)" id="btn-add-contact" class="btn btn-info fs-6 mb-2" style="font-weight: bold; padding: 6px 26px;"> 
                        <i data-feather="edit-3"></i> &nbsp; Editar Perfil
                    </a>
                    <a href="javascript:void(0)" id="btn-add-contact" class="btn btn-success fs-4 py-2" style="font-weight: bold"> 
                        Administrar Contraseña
                    </a>
                </div>
            </div>
        </div>

        <div class="row"> <!-- Fila 1  cards  -->
            <div class="col-md-5 d-flex align-items-stretch"> <!-- Consultorio -->
                <div class="card w-100 bg-success">
                    <div class="card-body perfil_pad_card_consultorio">
                        <h3 class="card-title text-white fw_bold fs-11">Consultorio</h3>
                        <p class="card-text font_openSans text-white fs-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt 
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci 
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequa. Lorem ipsum dolor sit 
                        amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna .
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="javascript:void(0)" class="btn btn-info fs-9">Ver Mi Consultorio</a>
                        </div>
                    </div>
                </div>
            </div>
                                        
            <div class="col-md-7 d-flex align-items-stretch"> <!-- Proximas Citas -->
                <div class="card w-100">
                    <div class="card-body perfil_pad_card_citas">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title txt_blue_bold fs-11 m-0">Próximas citas</h3>
                            <a href="javascript:void(0)" class="btn btn-info fs-9">Ver Mis Citas</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 mt-4">
                                <table class="data_table" cellpadding="12" width="100%">
                                    <tbody>
                                        <tr>
                                            <td width="60%">
                                                <span class="txt_dark_400 font_openSans fs-6">Cita de Control - Julio Horjuela</span>
                                            </td>
                                            <td width="25%">
                                                <span class="badge fs-2" style="background: #DE714B; padding: 3px 21px">Hoy</span>
                                            </td>
                                            <td width="15%">
                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                    <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="txt_dark_400 font_openSans fs-6">Cita de Control - Belisario Alcasarez</span>
                                            </td>
                                            <td>
                                                <span class="badge btn-success fs-2">Mañana</span>
                                            </td>
                                            <td>
                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                    <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="txt_dark_400 font_openSans fs-6">Cita de Control - Alexander de la Torre</span>
                                            </td>
                                            <td>
                                                <span class="badge btn-success fs-2">Mañana</span>
                                            </td>
                                            <td>
                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                                    <i data-feather="edit-3" class="icon_info fs-9"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!-- Fila 2  cards  -->
            <div class="col-md-4 d-flex align-items-stretch"> <!-- Sedes -->
                <div class="card w-100">
                    <div class="card-header bg-success perfil_pad_card_sed_contac">
                        <h3 class="card-title text-white fw_bold fs-11">Sedes</h3>
                        <a href="javascript:void(0)" class="btn btn-info fs-9 perfil_positionBtn_card_row2">Ver Sedes</a>
                    </div>
                    <div class="card-body perfil_pad_card_sed_contac">
                        <div class="mb-4">
                            <h6 class="card-title txt_blue_300 fs-3 m-0">Sede X</h6>
                            <p class="card-text font_openSans txt_dark_400 fs-2 m-0">
                                With supporting text below as a natural lead-in to
                                additional content.
                                Lorem Ipsum is simply dummy text of the printing and type
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="card-link txt_blue_light fs-2">Ver más</a>    
                            </div>
                        </div>

                        <div>
                            <h6 class="card-title txt_blue_300 fs-3 m-0">Sede X</h6>
                            <p class="card-text font_openSans txt_dark_400 fs-2 m-0">
                                With supporting text below as a natural lead-in to
                                additional content.
                                Lorem Ipsum is simply dummy text of the printing and type
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="card-link txt_blue_light fs-2">Ver más</a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                        
            <div class="col-md-4 d-flex align-items-stretch"> <!-- Convenios -->
                <div class="card w-100">
                    <div class="card-header bg-white perfil_pad_card_sed_contac">
                        <h3 class="card-title txt_blue_bold fs-11 m-0">Convenios</h3>
                        <span class="txt_dark_400 fs-2">Cita de Control - Julio Horjuela</span>
                        <a href="javascript:void(0)" class="btn btn-info fs-9 perfil_positionBtn_card_row2">Ver Convenios</a>
                    </div>
                    <div class="card-body perfil_pad_card_sed_contac pt-0">
                        <div class="mb-3">
                            <div class="d-flex">
                                <i data-feather="circle" class="perfil_circle"></i>
                                <div class="ps-3">
                                    <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Convenio 1</h6>
                                    <p class="card-text font_openSans txt_dark_400 fs-2">
                                    With supporting text below as a natural lead-in to
                                    additional content.
                                    Lorem Ipsum is simply dummy text of the printing and type
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <i data-feather="circle" class="perfil_circle"></i>
                                <div class="ps-3">
                                    <h6 class="card-title txt_blue_300 fs-3 m-0 d-block">Convenio 2</h6>
                                    <p class="card-text font_openSans txt_dark_400 fs-2">
                                    With supporting text below as a natural lead-in to
                                    additional content.
                                    Lorem Ipsum is simply dummy text of the printing and type
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch"> <!-- Contactos -->
                <div class="card w-100">
                    <div class="card-header bg-success perfil_pad_card_sed_contac">
                        <h3 class="card-title text-white fw_bold fs-11">Contactos</h3>
                        <a href="javascript:void(0)" class="btn btn-info fs-9 perfil_positionBtn_card_row2">Ver Mis Contactos</a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                            <div class="profile-img p-2">
                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                            </div>
                            <div style="line-height: 1">
                                <h6 class="card-title txt_blue_300 fs-4 m-0 d-block">Barney Gómez</h6>
                                <span class="card-text font_openSans txt_dark_400 fs-2">
                                    Barney Gómez amoduff@wrappixel.com
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                            <div class="profile-img p-2">
                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                            </div>
                            <div style="line-height: 1">
                                <h6 class="card-title txt_blue_300 fs-4 m-0 d-block">Edna Krabappel</h6>
                                <span class="card-text font_openSans txt_dark_400 fs-2">
                                    edna1987@gmail.com
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center comment-row py-0 p-3">
                            <div class="profile-img p-2">
                                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                            </div>
                            <div style="line-height: 1">
                                <h6 class="card-title txt_blue_300 m-0 d-block">Moe Sislack </h6>
                                <span class="card-text font_openSans txt_dark_400 fs-2">
                                    dondemoe@gmail.com
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->
@endsection

@section('scripts')
    <script>
        // Función para cambiar el texto del botón desplegable "Más información"
        function cambiarTexto() {
			texto.innerHTML=texto.innerHTML=="Ocultar información"?"Más información":"Ocultar información";
		}
    </script>
@endsection
