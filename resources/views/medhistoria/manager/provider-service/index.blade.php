@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">Mi Consultorio</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">{{ __('trans.home') }}</a>
                </li>
                <li class="breadcrumb-item ">Mi Perfil</li>
                <li class="breadcrumb-item ">Mi Consultorio</li>
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <div class="container-fluid">
        <!-- Manage Password -->
        <div class="row">
            <div class="col-12">
                <div class="card form_pat_pad_card">
                    <div class="card-body p-0">
                        <form action="" method="post" class="form" enctype="">
                            @csrf
                            <div class="form-body">
                                <!-- Names and last names -->
                                <div class="row"> 
                                    <div class="col-md-3 mb-3"><!-- Ok -->
                                        <label for="firts-name-social-reason" class="txt_dark_bold fs-4">{{ __('validation.attributes.first-name-social-reason') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_first') is-invalid @enderror"
                                        id="firts-name-social-reason" name="firts-name-social-reason" required value="{{ old('firts-name-social-reason') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="name_second" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_second') is-invalid @enderror"
                                        id="name_second" name="name_second"  value="{{ old('name_second') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="lastname_first" class="txt_dark_bold fs-4">{{ __('validation.attributes.lastname_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_first') is-invalid @enderror"
                                        id="lastname_first" name="lastname_first" required value="{{ old('lastname_first') }}">
                                    </div>
                                    <div class="col-md-3 mb-3"><!-- ok -->
                                        <label for="lastname_second" class="txt_dark_bold fs-4">{{ __('validation.attributes.lastname_second') }}</label>
                                        <input type="text" class="form-control form_style_input @error('lastname_second') is-invalid @enderror"
                                        id="lastname_second" name="lastname_second" required value="{{ old('lastname_second') }}">
                                    </div>
                                </div>

                                <!-- Theme and type request -->
                                <div class="row"> 
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="type_card" class="txt_dark_bold fs-4">{{ __('validation.attributes.document-type') }}</label>
                                        <select class="form-select form_style_input" id="type_card" name="type_card" required>
                                            <option ></option>
                                            @foreach($card_types as $item)
                                                <option value="{{ $item->id }}" {{ old('type_card') == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <div class="row">
                                            <div class="col-md-9 pe-0">
                                                <label for="id_card" class="txt_dark_bold fs-4">{{ __('validation.attributes.document-number') }}</label>
                                                <input type="text" class="form-control form_style_input noBorder_radius_right @error('id_card') is-invalid @enderror"
                                                id="id_card" name="id_card" required value="{{ old('id_card', (isset($perfil['ID_CARD'])) ? $perfil['ID_CARD']->config_data->value:null) }}">
                                            </div>
                                            <div class="col-md-3 ps-0">
                                                <label for="dv" class="txt_dark_bold fs-4">{{ __('validation.attributes.verification-digit') }}</label>
                                                <input type="text" class="form-control form_style_input noBorder_radius_left @error('dv') is-invalid @enderror"
                                                id="dv" name="dv" value="{{ old('dv') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="type_taxpayer" class="txt_dark_bold fs-4">{{ __('validation.attributes.type_taxpayer') }}</label>
                                        <select class="form-select form_style_input @error('type_taxpayer') is-invalid @enderror"
                                            id="type_taxpayer" name="type_taxpayer" required >
                                            <option ></option>
                                            <option value="natural" {{ old('type_card', (isset($perfil['TYPE_TAXPAYER'])) ? $perfil['TYPE_TAXPAYER']->config_data->value:null) == 'natural' ? 'selected' : '' }}>Natural</option>
                                            <option value="jurídica" {{ old('type_card', (isset($perfil['TYPE_TAXPAYER'])) ? $perfil['TYPE_TAXPAYER']->config_data->value:null) == 'jurídica' ? 'selected' : '' }}>Jurídica</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="row"> 
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="country" class="txt_dark_bold fs-4">{{ __('validation.attributes.country') }}</label>
                                        <input type="text" class="form-control form_style_input @error('country') is-invalid @enderror country"
                                        id="country" name="country" required value="{{ old('country', $perfil['COUNTRY']->config_data->value ?? null) }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="department" class="txt_dark_bold fs-4">{{ __('validation.attributes.department') }}</label>
                                        <input type="text" class="form-control form_style_input @error('department') is-invalid @enderror department"
                                        id="department" name="department" required value="{{ old('department', $perfil['DEPARTMENT']->config_data->value ?? null) }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="city" class="txt_dark_bold fs-4">{{ __('validation.attributes.city-municipality') }}</label>
                                        <input type="text" class="form-control form_style_input @error('city') is-invalid @enderror city"
                                        id="city" name="city" required value="{{ old('city', $perfil['CITY']->config_data->value ?? null) }}">
                                    </div>
                                </div>
                             
                                <!-- Input upload file -->
                                <div class="row"> 
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="address" class="txt_dark_bold fs-4">{{ __('validation.attributes.address') }}</label>
                                        <input type="text" class="form-control form_style_input @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- ok -->
                                        <label for="phone" class="txt_dark_bold fs-4">{{ __('validation.attributes.phone') }}</label>
                                        <input type="text" class="form-control form_style_input @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" required value="{{ old('phone', (isset($perfil['PHONE'])) ? $perfil['PHONE']->config_data->value:null) }}">
                                    </div>
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="email" class="txt_dark_bold fs-4">{{ __('validation.attributes.email') }}</label>
                                        <input type="email" class="form-control form_style_input @error('email') is-invalid @enderror"
                                        id="email" name="email" required value="{{ old('email', (isset($perfil['EMAIL'])) ? $perfil['EMAIL']->config_data->value:null) }}">
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="txt_dark_bold fs-4">Nombre asignado al administrador por el plan de beneficios en el SGSSS</label>
                                        <input type="text" class="form-control form_style_input"
                                        id="" name="" required value="{{ old('') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="txt_dark_bold fs-4">Código asignado al administrador por el plan de beneficios en el SGSSS</label>
                                        <input type="text" class="form-control form_style_input"
                                        id="" name="" required value="{{ old('') }}">
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>
@endsection
