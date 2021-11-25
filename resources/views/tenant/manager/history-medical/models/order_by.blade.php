@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.models-medical-history.index') }}">
                        {{ __('manager.models') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.models-medical-history.order_by', ['id' => $model->id]) }}">
                        {{ __('manager.order-categories') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.models-medical-history.order_by_save', ['id' => $model->id]) }}" method="post" class="form">
        @csrf
        <div class="main_target_form">
            <div class="form_row">
                <!-- User information -->
                <h2 class="col-12 title_section_form">{{ __('manager.order-categories') }}</h2>
                <ul id="sortable" class="list-group">
                    @foreach($model->history_medical_categories as $category)
                        <li class="list-group-item list-group-item-action">
                            {{ $category->name }}
                            <input type="hidden" name="categories[]" id="categories" value="{{ $category->id }}">
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="button_container_form">
                <a href="{{ route('tenant.manager.models-medical-history.index') }}" class="button_cancel_form">
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
    <script src="{{ asset('plugin/bootstrap-sortable/jquery.sortable.min.js') }}"></script>
    <script>
        $('#sortable').sortable();
    </script>
@endsection
