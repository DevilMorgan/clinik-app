@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Módulos historia clínica</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h2>Crear plantilla</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('system.history-clinic.modules.update', ['module' => $module->id]) }}" method="post" id="form-templates-create">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $module->name) }}"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="code">Código</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $module->code) }}"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description">Descripción</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $module->description) }}</textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" class="form-control">
                                <option value="basic" {{ old('type', $module->type) == 'basic' ? 'selected':'' }}>Básico</option>
                                <option value="multiple" {{ old('type', $module->type) == 'multiple' ? 'selected':'' }}>Multiple</option>
                                <option value="segmented" {{ old('type', $module->type) == 'segmented' ? 'selected':'' }}>Segmentado</option>
                            </select>
                        </div>
                        <div class="col-auto mb-3">
                            <label>Es requerido?</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_required-1" name="is_required"
                                       value="1" {{ old('is_required', $module->is_required) == 1 ? 'checked':'' }} />
                                <label class="form-check-label" for="is_required-1">Activado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_required-0" name="is_required"
                                       value="0" {{ old('is_required', $module->is_required) == 0 ? 'checked':'' }} />
                                <label class="form-check-label" for="is_required-0">Desactivado</label>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <label>Tiene registros anteriores?</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_end_records-1" name="is_end_records"
                                       value="1" {{ old('is_end_records', $module->is_end_records) == 1 ? 'checked':'' }} />
                                <label class="form-check-label" for="is_end_records-1">Activado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_end_records-0" name="is_end_records"
                                       value="0" {{ old('is_end_records', $module->is_end_records) == 0 ? 'checked':'' }} />
                                <label class="form-check-label" for="is_end_records-0">Desactivado</label>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <label>Estado</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="status-1" name="status"
                                       value="1" {{ old('status', $module->status) == 1 ? 'checked':'' }} />
                                <label class="form-check-label" for="status-1">Activado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="status-0" name="status"
                                       value="0" {{ old('status', $module->status) == 0 ? 'checked':'' }} />
                                <label class="form-check-label" for="status-0">Desactivado</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">
                                Guardar <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
