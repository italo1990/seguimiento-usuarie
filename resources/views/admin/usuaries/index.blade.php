@extends('layouts.admin')
@section('content')
@can('usuary_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.usuaries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.usuary.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.usuary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Usuary">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.apellidos') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.documentacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.si_vinculacion_con_otros_recursos') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.si_planificacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.si_recibe_o_ha_recibido_atencion_psicosocial') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.si_otros_tipos_de_violencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_derivacion_a') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Usuary::DOCUMENTACION_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuaries as $key => $usuary)
                        <tr data-entry-id="{{ $usuary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $usuary->id ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->apellidos ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Usuary::DOCUMENTACION_RADIO[$usuary->documentacion] ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->si_vinculacion_con_otros_recursos ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->si_planificacion ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->si_recibe_o_ha_recibido_atencion_psicosocial ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->si_otros_tipos_de_violencia ?? '' }}
                            </td>
                            <td>
                                {{ $usuary->otros_derivacion_a ?? '' }}
                            </td>
                            <td>
                                @can('usuary_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.usuaries.show', $usuary->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('usuary_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.usuaries.edit', $usuary->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('usuary_delete')
                                    <form action="{{ route('admin.usuaries.destroy', $usuary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('usuary_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.usuaries.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Usuary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection