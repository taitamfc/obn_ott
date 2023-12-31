<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover progress-table text-left ">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="sortable-table ">
                    @foreach($items as $item)
                    <tr class="item draggable" id='item-{{ $item->id}}'>
                        <td>{{ $item->name }}</td>
                        <td>
                            <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                    <a href="javascript:;" data-id="{{ $item->id }}"
                                        data-action="{{ route('admin.groups.update',$item->id) }}"
                                        class="text-primary show-form-edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="text-danger delete-item" data-id="{{ $item->id }}"
                                        data-action="{{ route('admin.groups.destroy',$item->id) }}">
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
</div>
@include('admin.accountmanagements.groups.create')
@include('admin.accountmanagements.groups.edit')