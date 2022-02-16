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
                    <a href="{{ route('medhistoria.patients.create') }}" id="btn-add-contact" class="btn btn-info align-self-center fs-7 fw_bold py-2 d-flex">
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
                @if($patients->isNotEmpty())
                    @foreach($patients as $patient)
                        <tr>
                            <td>
                                <div class="content_data_user">
                                    <img src="{{ asset(isset($patient->photo) ? "tenancy/{$patient->photo}":'img/medhistoria/icon/icono-paciente-11.svg') }}" alt="user" class="rounded-circle" width="60"/>
                                    <div class="content_txt_cell_user">
                                        <h5 class="txt_blue_bold fs-9 m-0" >{{ $patient->full_first_name }}</h5>
                                        <span class="txt_blue_300 fs-9">{{ $patient->entity }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="txt_blue_300 fs-9">{{ $patient->id_card }}</span>
                            </td>
                            <td>
                                <p class="txt_blue_300 fs-9 m-0">{{ $patient->phone }}</p>
                                <p class="txt_blue_300 fs-9 m-0">{{ $patient->cellphone }}</p>
                            </td>
                            <td>
                                <span class="txt_blue_300 fs-9">{{ $patient->city }}</span>
                            </td>
                            <td>
                                <span class="txt_blue_300 fs-9">{{ $patient->last_date }}</span>
                            </td>
                            <td class="pad_icon_table">
                                <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ver información del paciente">
                                    <i data-feather="eye" class="icon_info"></i>
                                </a>
                                <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar nueva consulta">
                                    <i data-feather="file-plus" class="icon_info"></i>
                                </a>
                                <a href="{{ route('medhistoria.patients.edit', ['patient' => $patient->id]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar información del paciente">
                                    <i data-feather="edit-3" class="icon_info"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
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
                {{--ajax: "{{ route('medhistoria.patients.search') }}",--}}
                {{--columns: [--}}
                {{--    { "data": "id","name": "id" },--}}
                {{--    { "data": "active_principle","name": "active_principle" },--}}
                {{--    { "data": "product","name": "product" },--}}
                {{--    { "data": "reference_unit","name": "reference_unit" },--}}
                {{--    { "data": "role_name","name": "role_name" },--}}
                {{--    { "data": "action","name": "action" },--}}
                {{--    //{ "data": "pharmaceutical_form" }--}}
                {{--],--}}
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
