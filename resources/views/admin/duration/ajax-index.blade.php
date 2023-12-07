<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead>
                <tr>
                    <td class="w-30p">Name</td>
                    <td class='text-center'>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class='item'>
                    <td class="text-nowrap">
                        <div class="fw-600 ">{{ $item->name }}</div>
                    </td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="javascript:;" data-id="{{ $item->id }}"
                                    data-action="{{ route('admin.durations.update',$item->id) }}"
                                    class="btn btn-primary show-form-edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="btn btn-danger delete-item"
                                    data-action=" {{ route('admin.durations.destroy',$item->id) }}">
                                    <i class="ti-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    {{ $items->appends(request()->query())->links() }}
</div>