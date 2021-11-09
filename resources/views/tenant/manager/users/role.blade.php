@extends('tenant.layouts.app')

@section('styles')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.users.index') }}">{{ __('trans.users') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.manager.users.roles', ['id' => $user->id]) }}">{{ __('trans.roles-user') }}</a>
                </li>
            </ol>
        </nav>
    </nav>

    <form action="{{ route('tenant.manager.users.roles-save', ['user' => $user->id]) }}" method="post">
        @csrf
        <!-- User roll -->
        <div class="main_target_form">
            <div class="form_row">
                <h2 class="col-12 title_section_form">{{ __('trans.user-roles') }}</h2>

                <!-- Administrative roll -->
                <div class="col-12 data_row_form">
                    <div class="col-12 custom-control custom-radio">
                        <input type="checkbox" id="check_admin" name="roles[]" class="custom-control-input roll_user"
                               value="3" {{ (in_array(3, array_column($user_roles, 'id'))) ? 'checked':'' }}>
                        <label class="custom-control-label" for="check_admin">{{ __('trans.administrative') }}</label>
                    </div>

                    <div class="col-md-4 col-xl-3 data_group_form">
                        <label for="module_alias">{{ __('trans.alias') }}</label>
                        <input type="text" class="input_dataGroup_form admin_module" name="administrative[alias]"
                               id="module_alias" {{ (in_array(3, array_column($user_roles, 'id'))) ? '':'disabled' }}
                               value="{{ old('administrative.alias', (in_array(3, array_column($user_roles, 'id'))) ? $user_roles[array_search(3, array_column($user_roles, 'id'))]['pivot']['name']: null) }}">
                    </div>

                    <div class="col-md-8 col-xl-9 data_group_form">
                        <label for="">{{ __('trans.modules') }}</label>
                        <div class="row">
                            @foreach($roles[1]->modules as $key => $module)
                                @php
                                $statusValue = in_array($module->id, array_column($user_modules, 'id'));
                                @endphp
                                <div class="col-md-6 col-xl-4" id="selected_appointment">
                                    <label>
                                        <input class="admin_module" type="checkbox" value="{{ $module->id }}"
                                               name="administrative[modules][{{ $key }}]"
                                               {{ (in_array(3, array_column($user_roles, 'id'))) ? '':'disabled' }}
                                               {{ old('administrative.modules.' . $key, ($statusValue) ? $module->id : null) ? 'checked':'' }}>
                                        {{ __('trans.' . $module->slug) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Operative roll -->
                <div class="col-12 data_row_form">
                    <div class="col-12 custom-control custom-radio">
                        <input type="checkbox" id="check_opert" name="roles[]" class="custom-control-input roll_user"
                               value="2" {{ (in_array(2, array_column($user_roles, 'id'))) ? 'checked':'' }}>
                        <label class="custom-control-label" for="check_opert">{{ __('trans.operative') }}</label>
                    </div>

                    <div class="col-md-4 col-xl-3 data_group_form">
                        <label for="operative_alias">{{ __('trans.alias') }}</label>
                        <input type="text" class="input_dataGroup_form operat_module" name="operative[alias]"
                               id="operative_alias" {{ (in_array(2, array_column($user_roles, 'id'))) ? '':'disabled' }}
                               value="{{ old('operative.alias', (in_array(2, array_column($user_roles, 'id'))) ? $user_roles[array_search(2, array_column($user_roles, 'id'))]['pivot']['name']: null) }}">
                    </div>

                    <div class="col-md-8 col-xl-9 data_group_form">
                        <label for="">{{ __('trans.modules') }}</label>

                        <div class="row">
                            @foreach($roles[0]->modules as $key => $module)
                                @php
                                    $statusValue = in_array($module->id, array_column($user_modules, 'id'));
                                @endphp
                                <div class="col-md-6 col-xl-4" id="selected_appointment">
                                    <label>
                                        <input class="operat_module" type="checkbox" value="{{ $module->id }}"
                                               name="operative[modules][{{ $key }}]"
                                               {{ (in_array(2, array_column($user_roles, 'id'))) ? '':'disabled' }}
                                            {{ old('administrative.modules.' . $key, ($statusValue) ? $module->id:null) ? 'checked':'' }}>
                                        {{ __('trans.' . $module->slug) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="button_container_form">
                <a href="{{ route('tenant.manager.users.index') }}" class="button_cancel_form">
                    {{ __('trans.cancel') }} &nbsp;<i class="fas fa-times-circle"></i>
                </a>
                <button type="submit" class="button_save_form">
                    {{ __('trans.save') }} &nbsp;<i class="fas fa-save"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $('#check_admin').change(function (e) {
            var check = $(this);
            if (check.prop('checked'))
            {
                $('.admin_module').prop('disabled', false);
            } else {
                $('.admin_module').prop('disabled', true);
            }
        });
        $('#check_opert').change(function (e) {
            var check = $(this);
            if (check.prop('checked'))
            {
                $('.operat_module').prop('disabled', false);
            } else {
                $('.operat_module').prop('disabled', true);
            }
        });
    </script>
@endsection
