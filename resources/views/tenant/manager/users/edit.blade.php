@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.users.index') }}">{{ __('trans.users') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.users.edit', ['user' => $user->id]) }}">{{ __('trans.edit-users') }}</a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.users.update', ['user' => $user->id]) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('trans.personal-information') }}</h2>

                <div class="col-8 col-md-3 col-xl-2 imgUser_container_form">
                    <img src="{{ isset($user->photo) ? asset('tenancy/' . $user->photo) : '' }}"
                         alt="" class="img_user_form" id="img-photo">
                    <input type="file" class="input_imgUser_form" id="photo"  name="photo"
                           onchange="get_imagen('photo', 'img-photo')">
                    <label for="" class="label_imgUser_form">{{ __('trans.user-photo') }}</label>
                </div>

                <div class="col-12 col-md-9 col-xl-10 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }} (*)</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" required value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="last_name">{{ __('validation.attributes.last_name') }} (*)</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                               id="last_name" name="last_name" required value="{{ old('last_name', $user->last_name) }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="type_card">{{ __('validation.attributes.type_card') }} (*)</label>
                        <select class="form-control" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card', $user->card_type_id) == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card">{{ __('validation.attributes.id_card') }} (*)</label>
                        <input type="text" class="form-control @error('id_card') is-invalid @enderror" id="id_card"
                               name="id_card" required value="{{ old('id_card', $user->id_card) }}">
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="cellphone">{{ __('validation.attributes.cellphone') }} (*)</label>
                        <input type="number" class="form-control @error('cellphone') is-invalid @enderror"
                               id="cellphone" name="cellphone" required value="{{ old('cellphone', $user->cellphone) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                               name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }} (*)</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                               name="email" required value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="code-profession">{{ __('validation.attributes.code-profession') }}</label>
                        <input type="text" class="form-control @error('code-profession') is-invalid @enderror"
                               id="code-profession" name="code-profession" value="{{ old('code-profession', $user->code_profession) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="profession">{{ __('validation.attributes.profession') }}</label>
                        <input type="text" class="form-control @error('profession') is-invalid @enderror"
                               id="profession" name="profession" required value="{{ old('profession', $user->profession) }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label>
                            {{ __('validation.attributes.digital-signature') }}
                        </label>
                        <div class="custom-file">
                            <label class="custom-file-label" for="digital_signature"></label>
                            <input type="file" class="custom-file-input @error('digital_signature') is-invalid @enderror"
                                   id="digital_signature" name="digital_signature"
                                   value="{{ old('digital_signature') }}" />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="surgery">{{ __('validation.attributes.surgery') }}</label>
                        <select class="form-control @error('surgery') is-invalid @enderror"
                                id="surgery" name="surgery">
                            <option></option>
                            @if(isset($clinics) and (is_array($clinics) or is_object($clinics)))
                                @foreach($clinics as $clinic)
                                    <optgroup label="{{ $clinic->name }}">
                                        @foreach($clinic->surgeries as $surgery)
                                            <option value="{{ $surgery->id }}" {{ old('surgery', $user->surgery_id) == $surgery->id ? 'selected' : '' }}>{{ "$surgery->number - $surgery->type" }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <!-- Additional information user -->
                <h2 class="col-12 title_section_form">Additional Information</h2>

                <div class="col-12 data_row_form">
                    <div class="col-md-4 col-lg-4 data_group_form">
                        <label for="password">{{ __('validation.attributes.password') }}</label>
                        <input type="password" class="input_dataGroup_form" id="password" name="password">
                    </div>

                    <div class="col-md-4 col-lg-4 data_group_form">
                        <label for="password_confirmation">{{ __('trans.confirm-password') }}</label>
                        <input type="password" class="input_dataGroup_form" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="col-md-4 data_group_form">
                        <label for="status">{{ __('validation.attributes.status') }}</label>
                        <ul class="row m-0">
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="1" id="status" name="status" {{ (old('status', $user->status) == 1) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="0" id="status" name="status" {{ (old('status', $user->status) == 0) ? 'checked':'' }}>
                                {{ __('trans.inactive') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="button_container_form">
                <a href="{{ route('tenant.manager.users.index') }}" type="submit" class="button_cancel_form">
                    {{ __('trans.cancel') }}<i class="fas fa-times-circle"></i>
                </a>
                <button type="submit" class="button_save_form">
                    {{ __('trans.save') }}<i class="fas fa-save"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        });
    </script>
@endsection
