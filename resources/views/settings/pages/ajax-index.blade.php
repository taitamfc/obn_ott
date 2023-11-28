<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if( count($items) )
                @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{!! $item->status_fm !!}</td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="{{ route('pages.show',$item->id) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('pages.edit',$item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                    data-action="{{ route('pages.destroy',$item->id) }}">
                                    <i class="ti-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center">{{ __('sys.no_item_found') }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>