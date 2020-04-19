@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="#">
                {{ trans('global.add') }} {{ trans('cruds.user_action.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('cruds.user_action.title_singular') }} {{ trans('global.list') }}
        </h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user_action.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user_action.fields.user_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user_action.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user_action.fields.action_model') }}
                        </th>
                        <th>
                            {{ trans('cruds.user_action.fields.action_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user_action.fields.user_id') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_actions as $key => $user_action)
                        <tr data-entry-id="{{ $user_action->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user_action->id ?? '' }}
                            </td>
                            <td>
                                {{ $user_action->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user_action->action ?? '' }}
                            </td>
                            <td>
                                {{ $user_action->action_model ?? '' }}
                            </td>
                            <td>
                                {{ $user_action->action_id ?? '' }}
                            </td>
                            <td>
                                @can('user_action_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.user_actions.show', $user_action->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_action_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.user_actions.edit', $user_action->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_action_delete')
                                    <form action="{{ route('admin.user_actions.destroy', $user_action->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('permission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permissions.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
