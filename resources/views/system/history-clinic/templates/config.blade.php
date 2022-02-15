@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/jquery-ui-1.13/jquery-ui.min.css') }}">
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Plantilla historia clínica</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6"><b>Nombre:</b> {{ $template->name }}</div>
            <div class="col-md-6"><b>Estado:</b> {{ $template->status ? 'Activado' : 'Desactivado' }}</div>
            <div class="col-12">
                <b>Descripción:</b>
                <p>{{ $template->description }}</p>
            </div>
        </div>

        <form action="{{ route('system.history-clinic.templates.config-save', ['template' => $template->id]) }}" method="post" id="form-config-template">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-8 mb-5">
                    <ul class="list-group" id="selector">
                        @if($template->hc_modules->isNotEmpty())
                            @foreach($template->hc_modules as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-flex">
                                        <i class="fas fa-sort fa-2x my-auto"></i>
                                        <div class="my-auto px-2">
                                            {{ $item->name }}
                                            <input type="hidden" name="order[]" value="{{ $item->id }}">
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('system.history-clinic.modules.edit', ['module' => $item->id]) }}" class="btn btn-primary">
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
                    <label for="modules">Modulos</label>
                    <div class="input-group mb-3">
                        <select id="modules" class="form-control">
                            <option></option>
                            @isset($modules)
                                @foreach($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                        <button class="btn btn-outline-info" type="button" id="btn-add-module">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-outline-dark" type="button" id="btn-info-module">
                            <i class="fas fa-question"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('system.history-clinic.templates.index') }}" class="btn btn-secondary mx-2">
                        Regresar <i class="fas fa-angle-left"></i>
                    </a>
                    <button class="btn btn-success" type="submit">
                        Guardar <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>
    <div class="modal" tabindex="-1" id="modal-module">
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
        var modalModule = new bootstrap.Modal(document.getElementById('modal-module'), {
            keyboard: false
        });

        //function search module
        var module = (id) => {
            return $.get("{{ route('system.history-clinic.modules.search') }}?term=" + id);
        };

        //Add new module
        $('#btn-add-module').click(function () {
            var mod = module($('#modules').val());

            $.when(mod).done(function (m) {
                if (m.name !== undefined)
                {
                    $('#selector').append('<li class="list-group-item d-flex justify-content-between">' +
                        '<div class="d-flex">' +
                        '<i class="fas fa-sort fa-2x my-auto"></i>' +
                        '<div class="my-auto px-2">' +
                        '<input type="hidden" name="order[]" value="' + m.id + '">' +
                        m.name +
                        '</div>' +
                        '</div>' +
                        '<div>' +
                        '<a href="' + m.url + '" class="btn btn-primary">' +
                        'Editar <i class="fas fa-edit"></i>' +
                        '</a>' +
                        '<button type="button" class="btn btn-danger btn-delete-module">' +
                        'Eliminar <i class="fas fa-trahs"></i>' +
                        '</button>' +
                        '</div>' +
                        '</li>');
                }

                $('#modules').val('');
            });
        });

        //Remove item mudule
        $('#selector').on('click', '.btn-delete-module', function () {
            Swal.fire({
                title: 'Desea eliminar el modulo?',
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

        //get info module
        $('#btn-info-module').click(function () {
            var mod = module($('#modules').val());

            $.when(mod).done(function (m) {
                let modal = $('#modal-module');
                if (m.name !== undefined)
                {
                    modal.find('.modal-title').html(m.name);
                    modal.find('.description-text').html(m.description);
                    modal.find('.status-text').html(m.status ? 'Activado':'Desactivado');

                    modalModule.show();
                }
            });
        });
    </script>
@endsection
