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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card  form_pat_pad_card">
                    <div>
                        <h2 class="txt_blue_bold">Datos del Paciente</h2>
                    </div>

                    <div class="card-body p-0">
                        <form action="#">
                            <div class="form-body">
                                <section class="d-flex justify-content-center">
                                    <img src="{{ asset('img/medhistoria') }}/users/1.jpg" class="rounded-circle form_user_img" width="200">
                                </section>
                                <div class="form_content_info_basic">
                                    <i data-feather="plus-circle" class="txt_blue_bold"></i>
                                    <h2 class="txt_blue_bold m-0">Información Básica</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="" classs="txt_dark_400 fs-5">Primer Nombre</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="" classs="txt_dark_400 fs-5">Segundo Nombre</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="" classs="txt_dark_400 fs-5">Primer Apellido</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="" classs="txt_dark_400 fs-5">Segundo Apellido</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-2">
                                    </div>
                                    </div>
                                    <div class="col-md-10">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-10">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-3">
                                    </div>
                                    </div>
                                    <div class="col-md-9">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-9">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-4">
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-8">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-5">
                                    </div>
                                    </div>
                                    <div class="col-md-7">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-7">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-6">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="col-md-6">
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="text-end">
                                    <button type="submit" class="
                                        btn btn-light-info
                                        text-info
                                        font-weight-medium
                                    ">
                                    Submit
                                    </button>
                                    <button type="reset" class="
                                        btn btn-light-danger
                                        text-danger
                                        font-weight-medium
                                    ">
                                    Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Responsive-2.2.9/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/DataTables/Bootstrap-5-5.0.1/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on( 'shown.bs.tab', function (e) {
                $(".data_table").DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });

            $('.data_table').DataTable( {
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
                },
                targets: [3],
                responsive: true,
                paging:   false,
                ordering: false,
                info:     false,
                searching: false,
                stripeClasses: [],
            });
        } );

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
