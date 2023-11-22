<div class="card mt-4">
    <div class="card-header d-flex justify">
        <div class="col-sm-6">
            <h4>CREDIT CARD INFO</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover progress-table text-left ">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Bank Number</th>
                        <th scope="col">Bank Owner</th>
                        <th scope="col">STREET ADDRESS</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="sortable-table ">
                    @foreach($items as $item)
                    <tr class="item draggable" id='item-{{ $item->id}}'>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->bank_name }}</td>
                        <td>{{ $item->bank_number}}</td>
                        <td>{{ $item->bank_owner }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                    <a href="javascript:;" data-id="{{ $item->id }}"
                                        data-action="{{ route('userbank.update',$item->id) }}"
                                        class="btn btn-primary show-form-edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                        data-action="{{ route('userbank.destroy',$item->id) }}">
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