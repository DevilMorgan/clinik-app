@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <form action="{{ route('tenant.patients.create') }}" method="post" class="form">
        @csrf
        <div class="patient_form">
            <div class="form_row">
                <div class="col-12 col-md-12 col-xl-12 data_row">
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="type_card">{{ __('validation.attributes.type_card') }}</label>
                        <select class="form-control" id="type_card" name="type_card" required>
                            <option></option>
                            @foreach($card_types as $item)
                                <option value="{{ $item->id }}" {{ old('type_card') == $item->id ? 'selected' : '' }}>{{ $item->name_short }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="id_card">{{ __('validation.attributes.id_card') }}</label>
                        <input type="text" class="form-control @error('id_card') is-invalid @enderror" id="id_card" name="id_card" required value="{{ old('id_card') }}">
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="email">{{ __('validation.attributes.email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="medical_security">{{ __('validation.attributes.medical_security') }}</label>
                        <input type="text" class="form-control @error('medical_security') is-invalid @enderror" id="medical_security" name="medical_security" required value="{{ old('medical_security') }}">
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="cellphone">{{ __('validation.attributes.cellphone') }}</label>
                        <input type="number" class="form-control @error('cellphone') is-invalid @enderror" id="cellphone" name="cellphone" required value="{{ old('cellphone') }}">
                    </div>
                    <div class="form-group col-md-6 p-0 px-md-2">
                        <label for="phone">{{ __('validation.attributes.phone') }}</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                    </div>
                </div>
            </div>
            <div class="form-group btn_save_formPatient">
                <button type="submit" class="btn">{{ __('trans.save') }} <i class="fas fa-save"></i> </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
