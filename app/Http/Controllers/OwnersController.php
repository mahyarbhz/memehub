<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnersController extends Controller
{
    public function users_index()
    {
        $data = User::paginate(10);
        return view('dashboard.users', compact('data'));
    }

    protected function users_index_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = User::paginate(5);
            return view('dashboard.user_pagination_data', compact('data'))->render();
        } else {
            return redirect()->back();
        }
    }

    public function users_edit($id)
    {
//        $user = DB::table('users')->where('id', $id)->first();
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.users_edit', ['user' => $user, 'roles' => $roles]);
    }

    public function users_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['role_id'=>$request->role_id]);

        $users = User::all();
        return redirect(route('owners.users'));
    }
}
