@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="txt_blue_bold mb-0">{{ __('trans.agreements') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="ver información del paciente">Home</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.agreements') }}</li>
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
                        <input type="text" class="form-control product-search pad_search" id="input-search" placeholder="Búsqueda de Convenios">
                    </form>
                </div>
                <div class="col-md-8 col-xl-6 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <!-- <a href="{{ route('medhistoria.patients.create') }}" id="btn-add-contact" class="btn btn-info align-self-center fs-7 fw_bold py-2 d-flex">
                        <i data-feather="plus"></i> &nbsp; {{ __('trans.add-agreement') }}
                    </a> -->
                    <button id="btn-add-agreement" class="btn btn-info align-self-center fs-7 fw_bold py-2 d-flex" 
                            data-bs-target="#vertical-center-scroll-modal_agreement" data-bs-toggle="modal"> 
                        <i data-feather="plus"></i> &nbsp; {{ __('trans.add-agreement') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="card card-body pad_content_table">
            <table class="data_table">
                <thead>
                    <tr>
                        <th class="txt_blue_light">{{ __('trans.code') }}</th>
                        <th class="txt_blue_light">{{ __('trans.name') }}</th>
                        <th class="txt_blue_light">{{ __('trans.discount') }}</th>
                        <th class="no-sort"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">S123458</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Soy Salud</h5>
                            <span class="txt_blue_300 fs-9">EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">10%</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="credit-card" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">S123458</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Soy Salud</h5>
                            <span class="txt_blue_300 fs-9">EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">10%</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="credit-card" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">S123458</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Soy Salud</h5>
                            <span class="txt_blue_300 fs-9">EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">5%</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="credit-card" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">S123458</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Soy Salud</h5>
                            <span class="txt_blue_300 fs-9">EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20%</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="credit-card" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">S123458</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Soy Salud</h5>
                            <span class="txt_blue_300 fs-9">EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">15%</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="credit-card" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">S123458</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Soy Salud</h5>
                            <span class="txt_blue_300 fs-9">EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">30%</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información">
                                <i data-feather="edit-3" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="credit-card" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->

    <!-- Modal   Nueva Consulta -->
    <div class="modal fade" id="vertical-center-scroll-modal_agreement" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable hc_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex align-self-start">
                        <h2 class="txt_blue_bold fs-10 mt-3">{{ __('trans.new_query') }}</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Datos del paciente -->
                        <div class="col-md-12 mb-5">
                            <h2 class="txt_blue_bold f-10">{{ __('trans.patient') }}: Homero Thompson</h2>
                            <h4 class="txt_dark_400 fs-5 mb-1">CC: 000 000 000 | {{ __('trans.birthday') }}: 28/11/1985</h4>
                            <h4 class="txt_dark_400 fs-5 mb-1">{{ __('trans.health_service') }}: Sura E.P.S.</h4>
                        </div>
                    </div>

                    <form action="" method="post" class="form" enctype="">
                        @csrf
                        <div class="row">
                            <!-- Motivo de consulta -->
                            <div class="col-md-8 mb-3">
                                <label for="reason_consultation" class="txt_dark_bold fs-4">{{ __('validation.attributes.reason_consultation') }}</label>
                                <input type="text" class="form-control form_style_input @error('reason_consultation') is-invalid @enderror"
                                id="reason_consultation" name="reason_consultation" required value="{{ old('reason_consultation') }}">
                            </div>
                            <!-- Fecha de consulta -->
                            <div class="col-md-4 mb-3">
                                <label for="consultation_date" class="txt_dark_bold fs-4">{{ __('validation.attributes.consultation_date') }}</label>
                                <input type="date" class="form-control form_style_input @error('consultation_date') is-invalid @enderror"
                                id="consultation_date" name="consultation_date" required value="{{ old('consultation_date') }}">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Modelo -->
                            <div class="col-md-8 mb-3">
                                <label for="template" class="txt_dark_bold fs-4">{{ __('validation.attributes.template') }}</label>
                                <select class="form-select form_style_input @error('template') is-invalid @enderror" id="template" name="template">
                                        <option ></option>
                                        <option value="template 1" {{ (old('template') == 'template 1') ? 'selected' : '' }}>{{ __('trans.template') }} 1</option>
                                        <option value="template 2" {{ (old('template') == 'template 2') ? 'selected' : '' }}>{{ __('trans.template') }} 2</option>
                                        <option value="template 3" {{ (old('template') == 'template 3') ? 'selected' : '' }}>{{ __('trans.template') }} 3</option>
                                    </select>
                            </div>
                            <!-- Tipo de cita -->
                            <div class="col-md-4 mb-3">
                                <label for="date-type" class="txt_dark_bold fs-4">{{ __('validation.attributes.date-type') }}</label>
                                <select class="form-select form_style_input @error('date-type') is-invalid @enderror" id="date-type" name="date-type">
                                        <option ></option>
                                        <option value="date-types 1" {{ (old('date-type') == 'date-types 1') ? 'selected' : '' }}>{{ __('trans.date-types') }} 1</option>
                                        <option value="date-types 2" {{ (old('date-type') == 'date-types 2') ? 'selected' : '' }}>{{ __('trans.date-types') }} 2</option>
                                        <option value="date-types 3" {{ (old('date-type') == 'date-types 3') ? 'selected' : '' }}>{{ __('trans.date-types') }} 3</option>
                                    </select>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="text-center mt-5" >
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4 me-3" 
                                    style="font-weight: 100; background: #DE714B; color: white; border: 1px solid #DE714B">
                                {{ __('trans.cancel') }} 
                            </button>
                            <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                {{ __('trans.confirm') }} 
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/js/dataTables.responsive.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.data_table').DataTable( {
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

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        })
    </script>
@endsection