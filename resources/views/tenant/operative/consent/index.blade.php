@extends('tenant.layouts.app')

@section('styles')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/datatables.min.css') }}"/>--}}
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tenant.operative.consent.index') }}">{{ __('trans.consent') }}</a></li>
                {{--<li class="breadcrumb-item"><a href="#">Patient-list</a></li>--}}
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.consent') }}&nbsp;<i class="fas fa-handshake"></i></h1>

        <a href="{{ route('tenant.operative.consent.create') }}" class="button_primary">{{ __('trans.add-consent') }}
            <i class="fas fa-handshake pl-2"></i>
        </a>
    </div>

    <table id="patients-table" class="table table-hover table_agenda my-3" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('trans.name') }}</th>
                <th>{{ __('trans.action') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($consents as $consent)
                <tr>
                    <td>{{ $consent->id }}</td>
                    <td>{{ $consent->name }}</td>
                    <td>
                        <a href="{{ route('tenant.operative.consent.edit', ['consent' => $consent->id]) }}" class="action_table">
                            <i class="fas fa-edit"></i>&nbsp;Edit
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
