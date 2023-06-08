<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAreaRequest;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AreasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('area_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::with(['users'])->get();

        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        return view('admin.areas.create', compact('users'));
    }

    public function store(StoreAreaRequest $request)
    {
        $area = Area::create($request->all());
        $area->users()->sync($request->input('users', []));

        return redirect()->route('admin.areas.index');
    }

    public function edit(Area $area)
    {
        abort_if(Gate::denies('area_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        $area->load('users');

        return view('admin.areas.edit', compact('area', 'users'));
    }

    public function update(UpdateAreaRequest $request, Area $area)
    {
        $area->update($request->all());
        $area->users()->sync($request->input('users', []));

        return redirect()->route('admin.areas.index');
    }

    public function show(Area $area)
    {
        abort_if(Gate::denies('area_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $area->load('users');

        return view('admin.areas.show', compact('area'));
    }

    public function destroy(Area $area)
    {
        abort_if(Gate::denies('area_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $area->delete();

        return back();
    }

    public function massDestroy(MassDestroyAreaRequest $request)
    {
        $areas = Area::find(request('ids'));

        foreach ($areas as $area) {
            $area->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
