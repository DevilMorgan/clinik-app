@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.clinics.index') }}">{{ __('trans.clinics') }}</a>
                </li>
                {{--                <li class="breadcrumb-item"><a href="{{ route('tenant.manager.users.create') }}">{ __('trans.add-users') }}</a></li>--}}
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.clinics') }}&nbsp;<i class="fas fa-users"></i></h1>
        <a href="{{ route('tenant.manager.clinics.create') }}" class="button_save_form">
            {{ __('trans.add-clinic') }}&nbsp;<i class="fas fa-hospital"></i>
        </a>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
        <tr>
            <th>{{ __('trans.name') }}</th>
            <th>{{ __('trans.address') }}</th>
            <th>{{ __('trans.phone') }}</th>
            <th>{{ __('trans.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clinics as $clinic)
            <tr>
                <td>{{ $clinic->name }}</td>
                <td>{{ $clinic->address }}</td>
                <td>{{ "$clinic->phone - $clinic->cellphone" }}</td>
                <td>
                    <a href="{{ route('tenant.manager.clinics.edit', ['clinic' => $clinic->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-edit"></i> {{ __('trans.edit') }}
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
