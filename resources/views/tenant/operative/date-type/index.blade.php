@extends('tenant.layouts.app')

@section('styles')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/datatables.min.css') }}"/>--}}
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tenant.patients.index') }}">{{ __('trans.date-type') }}</a></li>
                {{--                <li class="breadcrumb-item"><a href="#">Patient-list</a></li>--}}
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.date-type') }}&nbsp;<i class="fas fa-receipt"></i></h1>
        <a href="{{ route('tenant.operative.date-type.create') }}" class="button_save_form">{{ __('trans.add-date-type') }}&nbsp;<i class="fas fa-receipt"></i> </a>
    </div>

    <table id="patients-table" class="table table-hover table_agenda my-3" style="width:100%">
        <thead>
        <tr>
            <th>{{ __('trans.name') }}</th>
            <th>{{ __('trans.price') }}</th>
            <th>{{ __('trans.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dateTypes as $dateType)
            <tr>
                <td>{{ $dateType->name }}</td>
                <td>{{ $dateType->price }}</td>
                <td>
                    <a href="{{ route('tenant.operative.date-type.edit', ['date_type' => $dateType->id]) }}" data-toggle="tooltip" data-container=".tooltip-danger"
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

@endsection
