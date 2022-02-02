@extends('medhistoria.layouts.app')
@section('title', __('trans.home'))

@section('styles')

@endsection

@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0" style="font-weight: bold">Pacientes</h3>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">{{ __('trans.home') }}</a>
                </li>
{{--                <li class="breadcrumb-item ">{{ __('trans.') }}</li>--}}
            </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">

        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">

    </div>
    <!-- End Container fluid  -->
@endsection

@section('scripts')

@endsection
