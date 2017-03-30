<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Datatables;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create($request->all());
        return redirect('admin/users')->with('message', 'تمت اضافة العضو بنجاح');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        if ($user->id != 1) {
            $user->delete();
            return redirect('admin/users')->with('message', 'تم حذف العضو بنجاح');
        }
        return redirect('admin/users')->with('message', 'لا يمكن حذف العضوية رقم 1 ');
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => $request->password != null ?'sometimes|required|min:8': ''
        ]);

        if ($request->has('password')){
            $user->fill($request->except('admin'));
        } else {
            $user->fill($request->except(['admin', 'password']));
        }
        if ($user->id != 1){
            $user->admin = $request->admin;
        }
        $user->save();
        return redirect('admin/users')->with('message', 'تم تعديل العضو بنجاح');

    }


    public function anyData()
    {
        $users = User::all();

        return Datatables::of($users)

            ->editColumn('name', function ($model) {
                return '<a href="'.url('/admin/users/' . $model->id . '/edit').'">'.$model->name.'</a>';
            })
            ->editColumn('admin', function ($model) {
                return $model->admin == 0 ? '<span class="label label-info">' . 'عضو' . '</span>' : '<span class="label label-warning">' . 'مدير الموقع' . '</span>';
            })


//            ->editColumn('mybu', function ($model) {
//                return '<a href="'.url('/admin/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>';
//            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/admin/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                if($model->id != 1){
                    $all .= '<a class="btn btn-danger btn-circle" href="javascript:void(0);" onclick="$(this).find(\'form\').submit();" >
                                <i class="fa fa-trash-o"></i>
                                
                                '. \Form::open(['url' => url('/admin/users/' . $model->id), 'method' => 'delete']) . \Form::close() .'
                            </a>';
                }
                return $all;
            })
            ->rawColumns(['name', 'admin', 'control'])
            ->make(true);
    }
}
