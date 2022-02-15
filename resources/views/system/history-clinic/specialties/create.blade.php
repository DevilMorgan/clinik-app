@extends('system.layouts.app')

@section('titles', 'Plantillas')

@section('styles')
@endsection

@section('content')
    <section class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Especialidades historia clínica</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h2>Crear plantilla</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('system.history-clinic.specialties.store') }}" method="post" id="form-templates-create">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"/>
                        </div>
                        <div class="col-auto mb-3">
                            <label>Estado</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="status-1" name="status"
                                       value="1" {{ old('status') == 1 ? 'checked':'' }} />
                                <label class="form-check-label" for="status-1">Activado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="status-0" name="status"
                                       value="0" {{ old('status') == 0 ? 'checked':'' }} />
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
