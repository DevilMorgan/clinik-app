@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
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
                {{--                <li class="breadcrumb-item"><a href="{{ route('tenant.manager.models-medical-history.create') }}">{{ __('manager.add-model') }}</a></li>--}}
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('manager.models') }}&nbsp;<i class="fas fa-file-signature"></i></h1>
        <a href="{{ route('tenant.manager.models-medical-history.create') }}" class="button_save_form">
            {{ __('manager.add-model') }}&nbsp;<i class="fas fa-plus"></i>
        </a>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('trans.name') }}</th>
                <th>{{ __('trans.status') }}</th>
                <th>{{ __('trans.action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{ $model->name }}</td>
                <td>
                    <span class="{{ ($model->status) ? 'status_active' : 'status_unactive' }}">
                        {{ ($model->status) ? __('trans.active') : __('trans.inactive') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tenant.manager.models-medical-history.edit', ['models_medical_history' => $model->id]) }}" class="action_table">
                        <i class="fas fa-user-edit"></i> Edit
                    </a>
                    <a href="{{ route('tenant.manager.models-medical-history.order_by', ['id' => $model->id]) }}" class="action_table">
                        <i class="fas fa-sort"></i> {{ __('manager.order') }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#patients-table').DataTable( {
                responsive: true
            } );
        } );
    </script>
@endsection
