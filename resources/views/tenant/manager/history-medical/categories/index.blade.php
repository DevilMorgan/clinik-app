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
                        {{ __('manager.categories') }}
                    </a>
                </li>
                {{--<li class="breadcrumb-item"><a href="{{ route('tenant.manager.history-medical-categories.create') }}">{{ __('manager.add-category') }}</a></li>--}}
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('manager.categories') }}<i class="fas fa-file-signature pl-2"></i></h1>

        <a href="{{ route('tenant.manager.history-medical-categories.create') }}" class="button_primary">{{ __('manager.add-category') }} <!-- Botón superior -->
            <i class="fas fa-plus pl-2"></i>
        </a>
    </div>

    <table id="patients-table" class="display nowrap table_agenda my-3" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('trans.name') }}</th>
                <th>{{ __('manager.models') }}</th>
                <th>{{ __('trans.status') }}</th>
                <th>{{ __('trans.action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    @php
                        $models = $category->history_medical_modules->implode('name', '</span><span class="badge badge-pill badge-info">') ;
                        $models = "<span class='badge badge-pill badge-info'>$models</span>";
                    @endphp
                    {!! $models !!}
                </td>
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
