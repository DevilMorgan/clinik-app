@extends('medhistoria.layouts.app')
@section('title', __('trans.patients'))

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="text-themecolor mb-0" style="font-weight: bold">{{ __('trans.contacts-us') }}</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">{{ __('trans.home') }}</a>
                </li>
                <li class="breadcrumb-item ">{{ __('trans.contacts-us') }}</li>
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
                        <h2 class="txt_blue_bold">En esta sección usted podra radicar sus solicitudes.</h2>
                        <p class="txt_dark_400 fs-6">Seleccione el tema, tipo de solicitud y compleméntela con una descripción y/o un archivo adjunto. Pronto recibirá respuesta</p>
                        <form action="" method="post" class="form" enctype="">
                            @csrf
                            <div class="form-body">
                                <!-- Name, phone and email -->
                                <div class="row mt-4"> 
                                    <div class="col-md-4 mb-3"><!-- Ok -->
                                        <label for="name_first" class="txt_dark_bold fs-4">{{ __('validation.attributes.name_first') }}</label>
                                        <input type="text" class="form-control form_style_input @error('name_first') is-invalid @enderror"
                                        id="name_first" name="name_first" required value="{{ old('name_first') }}">
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

                                <!-- Theme and type request -->
                                <div class="row"> 
                                    <div class="col-md-6 mb-3"><!-- Ok -->
                                        <label for="theme" class="txt_dark_bold fs-4">{{ __('validation.attributes.theme') }}</label>
                                        <input type="text" class="form-control form_style_input @error('theme') is-invalid @enderror"
                                        id="theme" name="theme" required value="{{ old('theme') }}">
                                    </div>
                                    <div class="col-md-6 mb-3"><!-- ok -->
                                        <label for="type-request" class="txt_dark_bold fs-4">{{ __('validation.attributes.type-request') }}</label>
                                        <input type="text" class="form-control form_style_input @error('type-request') is-invalid @enderror"
                                        id="type-request" name="type-request" required value="{{ old('type-request') }}">
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="row"> 
                                    <div class="col-md-12 mb-3">
                                        <label for="message" class="txt_dark_bold fs-4">{{ __('validation.attributes.message') }}</label>
                                        <textarea class="form-control form_style_input form_textarea" placeholder="" 
                                        id="message" style="height: 100px; overflow-y: hidden"></textarea>
                                    </div>
                                </div>
                             
                                <!-- Input upload file -->
                                <div class="row p-3 mb-3"> 
                                    <div class="col-md-5 dropzone pqr_dropzone p-2"  id="kt_dropzonejs_example_1">
                                        <div class="dz-message needsclick m-0 p-5">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i data-feather="file" class="txt_blue_light me-3" style="width: 40px; height: 40px"></i>
                                                <h3 class="fs-4 txt_dark_bold pt-2">Adjuntar archivos</h3>
                                                <!-- <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Saved and delete buttoms -->
                                    <div class="col-md-7 text-center align-self-end" > 
                                        <button type="reset" class="btn font-weight-medium fs-7 px-5 me-4" style="background: #DE714B; color: white; font-weight: 100">
                                            {{ __('trans.cancel') }} 
                                        </button>
                                        <button type="submit" class="btn btn-info align-self-center fs-7 px-3" style="font-weight: 100">
                                            {{ __('trans.save-and-exit') }} 
                                        </button>
                                    </div>
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
