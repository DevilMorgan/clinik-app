@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.index') }}">
                        {{ __('trans.agreements') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.agreement.edit', ['agreement' => $agreement->id]) }}">
                        {{ __('trans.edit-agreement') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>
    <form action="{{ route('tenant.operative.agreement.update', ['agreement' => $agreement->id]) }}" method="post" class="form">
        @csrf
        @method('put')
        <div class="main_target_form">
            <div class="form_row">
                <h2 class="col-12 title_section_form">{{ __('trans.agreement-information') }}</h2>
                <div class="col-12 data_row_form">
                    <div class="col-md-6 data_group_form">
                        <label for="name">{{ __('validation.attributes.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name" value="{{ old('name', $agreement->name) }}">
                    </div>
                    <div class="col-md-6 data_group_form">
                        <label for="code">{{ __('validation.attributes.code') }}</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                               name="code" value="{{ old('code', $agreement->code) }}">
                    </div>
                </div>
            </div>

            <div class="container_button">
                <a href="{{ route('tenant.operative.agreement.index') }}" type="submit" class="button_third">{{ __('trans.cancel') }}
                    <i class="fas fa-times-circle pl-2"></i>
                </a>
                <button  class="button_primary">{{ __('trans.save') }}
                    <i class="fas fa-save pl-2"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
