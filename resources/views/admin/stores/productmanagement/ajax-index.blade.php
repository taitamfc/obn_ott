<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">COURSE</th>
                    <th scope="col">PRICE </th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr class='item'>
                    <td>{{ $item->name }}</td>
                    <td>${{ $item->price }}</td>
                    <td>
                        <button data-toggle="modal" data-target="#modalUpdate" data-id="{{ $item->id }}"
                            data-action="{{ route('courses.editProduct') }}" class='btn btn-success show-form-edit'>
                            <i class="ti-pencil mr-1"></i>
                        </button>
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