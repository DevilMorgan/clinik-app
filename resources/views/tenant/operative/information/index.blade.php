@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('trans.information') }}</a></li>
            </ol>
        </nav>
    </nav>

    <section class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="card mx-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('trans.days_off') }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <a href="{{ route('tenant.operative.information.days_off') }}" class="btn btn-primary">{{ __('trans.registers') }}</a>
                        <a href="{{ route('tenant.operative.information.days_off-template') }}" class="btn btn-success" target="_blank">{{ __('trans.template') }}</a>
                    </div>
                </div>
                <div class="card mx-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('trans.prescriptions') }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <a href="{{ route('tenant.operative.information.prescriptions') }}" class="btn btn-primary">{{ __('trans.registers') }}</a>
                        <a href="{{ route('tenant.operative.information.prescriptions-template') }}" class="btn btn-success" target="_blank">{{ __('trans.template') }}</a>
                    </div>
                </div>
                <div class="card mx-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('trans.procedures') }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <a href="{{ route('tenant.operative.information.procedures') }}" class="btn btn-primary">{{ __('trans.registers') }}</a>
                        <a href="{{ route('tenant.operative.information.procedures-template') }}" class="btn btn-success" target="_blank">{{ __('trans.template') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
