@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="txt_blue_bold mb-0">Pacientes</h2>
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
        <div class="card card-body content_search">
            <div class="row">
                <div class="col-md-4 col-xl-6 py-1">
                    <form>
                        <input type="text" class="form-control product-search pad_search" id="input-search" placeholder="Búsqueda de Pacientes">
                    </form>
                </div>
                <div class="col-md-8 col-xl-6 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <div class="action-btn show-btn" style="display: none">
                        <a href="javascript:void(0)"
                           class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-weight-medium"></a>
                    </div>
                    <a href="javascript:void(0)" id="btn-add-contact" class="btn btn-info align-self-center fs-7 fw_bold py-2 d-flex">
                        <i data-feather="plus"></i> &nbsp; Agregar Paciente
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-body pad_content_table">
            <table id="patients" width="100%">
                <thead>
                    <tr>
                        <th class="txt_blue_light">Nombre</th>
                        <th class="txt_blue_light">Identificación</th>
                        <th class="txt_blue_light">Contacto</th>
                        <th class="txt_blue_light">Ciudad</th>
                        <th class="txt_blue_light">Última consulta</th>
                        <th class="no-sort"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <div class="content_data_user">
                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                            <div class="content_txt_cell_user">
                                <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                                <span class="txt_blue_300 fs-9">Sura EPS</span>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">1070322576</span>
                        </td>
                        <td>
                            <p class="txt_blue_300 fs-9 m-0">0000 000</p>
                            <p class="txt_blue_300 fs-9 m-0">000 000 0000</p>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">Bogotá D.C</span>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pad_icon_table">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                <i data-feather="file-plus" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="content_data_user">
                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                            <div class="content_txt_cell_user">
                                <h5 class="txt_blue_bold fs-9 m-0" >Margaret Thompson</h5>
                                <span class="txt_blue_300 fs-9">Famisanar</span>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">353759999</span>
                        </td>
                        <td>
                            <p class="txt_blue_300 fs-9 m-0">0000 000</p>
                            <p class="txt_blue_300 fs-9 m-0">000 000 0000</p>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">Bogotá D.C</span>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">17/11/2021 09:10 a.m.</span>
                        </td>
                        <td class="pad_icon_table">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                <i data-feather="file-plus" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="content_data_user">
                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                            <div class="content_txt_cell_user">
                                <h5 class="txt_blue_bold fs-9 m-0" >Bartolomeo Thompson</h5>
                                <span class="txt_blue_300 fs-9">Nueva EPS</span>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">1070322576</span>
                        </td>
                        <td>
                            <p class="txt_blue_300 fs-9 m-0">0000 000</p>
                            <p class="txt_blue_300 fs-9 m-0">000 000 0000</p>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">Bogotá D.C</span>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">06/01/2022 02:15 p.m.</span>
                        </td>
                        <td class="pad_icon_table">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                <i data-feather="file-plus" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="content_data_user">
                            <img src="{{ asset('img/medhistoria') }}/icon/icono-paciente-11.svg" alt="user" class="rounded-circle" width="60"/>
                            <div class="content_txt_cell_user">
                                <h5 class="txt_blue_bold fs-9 m-0" >Margarita Thompson</h5>
                                <span class="txt_blue_300 fs-9">Particular</span>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">353759999</span>
                        </td>
                        <td>
                            <p class="txt_blue_300 fs-9 m-0">0000 000</p>
                            <p class="txt_blue_300 fs-9 m-0">000 000 0000</p>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">Bogotá D.C</span>
                        </td>
                        <td>
                            <span class="txt_blue_300 fs-9">02/12/2021 08:35 a.m.</span>
                        </td>
                        <td class="pad_icon_table">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                <i data-feather="file-plus" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('#patients').DataTable( {
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
                },
                
                targets: [3],
                responsive: true,
                paging:   false,
                ordering: true,
                info:     false,
                searching: false,
                stripeClasses: [],

                columnDefs: [
                    { orderable: false, targets: -1 }
                ]
            });
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
