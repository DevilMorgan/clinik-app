@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    @php $user = Auth::user()@endphp
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.patients.index') }}">
                        {{ __('trans.patients') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.medical-history.index', ['patient' => $patient->id]) }}">
                        {{ __('trans.medical-history') }}
                    </a>
                </li>
            </ol>
        </nav>
    </nav>

    <div class="agenda_row my-3">
        <h1 class="title_list">{{ __('trans.medical-history') }}&nbsp;<i class="fas fa-file-signature"></i></h1>

        <button type="button" class="button_primary" data-toggle="modal" data-target="#modal-create-history-medical">{{ __('trans.add-medical-history') }} <!-- Botón superior -->
            <i class="fas fa-plus pl-2"></i>
        </button>
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
                    @can('today-edit-history-medical', $record)
                        <a href="{{ route('tenant.operative.medical-history.register', ['patient' => $patient->id, 'record' => $record->id]) }}"
                           class="action_table">
                            <i class="fas fa-edit"></i> {{ __('trans.edit') }}
                        </a>
                    @endcan
                    @if($record->finished)
                        <button class="btn btn-link" data-toggle="modal" data-target="#documents-{{ $record->id }}">
                            <i class="fas fa-file"></i> {{ __('trans.documents') }}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="documents-{{ $record->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('trans.documents') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if(isset($record->documents))
                                            @foreach($record->documents as $document)
                                                <a href="{{ asset($document->directory) }}" class="btn btn-link"
                                                   target="_blank">
                                                    {{ $document->reference }}.pdf
                                                </a>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            {{ __('trans.close') }}
                                        </button>
                                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Create History medical -->
    <div class="modal fade modalC" id="modal-create-history-medical" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">{{ __('trans.medical-history') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('tenant.operative.medical-history.create', ['patient' => $patient->id]) }}" id="form-create-history-medical" method="post">
                @csrf
                <!-- Body Modal-->
                    <div class="modal-body p-0">
                        <div class="items_deleted_quote py-3">
                            <h1 class="title_list" id="">{{ __('trans.add-medical-history') }}
                                <i class="fas fa-plus"></i>
                            </h1>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="date-history-medical">{{ __('validation.attributes.date-history-medical') }}</label>
                                <input type="datetime-local" name="date-history-medical" required id="date-history-medical" class="input_dataGroup_form" value="{{ date('Y-m-d\TH:i') }}">
                            </div>

                            <div class="form-group">
                                <label for="history-medical">{{ __('validation.attributes.history-medical') }}</label>

                                <select name="history-medical" id="history-medical" class="input_dataGroup_form" required>
                                    @foreach($historyMedicals as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date_type">{{ __('validation.attributes.date_type') }}</label>
                                <select name="date_type" id="date_type" class="input_dataGroup_form">
                                    <option></option>
                                    @foreach($date_types as $item)
                                        <option value="{{ $item->id }}" {{ old('date_type') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="agreement">{{ __('validation.attributes.agreement') }}</label>
                                <select name="agreement" id="agreement" class="input_dataGroup_form">
                                    <option></option>
                                    @foreach($agreements as $item)
                                        <option value="{{ $item->id }}" {{ old('agreement') == $item->id ? 'selected' : '' }}>{{ $item->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="consent">{{ __('validation.attributes.consent') }}</label>
                                <select name="consent" id="consent" class="input_dataGroup_form">
                                    <option></option>
                                    @foreach($consents as $item)
                                        <option value="{{ $item->id }}" {{ old('consent') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="surgery">{{ __('validation.attributes.surgery') }}</label>

                                <select class="input_dataGroup_form @error('surgery') is-invalid @enderror"
                                        id="surgery" name="surgery">
                                    @if(isset($clinics) and (is_array($clinics) or is_object($clinics)))
                                        @foreach($clinics as $clinic)
                                            <optgroup label="{{ $clinic->name }}">
                                                @foreach($clinic->surgeries as $surgery)
                                                    <option value="{{ $surgery->id }}" {{ old('surgery', $user->surgery_id) == $surgery->id ? 'selected' : '' }}>{{ "$surgery->number - $surgery->type" }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="footer_modal">
                        <div class="container_button"> <!-- Buttons -->
                            <button type="button" class="button_third" data-dismiss="modal">{{ __('trans.cancel') }}
                                <i class="fas fa-times-circle pl-2"></i>
                            </button>

                            <button type="submit" id="btn-confirm-cancel" class="button_primary">{{ __('trans.confirm') }}
                                <i class="fas fa-check-circle pl-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
