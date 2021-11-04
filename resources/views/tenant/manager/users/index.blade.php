@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.users') }}&nbsp;<i class="fas fa-users"></i></h1>
        <a href="{{ route('tenant.manager.users.create') }}" class="button_save_form">
            {{ __('trans.add-users') }}&nbsp;<i class="fas fa-user-plus"></i>
        </a>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('trans.name') }}</th>
                <th>{{ __('trans.id_card') }}</th>
                <th>{{ __('trans.email') }}</th>
                <th>{{ __('trans.status') }}</th>
                <th>{{ __('trans.action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ "$user->name $user->last_name" }}</td>
                <td>{{ $user->id_card }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="{{ ($user->status) ? 'status_active' : 'status_unactive' }}">
                        {{ ($user->status) ? __('trans.active') : __('trans.inactive') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tenant.manager.users.edit', ['user' => $user->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-user-edit"></i> Edit
                    </a>
                    <a href="{{ route('tenant.manager.users.roles', ['id' => $user->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
                       title="Edit user" class="action_table">
                        <i class="fas fa-user-tag"></i> Roles
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
