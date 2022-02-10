@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">{{ __('trans.patients') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">{{ __('trans.patients') }}</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.add-patients') }}</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card form_pat_pad_card">
                    <div class="card-body p-0">
                        <form action="" method="post" class="form" enctype="">
                            @csrf
                            <div class="form-body">
                                <!-- User Image -->
                                <div class="row">
                                    <div class="col-md-4 p-0 card_img"> <!-- User image -->
                                 
                                        <img id="img1" src="{{ asset('img/medhistoria') }}/background/Avatar_5.png">
                                       
                                   
                                        <input type="file" name="logo"  id="seleccionArchivos" accept="image/png, image/jpeg" value="">
                                    </div>
                                </div>

                                <!-- Basic Information -->
                                <div class="row">
                                    <div class="col-md-6 col-xl-3 mb-3"><!-- ok -->
                                        <label for="name_first" class="txt_dark_bold fs-5">{{ __('validation.attributes.name_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_first') is-invalid @enderror" 
                                        id="name_first" name="name_first" required value="{{ old('name_first') }}">
                                    </div>
                                    <div class="col-md-6 col-xl-3 mb-3"><!-- ok -->
                                        <label for="name_second" class="txt_dark_bold fs-5">{{ __('validation.attributes.name_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_second') is-invalid @enderror"
                                        id="name_second" name="name_second"  value="{{ old('name_second') }}">
                                    </div>
                                    <div class="col-md-6 col-xl-3 mb-3"><!-- ok -->
                                        <label for="lastname_first" class="txt_dark_bold fs-5">{{ __('validation.attributes.lastname_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_first') is-invalid @enderror"
                                        id="lastname_first" name="lastname_first" required value="{{ old('lastname_first') }}">
                                    </div>
                                    <div class="col-md-6 col-xl-3 mb-3"><!-- ok -->
                                        <label for="lastname_second" class="txt_dark_bold fs-5">{{ __('validation.attributes.lastname_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_second') is-invalid @enderror"
                                        id="lastname_second" name="lastname_second" required value="{{ old('lastname_second') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="type_card" class="txt_dark_bold fs-5">{{ __('validation.attributes.document-type') }}</label>
                                        <select class="form-select form_style_input" id="type_card" name="type_card" required>
                                            <option ></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="id_card" class="txt_dark_bold fs-5">{{ __('validation.attributes.document-number') }}</label>
                                        <input type="text" class="form-control form_style_input @error('id_card') is-invalid @enderror"
                                        id="id_card" name="id_card" required value="{{ old('id_card') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="date-birth" class="txt_dark_bold fs-5">{{ __('validation.attributes.date-birth') }}</label>
                                        <input type="datetime" class="form-control form_style_input @error('date-birth') is-invalid @enderror"
                                        id="date-birth" name="date-birth" value="{{ old('date-birth') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="address" class="txt_dark_bold fs-5">{{ __('validation.attributes.address') }}</label>
                                        <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="phone" class="txt_dark_bold fs-5">{{ __('validation.attributes.phone') }}</label>
                                        <input type="number" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" required value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="cellphone" class="txt_dark_bold fs-5">{{ __('validation.attributes.mobile') }}</label>
                                        <input type="number" class="form-control form_style_input @error('cellphone') is-invalid @enderror"
                                        id="cellphone" name="cellphone" required value="{{ old('cellphone') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="city" class="txt_dark_bold fs-5">{{ __('validation.attributes.city') }}</label>
                                        <input type="text" class="form-control form_style_input @error('city') is-invalid @enderror city"
                                        id="city" name="city" required value="{{ old('city', $perfil['CITY']->config_data->value ?? null) }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="email" class="txt_dark_bold fs-5">{{ __('validation.attributes.email') }}</label>
                                        <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                        id="email" name="email" required value="{{ old('email') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="web-site" class="txt_dark_bold fs-5">{{ __('validation.attributes.web-site') }}</label>
                                        <input type="text" class="form-control form_style_input @error('web-site') is-invalid @enderror"
                                        id="web-site" name="web-site" required value="{{ old('web-site') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="linkedIn" class="txt_dark_bold fs-5">{{ __('validation.attributes.linkedIn') }}</label>
                                        <input type="text" class="form-control form_style_input @error('linkedIn') is-invalid @enderror"
                                        id="linkedIn" name="linkedIn" required value="{{ old('linkedIn') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="other-social-red" class="txt_dark_bold fs-5">{{ __('validation.attributes.other-social-red') }}</label>
                                        <input type="text" class="form-control form_style_input @error('social-red') is-invalid @enderror"
                                        id="other-social-red" name="other-social-red" required value="{{ old('social-red') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="rethus" class="txt_dark_bold fs-5">{{ __('validation.attributes.rethus') }}</label>
                                        <input type="text" class="form-control form_style_input @error('rethus') is-invalid @enderror"
                                        id="rethus" name="rethus" required value="{{ old('rethus') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="college" class="txt_dark_bold fs-5">{{ __('validation.attributes.college') }}</label>
                                        <input type="text" class="form-control form_style_input @error('college') is-invalid @enderror"
                                        id="college" name="college" required value="{{ old('college') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="proffessional-card" class="txt_dark_bold fs-5">{{ __('validation.attributes.proffessional-card') }}</label>
                                        <input type="text" class="form-control form_style_input @error('proffessional-card') is-invalid @enderror"
                                        id="proffessional-card" name="proffessional-card" required value="{{ old('proffessional-card') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="main-speciality" class="txt_dark_bold fs-5">{{ __('validation.attributes.main-speciality') }}</label>
                                        <input type="text" class="form-control form_style_input @error('main-speciality') is-invalid @enderror"
                                        id="main-speciality" name="main-speciality" required value="{{ old('main-speciality') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3"><!-- Ok -->
                                        <label for="other-speciality" class="txt_dark_bold fs-5">{{ __('validation.attributes.other-speciality') }}</label>
                                        <input type="text" class="form-control form_style_input @error('') is-invalid @enderror"
                                        id="other-speciality" name="other-speciality" required value="{{ old('') }}">
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-4" >
                                    <button type="reset" class="btn font-weight-medium fs-7 px-4 me-4" style="background: #DE714B; color: white; font-weight: 100">
                                        {{ __('trans.cancel') }} 
                                    </button>
                                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                        {{ __('trans.save-and-exit') }} 
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Password -->
        <div class="row">
            <div class="col-12">
                <div class="card form_pat_pad_card">
                    <div class="card-body p-0">
                        <form action="" method="post" class="form" enctype="">
                            @csrf
                            <div class="form-body">
                                <!-- Password -->
                                <!-- Manage Password -->
                                <div class="form_content_info_basic">
                                    <h2 class="txt_blue_bold m-0">{{ __('trans.manage-password') }}</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="email" class="txt_dark_bold fs-5">{{ __('validation.attributes.email') }}</label>
                                        <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                        id="email" name="email" required value="{{ old('email') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="new-password" class="txt_dark_bold fs-5">{{ __('validation.attributes.new-password') }}</label>
                                        <input type="text" class="form-control form_style_input @error('new-password') is-invalid @enderror"
                                        id="new-password" name="new-password" required value="{{ old('new-password') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="confirm-password" class="txt_dark_bold fs-5">{{ __('validation.attributes.confirm-password') }}</label>
                                        <input type="text" class="form-control form_style_input @error('confirm-password') is-invalid @enderror"
                                        id="confirm-password" name="confirm-password" required value="{{ old('confirm-password') }}">
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center mt-4" >
                                    <button type="reset" class="btn font-weight-medium fs-7 px-4 me-4" style="background: #DE714B; color: white; font-weight: 100">
                                        {{ __('trans.cancel') }} 
                                    </button>
                                    <button type="submit" class="btn btn-info align-self-center fs-7 px-4" style="font-weight: 100">
                                        {{ __('trans.save-and-exit') }} 
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
    <!-- <script type="text/javascript" src="{{ asset('plugin/DataTables/Bootstrap-5-5.0.1/js/bootstrap.bundle.min.js') }}"></script> -->

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
