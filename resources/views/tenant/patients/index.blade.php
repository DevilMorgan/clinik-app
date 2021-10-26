@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/datatables.min.css') }}"/>
@endsection

@section('content')
    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.patients') }}&nbsp;<i class="fas fa-users"></i></h1>
        <a href="{{ route('tenant.patients.create') }}" class="button_save_form">{{ __('trans.add-patients') }}&nbsp;<i class="fas fa-user-plus"></i> </a>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('trans.name') }}</th>
                <th>{{ __('trans.id-card') }}</th>
                <th>{{ __('trans.age') }}</th>
                <th>{{ __('trans.status') }}</th>
                <th>{{ __('trans.action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ "$patient->name $patient->last_name" }}</td>
                <td>{{ $patient->id_card }}</td>
                <td>{{ $patient->age }}</td>
                <td>
                    <span class="{{ ($patient->status) ? 'status_active' : 'status_unactive' }}">
                        {{ ($patient->status) ? __('trans.active') : __('trans.inactive') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tenant.patients.edit', ['patient' => $patient->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-user-edit"></i> Edit
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
