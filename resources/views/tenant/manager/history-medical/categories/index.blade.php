@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('manager.categories') }}&nbsp;<i class="fas fa-file-signature"></i></h1>
        <a href="{{ route('tenant.manager.history-medical-categories.create') }}" class="button_save_form">
            {{ __('manager.add-category') }}&nbsp;<i class="fas fa-plus"></i>
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
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <span class="{{ ($category->status) ? 'status_active' : 'status_unactive' }}">
                        {{ ($category->status) ? __('trans.active') : __('trans.inactive') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tenant.manager.history-medical-categories.edit', ['history_medical_category' => $category->id]) }}" class="action_table">
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
