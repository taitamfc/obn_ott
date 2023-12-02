<div class="card">
    <div class="card-body">
        <h4 class="card_title">Current subscriptions</h4>
        <div class="single-table">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-uppercase">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr class="item" id='item-{{ $item->id}}'>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->duration }}</td>
                            <td>
                                <a href="{{ route('admin.subscriptions.edit', $item->id) }}" class="text-primary">
                                    <i class="ti-pencil mr-1 btn btn-success"></i>
                                </a>
                                <a href="javascript:;" class="text-danger delete-item" data-id="{{ $item->id }}"
                                    data-action="{{ route('admin.subscriptions.destroy',$item->id) }}">
                                    <i class="ti-trash btn btn-danger"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>