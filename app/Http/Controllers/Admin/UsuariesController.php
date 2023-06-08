<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUsuaryRequest;
use App\Http\Requests\StoreUsuaryRequest;
use App\Http\Requests\UpdateUsuaryRequest;
use App\Models\User;
use App\Models\Usuary;
use App\Models\Area;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UsuariesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('usuary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$usuaries = Usuary::with(['psicologa_asignadas', 'media'])->get();

        $users = User::get();

        $user_logged= auth()->user();

        switch ($user_logged->roles[0]->id) {
            case 3: //voluntaries
                $usuaries = Usuary::whereHas('psicologa_asignadas', function($q) use($user_logged) {
                    $q->where('user_id', '=', $user_logged->id);
                })->get();
                break;

            default:
                $usuaries = Usuary::with(['psicologa_asignadas', 'media'])->get();
                break;
        }

        return view('admin.usuaries.index', compact('users', 'usuaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('usuary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$psicologa_asignadas = User::pluck('name', 'id');

        $areas = Area::pluck('nombre', 'id');

        return view('admin.usuaries.create', compact('areas'));
    }

    public function store(StoreUsuaryRequest $request)
    {
        $usuary_aux = $request->all();
        if(array_key_exists('prestaciones',$usuary_aux)){
            $usuary_aux['prestaciones'] = json_encode($usuary_aux['prestaciones']);
        }
        $usuary_aux = Usuary::create($usuary_aux);
        $usuary_aux->area_asignadas()->sync($request->input('area_asignada', []));
        $usuary_aux->psicologa_asignadas()->sync($request->input('psicologa_asignadas', []));
        foreach ($request->input('documentacion_anexa', []) as $file) {
            $usuary_aux->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documentacion_anexa');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $usuary->id]);
        }

        return redirect()->route('admin.usuaries.index');
    }

    public function edit(Usuary $usuary)
    {
        abort_if(Gate::denies('usuary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $area_asignadas = Area::pluck('nombre', 'id');

        $psicologa_asignadas = User::pluck('name', 'id');

        $usuary->load('psicologa_asignadas');

        if($usuary->prestaciones === null){
            $usuary->prestaciones = json_encode([]);
        }

        return view('admin.usuaries.edit', compact('area_asignadas', 'psicologa_asignadas', 'usuary'));
    }

    public function update(UpdateUsuaryRequest $request, Usuary $usuary)
    {
        $usuary->update($request->all());
        $usuary->psicologa_asignadas()->sync($request->input('psicologa_asignadas', []));
        if (count($usuary->documentacion_anexa) > 0) {
            foreach ($usuary->documentacion_anexa as $media) {
                if (! in_array($media->file_name, $request->input('documentacion_anexa', []))) {
                    $media->delete();
                }
            }
        }
        $media = $usuary->documentacion_anexa->pluck('file_name')->toArray();
        foreach ($request->input('documentacion_anexa', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $usuary->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documentacion_anexa');
            }
        }

        return redirect()->route('admin.usuaries.index');
    }

    public function show(Usuary $usuary)
    {
        abort_if(Gate::denies('usuary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuary->load('psicologa_asignadas', 'usuarieFichasDeSeguimientos');
        $usuary->load('area_asignadas');

        /*if($usuary->prestaciones === null){
            $usuary->prestaciones = [];
        }*/

        //dd($usuary);

        return view('admin.usuaries.show', compact('usuary'));
    }

    public function destroy(Usuary $usuary)
    {
        abort_if(Gate::denies('usuary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuary->delete();

        return back();
    }

    public function massDestroy(MassDestroyUsuaryRequest $request)
    {
        $usuaries = Usuary::find(request('ids'));

        foreach ($usuaries as $usuary) {
            $usuary->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('usuary_create') && Gate::denies('usuary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Usuary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
