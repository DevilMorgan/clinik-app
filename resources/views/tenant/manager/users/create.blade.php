@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <form action="{{ route('tenant.manager.users.store') }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('trans.personal-information') }}</h2>

                <div class="col-8 col-md-3 col-xl-2 imgUser_container_form">
                    <img src="" alt="" class="img_user_form">
                    <input type="file" class="input_imgUser_form" id="">
                    <label for="" class="label_imgUser_form">{{ __('trans.user-photo') }}</label>
                </div>

                <div class="col-12 col-md-9 col-xl-10 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="type_card">{{ __('validation.attributes.type_card') }}</label>
                        <select class="form-control" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card') == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 data_group_form">
                        <label for="id_card">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" class="form-control @error('id_card') is-invalid @enderror" id="id_card" name="id_card" required value="{{ old('id_card') }}">
                    </div>
                </div>

                <div class="col-12 data_row_form">
                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="cellphone">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="number" class="form-control @error('cellphone') is-invalid @enderror" id="cellphone" name="cellphone" required value="{{ old('cellphone') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                    </div>

                    <div class="col-md-6 col-lg-4 data_group_form">
                        <label for="email">{{ __('validation.attributes.email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
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
                                       type="radio" value="1" id="status" name="status" {{ (old('status') == 0) ? 'checked':'' }}>
                                {{ __('trans.active') }}
                            </li>
                            <li class="col-4 li_input_form">
                                <input class="inputRadio_form @error('status') is-invalid @enderror"
                                       type="radio" value="0" id="status" name="status" {{ (old('status') == 1) ? 'checked':'' }}>
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

@endsection
