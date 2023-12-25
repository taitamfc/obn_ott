<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody class="">
                @if( count($items) )
                @foreach($items as $item)
                <tr class="item draggable" id='item-{{ $item->id}}'>
                    <th scope="row">{{ $item->title }}</th>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <ul class="d-flex">
                            <li class="mr-3">
                                <a href="javascript:;" data-id="{{ $item->id }}"
                                    data-action="{{ route('notices.update',$item->id) }}"
                                    class="btn btn-primary show-form-edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                    data-action="{{ route('notices.destroy',$item->id) }}">
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