@extends('layouts.admin')
@section('content')
@can('menu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.products.create") }}">
                {{ trans('global.add') }} {{ trans('global.menu.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.menu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.menu.fields.product') }}
                        </th>
                        <th>
                            {{ trans('global.menu.fields.product_type') }}
                        </th>
                        <th>
                            {{ trans('global.menu.fields.status') }}
                        </th>
                        <th>
                            {{ trans('global.menu.fields.cooking_date') }}
                        </th>
                        <th>
                            {{ trans('global.menu.fields.delivery_itself') }}
                        </th>
                        <th>
                            {{ trans('global.menu.fields.free_delivery_radius') }}
                        </th>
                        <th>
                            {{ trans('global.menu.fields.free_delivery_amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $key => $menu)
                        <tr data-entry-id="{{ $menu->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $menu->product_id ?? '' }}
                            </td>
                            <td>
                                {{ $menu->product_type_id ?? '' }}
                            </td>
                            <td>
                                {{ $menu->status ?? '' }}
                            </td>
                            <td>
                                {{ $menu->cooking_date ?? '' }}
                            </td>
                            <td>
                                {{ $menu->delivery_itself ?? '' }}
                            </td>
                            <td>
                                {{ $menu->free_delivery_radius ?? '' }}
                            </td>
                            <td>
                                {{ $menu->free_delivery_amount ?? '' }}
                            </td>
                            <td>
                                @can('menu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $menu->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('menu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $menu->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('menu_delete')
                                    <form action="{{ route('admin.products.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection