<?php

namespace App\Http\Controllers\Tenant\Manager\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Tenant\Autorization\Role;
use App\Models\Tenant\CardType;
use App\Models\Tenant\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::query()
            ->select(['id', 'name', 'last_name', 'email', 'id_card', 'status'])
            ->with('roles:id,name')
            ->get();
        return view('tenant.manager.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $card_types = CardType::all();
        return view('tenant.manager.users.create', compact('card_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'id_card'       => $request->get('id_card'),
            'card_type_id'  => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'status'        => $request->get('status'),
            'cellphone'     => $request->get('cellphone'),
            'phone'         => $request->get('phone'),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
            'remember_token'=> Str::random(),
        ];

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $directory = app(\Hyn\Tenancy\Website\Directory::class);

            $file = $directory->put('media/patients', $request->photo);
            $user['photo'] = $file;
        }

        $res = User::query()->create($user);

        return redirect()->route('tenant.manager.users.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.user')]));
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $card_types = CardType::all();
        return view('tenant.manager.users.edit', compact('user', 'card_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $query = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'id_card'       => $request->get('id_card'),
            'card_type_id'  => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'status'        => $request->get('status'),
            'cellphone'     => $request->get('cellphone'),
            'phone'         => $request->get('phone'),
            'email'         => $request->get('email'),
        ];

        if (!empty($request->get('password')))
        {
            $query['password'] = Hash::make($request->get('password'));
        }

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $directory = app(\Hyn\Tenancy\Website\Directory::class);

            $file = $directory->put('media/patients', $request->photo);
            $query['photo'] = $file;
        }

        $user->update($query);

        return redirect()->route('tenant.manager.users.index')
            ->with('success', __('trans.message-update-success', ['element' => __('trans.user')]));
    }

    /**
     * View of Roles user
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function roles($id)
    {
        $roles = Role::query()
            ->select('roles.id', 'name')
            ->with(['modules' => function ($query) {
                $query->select('modules.id', 'name', 'slug', 'status', 'role_id')
                    ->where('status', '=', 1);
            }])
            ->whereIn('id', [2,3])
            ->get();

        $user = User::query()
            ->select(['id', 'name'])
            ->with(['modules' => function ($query) {
                $query->select('modules.id', 'name', 'slug', 'status', 'role_id')
                    ->where('status', '=', 1);
            }, 'roles' => function ($query) {
                $query->select('roles.id', 'roles.name');
            }])
            ->where('id', $id)
            ->first();

        $user_modules = $user->modules->toArray();
        $user_roles = $user->roles->toArray();

        //dd($user_roles);

        return view('tenant.manager.users.role', compact('user_roles', 'roles', 'user_modules', 'user'));
    }

    /**
     * Save config roles of user
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function roles_save(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'roles.*' => ['exists:tenant.roles,id'],
            'operative.alias' => ['min:3'],
            'operative.modules.*' => [ 'exists:tenant.modules,id'],
            'administrative.alias' => ['min:3'],
            'administrative.modules.*' => [ 'exists:tenant.modules,id'],
        ]);

        $r = $request->get('roles');
        $operative = $request->get('operative');
        $administrative = $request->get('administrative');

        $roles = array();
        $modules = array();

        foreach ($r as $item) {

            if ($item == 2) {
                $roles[2] = ['name' => $operative['alias']];
                if (!empty($operative['modules']))
                {
                    foreach ($operative['modules'] as $module) {
                        $modules[] = $module;
                    }
                }
            }

            if ($item == 3) {
                $roles[3] = ['name' => $administrative['alias']];
                if (!empty($administrative['modules']))
                {
                    foreach ($administrative['modules'] as $module) {
                        $modules[] = $module;
                    }
                }
            }

        }

        //validate manager
        if ($user->is_manager())
        {
            $roles[1] = ['name' => 'Manager'];
            array_push($modules, 1);
            array_push($modules, 2);
        }

        $user->roles()->sync($roles);
        $user->modules()->sync($modules);

        return redirect()->route('tenant.manager.users.index')
            ->with('success', __('trans.message-update-success', ['element' => __('trans.user-roles')]));
    }
}
