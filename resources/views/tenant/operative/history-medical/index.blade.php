@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">
                        {{ __('trans.patients') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.edit', ['patient' => $patient->id]) }}">
                        {{ __('trans.medical-history') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.medical-history') }}&nbsp;<i class="fas fa-file-signature"></i></h1>
        <a href="{{ route('tenant.patients.create') }}" class="button_save_form">
            {{ __('trans.add-medical-history') }}&nbsp;<i class="fas fa-plus"></i>
        </a>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('trans.date') }}</th>
                <th>{{ __('manager.model') }}</th>
                <th>{{ __('trans.action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($patient->history_medical_records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ date('d/M Y h:i a', strtotime($record->date)) }}</td>
                <td>{{ $record->history_medical_model->name }}</td>
                <td>
                    <a href="{{ route('tenant.patients.edit', ['patient' => $patient->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-edit"></i> Edit
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
