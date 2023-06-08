@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fichasDeSeguimiento.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fichas-de-seguimientos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="usuarie_id">{{ trans('cruds.fichasDeSeguimiento.fields.usuarie') }}</label>
                <select class="form-control select2 {{ $errors->has('usuarie') ? 'is-invalid' : '' }}" name="usuarie_id" id="usuarie_id">
                    @foreach($usuaries as $id => $entry)
                        <option value="{{ $id }}" {{ old('usuarie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuarie'))
                    <span class="text-danger">{{ $errors->first('usuarie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasDeSeguimiento.fields.usuarie_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="profesional_id">{{ trans('cruds.fichasDeSeguimiento.fields.profesional') }}</label>
                <select class="form-control select2 {{ $errors->has('profesional') ? 'is-invalid' : '' }}" name="profesional_id" id="profesional_id">
                    @foreach($profesionals as $id => $entry)
                        <option value="{{ $id }}" {{ old('profesional_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('profesional'))
                    <span class="text-danger">{{ $errors->first('profesional') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasDeSeguimiento.fields.profesional_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="fecha_y_hora">{{ trans('cruds.fichasDeSeguimiento.fields.fecha_y_hora') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha_y_hora') ? 'is-invalid' : '' }}" type="text" name="fecha_y_hora" id="fecha_y_hora" value="{{ old('fecha_y_hora') }}">
                @if($errors->has('fecha_y_hora'))
                    <span class="text-danger">{{ $errors->first('fecha_y_hora') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasDeSeguimiento.fields.fecha_y_hora_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comentarios_seguimiento">{{ trans('cruds.fichasDeSeguimiento.fields.comentarios_seguimiento') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('comentarios_seguimiento') ? 'is-invalid' : '' }}" name="comentarios_seguimiento" id="comentarios_seguimiento">{!! old('comentarios_seguimiento') !!}</textarea>
                @if($errors->has('comentarios_seguimiento'))
                    <span class="text-danger">{{ $errors->first('comentarios_seguimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasDeSeguimiento.fields.comentarios_seguimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.fichas-de-seguimientos.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $fichasDeSeguimiento->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
