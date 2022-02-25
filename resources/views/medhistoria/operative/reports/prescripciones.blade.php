@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="txt_blue_bold mb-0">{{ __('trans.prescriptions') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="ver información del paciente">Home</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.prescriptions') }}</li>
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
                        <input type="text" class="form-control product-search pad_search" id="input-search" placeholder="Búsqueda de Prescripciones">
                    </form>
                </div>
            </div>
        </div>

        <div class="card card-body pad_content_table">
            <table class="data_table">
                <thead>
                    <tr>
                    <th class="txt_blue_light">{{ __('trans.number') }}</th>
                        <th class="txt_blue_light">{{ __('trans.date') }}</th>
                        <th class="txt_blue_light">{{ __('trans.name') }}</th>
                        <th class="txt_blue_light">{{ __('trans.id_number') }}</th>
                        <th class="txt_blue_light">{{ __('trans.Reason_consultation') }}</th>
                        <th class="no-sort"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20190829120014063273</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                            <span class="txt_blue_300 fs-9">Sura EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">1070322656</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">ARRÍTIMIA CARDIACA</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decargar información">
                                <i data-feather="download" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="share-2" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20190829120014063273</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                            <span class="txt_blue_300 fs-9">Sura EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">1070322656</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">ARRÍTIMIA CARDIACA</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decargar información">
                                <i data-feather="download" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="share-2" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20190829120014063273</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                            <span class="txt_blue_300 fs-9">Sura EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">1070322656</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">ARRÍTIMIA CARDIACA</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decargar información">
                                <i data-feather="download" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="share-2" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20190829120014063273</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                            <span class="txt_blue_300 fs-9">Sura EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">1070322656</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">ARRÍTIMIA CARDIACA</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decargar información">
                                <i data-feather="download" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="share-2" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20190829120014063273</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                            <span class="txt_blue_300 fs-9">Sura EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">1070322656</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">ARRÍTIMIA CARDIACA</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decargar información">
                                <i data-feather="download" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="share-2" class="icon_info"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">20190829120014063273</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">14/12/2021 10:05 a.m.</span>
                        </td>
                        <td class="pt-4 pb-3">   
                            <h5 class="txt_blue_bold fs-9 m-0" >Homero Thompson</h5>
                            <span class="txt_blue_300 fs-9">Sura EPS</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">1070322656</span>
                        </td>
                        <td class="pt-4 pb-3">
                            <span class="txt_blue_300 fs-9">ARRÍTIMIA CARDIACA</span>
                        </td>
                        <td class="pad_icon_table pt-4 pb-3">
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información">
                                <i data-feather="eye" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decargar información">
                                <i data-feather="download" class="icon_info"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartir información">
                                <i data-feather="share-2" class="icon_info"></i>
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