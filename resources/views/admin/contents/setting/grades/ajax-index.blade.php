<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('admin-grade.name')}}</th>
                    <th scope="col">{{__('admin-grade.image')}}</th>
                    <th scope="col">{{__('admin-grade.status')}}</th>
                    <th scope="col" class="text-center">{{__('admin-grade.action')}}</th>
                </tr>
            </thead>
            <tbody class="sortable-table ">
                @if( count($items) )
                    @foreach($items as $item)
                    <tr class="item draggable" id='item-{{ $item->id}}'>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{!! $item->img_fm !!}</td>	
                        <td>{!! $item->status_fm !!}</td>
                        <td>
                            <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                    <a href="javascript:;" data-id="{{ $item->id }}" data-action="{{ route('admin.grades.update',$item->id) }}" class="btn btn-primary show-form-edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="btn btn-danger delete-item"
                                        data-id="{{ $item->id }}" data-action="{{ route('admin.grades.destroy',$item->id) }}">
                                        <i class="ti-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr> <td colspan="5" class="text-center">{{ __('sys.no_item_found') }}</td> </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
{{ $items->appends(request()->query())->links() }}
</div>