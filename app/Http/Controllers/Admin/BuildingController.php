<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuildingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Facades\Datatables;

class BuildingController extends Controller
{

    public function index()
    {
        return view('admin.building.index');
    }

    public function create()
    {
        return view('admin.building.add');
    }

    public function store(BuildingRequest $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        $status = $request->has('status');

        $building = Auth::user()->buildings()
            ->create($request->except('status') + ['status' => $status]);

        if ($request->file('image'))
        {
            $dim = getimagesize($request->file('image'));
            $image = $request->image->store('public/buildings');
            $building->image = $image;
            $building->save();
        }

        return redirect('admin/buildings')->with('message', 'تم اضافة العقار بنجاح');
    }


    public function edit(Building $building)
    {
        return view('admin.building.edit', compact('building'));
    }

    public function update(BuildingRequest $request, Building $building)
    {
        $status = $request->has('status');

        $building->fill($request->except(['status', 'image']));
        $building->status = $status;

        if ($request->file('image'))
        {
            $image = $request->file('image')->store('public/buildings');

            $building->image = $image;
        }


        $building->save();

        return back()->with('message', 'تم تعديل العقار بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return back()->with('message', 'تم حذف العقار بنجاح');
    }

    public function anyData()
    {
        $buildings = Building::all();

        return Datatables::of($buildings)
            ->editColumn('name', function ($model) {
                return '<a href="' . url('/admin/buildings/' . $model->id . '/edit') . '">' . $model->name . '</a>';
            })
            ->editColumn('type', function ($model) {
                $types = building_type();
                return '<span class="badge">' . $types[$model->type] . '</span>';
            })
            ->editColumn('status', function ($model) {
                return $model->status == 0 ? '<span class="label label-warning">' . 'غير مفعل' . '</span>' : '<span class="label label-success">' . 'مفعل' . '</span>';
            })
            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/admin/buildings/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a class="btn btn-danger btn-circle" href="javascript:void(0);" onclick="$(this).find(\'form\').submit();" >
                                <i class="fa fa-trash-o"></i>
                                ' . \Form::open(['url' => url('/admin/buildings/' . $model->id), 'method' => 'delete']) . \Form::close() . '
                            </a>';
                return $all;
            })
            ->rawColumns(['name', 'status', 'type', 'control'])
            ->make(true);
    }
}
