@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.css') }}">
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Módulos historia clínica</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6"><b>Nombre:</b> {{ $module->name }}</div>
            <div class="col-md-6"><b>Estado:</b> {{ $module->status ? 'Activado' : 'Desactivado' }}</div>
            <div class="col-12">
                <b>Descripción:</b>
                <p>{{ $module->description }}</p>
            </div>
        </div>

        <form action="{{ route('system.history-clinic.modules.config-save', ['module' => $module->id]) }}" method="post" id="form-config-template">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-8 mb-5">
                    <ul class="list-group" id="selector">
                        @if($module->hc_variables->isNotEmpty())
                            @foreach($module->hc_variables as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex">
                                        <i class="fas fa-sort fa-2x my-auto"></i>
                                        <div class="my-auto px-2">
                                            {{ $item->name }}
                                            <input type="hidden" name="order[]" value="{{ $item->id }}">
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('system.history-clinic.variables.edit', ['variable' => $item->id]) }}" class="btn btn-primary">
                                            Editar <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-delete-module">
                                            Eliminar <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">
                    <label for="variables">Variables</label>
                    <div class="input-group mb-3">
                        <select id="variables" class="form-control">
                            <option></option>
                            @isset($variables)
                                @foreach($variables as $variable)
                                    <option value="{{ $variable->id }}">{{ $variable->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                        <button class="btn btn-outline-info" type="button" id="btn-add-variable">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-outline-dark" type="button" id="btn-info-variable">
                            <i class="fas fa-question"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('system.history-clinic.modules.index') }}" class="btn btn-secondary mx-2">
                        Regresar <i class="fas fa-angle-left"></i>
                    </a>
                    <button class="btn btn-success" type="submit">
                        Guardar <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>
    <div class="modal" tabindex="-1" id="modal-variable">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Descripción</h4>
                    <p class="description-text"></p>
                    <h4>Estado</h4>
                    <p class="status-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.js') }}"></script>
    <script type="application/javascript">
        $( "#selector" ).sortable();

        //modal
        var modalVariable = new bootstrap.Modal(document.getElementById('modal-variable'), {
            keyboard: false
        });

        //function search variable
        var variable = (id) => {
            return $.get("{{ route('system.history-clinic.variables.search') }}?term=" + id);
        };

        //Add new variable
        $('#btn-add-variable').click(function () {
            var variable1 = variable($('#variables').val());

            $.when(variable1).done(function (v) {
                if (v.name !== undefined)
                {
                    $('#selector').append('<li class="list-group-item d-flex justify-content-between">' +
                        '<div class="d-flex">' +
                        '<i class="fas fa-sort fa-2x my-auto"></i>' +
                        '<div class="my-auto px-2">' +
                        '<input type="hidden" name="order[]" value="' + v.id + '">' +
                        v.name +
                        '</div>' +
                        '</div>' +
                        '<div>' +
                        '<a href="' + v.url + '" class="btn btn-primary">' +
                        'Editar <i class="fas fa-edit"></i>' +
                        '</a>' +
                        '<button type="button" class="btn btn-danger btn-delete-variable">' +
                        'Eliminar <i class="fas fa-trahs"></i>' +
                        '</button>' +
                        '</div>' +
                        '</li>');
                }

                $('#variables').val('');
            });
        });

        //Remove item variable
        $('#selector').on('click', '.btn-delete-variable', function () {
            Swal.fire({
                title: 'Desea eliminar la variable?',
                showCancelButton: true,
                confirmButtonText: 'ELiminar'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $(this).parents('.list-group-item').remove();
                    Swal.fire('Eliminado!', '', 'success')
                }
            })
        });

        //get info variable
        $('#btn-info-variable').click(function () {
            var variable1 = variable($('#variables').val());

            $.when(variable1).done(function (v) {
                let modal = $('#modal-variable');
                if (v.name !== undefined)
                {
                    modal.find('.modal-title').html(v.name);
                    modal.find('.description-text').html(v.description);
                    modal.find('.status-text').html(v.status ? 'Activado':'Desactivado');

                    modalVariable.show();
                }
            });
        });
    </script>
@endsection
