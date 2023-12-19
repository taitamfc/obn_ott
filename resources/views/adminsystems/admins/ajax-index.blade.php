
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">code</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">status</th>
                    <th scope="col">password</th>
                    <th scope="col">address</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody class="sortable-table ">
                @if( count($items) )
                @foreach($items as $item)
                <tr class="item draggable" id='item-{{ $item->id}}'>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{!! $item->code !!}</td>
                    <td>{!! $item->email !!}</td>
                    <td>{!! $item->phone !!}</td>
                    <td>{!! $item->status !!}</td>
                    <td>{!! $item->password !!}</td>
                    <td>{!! $item->address !!}</td>
                    <td>
                        <ul class="d-flex">
                            <li class="mr-3">
                                <a href="javascript:;" data-id="{{ $item->id }}" data-action="{{ route('admins.update',$item->id) }}" class="btn btn-primary show-form-edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="btn btn-danger delete-item"
                                    data-id="{{ $item->id }}" data-action="{{ route('admins.destroy',$item->id) }}">
                                    <i class="ti-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">{{ __('sys.no_item_found') }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    {{ $items->appends(request()->query())->links() }}
</div>
