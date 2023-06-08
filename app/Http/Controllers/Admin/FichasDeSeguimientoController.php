<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFichasDeSeguimientoRequest;
use App\Http\Requests\StoreFichasDeSeguimientoRequest;
use App\Http\Requests\UpdateFichasDeSeguimientoRequest;
use App\Models\FichasDeSeguimiento;
use App\Models\User;
use App\Models\Usuary;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FichasDeSeguimientoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fichas_de_seguimiento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichasDeSeguimientos = FichasDeSeguimiento::with(['usuarie', 'profesional'])->get();

        return view('admin.fichasDeSeguimientos.index', compact('fichasDeSeguimientos'));
    }

    public function create()
    {
        abort_if(Gate::denies('fichas_de_seguimiento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_logged= auth()->user();

        $usuaries = Usuary::whereHas(
            'psicologa_asignadas', function($q) use($user_logged){
                $q->where('user_id', '=', $user_logged->id);
            }
        )->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$profesionals = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fichasDeSeguimientos.create', compact('usuaries'));
    }

    public function store(StoreFichasDeSeguimientoRequest $request)
    {
        $user_logged= auth()->user();
        $ficha_aux = $request->all();

        $ficha_aux['profesional_id'] = $user_logged->id;

        $fichasDeSeguimiento = FichasDeSeguimiento::create($ficha_aux);

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fichasDeSeguimiento->id]);
        }

        return redirect()->route('admin.fichas-de-seguimientos.index');
    }

    public function edit(FichasDeSeguimiento $fichasDeSeguimiento)
    {
        abort_if(Gate::denies('fichas_de_seguimiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuaries = Usuary::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profesionals = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fichasDeSeguimiento->load('usuarie', 'profesional');

        return view('admin.fichasDeSeguimientos.edit', compact('fichasDeSeguimiento', 'profesionals', 'usuaries'));
    }

    public function update(UpdateFichasDeSeguimientoRequest $request, FichasDeSeguimiento $fichasDeSeguimiento)
    {
        $fichasDeSeguimiento->update($request->all());

        return redirect()->route('admin.fichas-de-seguimientos.index');
    }

    public function show(FichasDeSeguimiento $fichasDeSeguimiento)
    {
        abort_if(Gate::denies('fichas_de_seguimiento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichasDeSeguimiento->load('usuarie', 'profesional');

        return view('admin.fichasDeSeguimientos.show', compact('fichasDeSeguimiento'));
    }

    public function destroy(FichasDeSeguimiento $fichasDeSeguimiento)
    {
        abort_if(Gate::denies('fichas_de_seguimiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichasDeSeguimiento->delete();

        return back();
    }

    public function massDestroy(MassDestroyFichasDeSeguimientoRequest $request)
    {
        $fichasDeSeguimientos = FichasDeSeguimiento::find(request('ids'));

        foreach ($fichasDeSeguimientos as $fichasDeSeguimiento) {
            $fichasDeSeguimiento->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fichas_de_seguimiento_create') && Gate::denies('fichas_de_seguimiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FichasDeSeguimiento();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
