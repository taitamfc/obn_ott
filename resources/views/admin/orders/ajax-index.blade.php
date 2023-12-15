<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('admin-order.item')}}</th>
                    <th scope="col">{{__('admin-order.price')}}</th>
                    <th scope="col">{{__('admin-order.payment-method')}}</th>
                    <th scope="col">{{__('admin-order.type')}}</th>
                    <th scope="col">{{__('admin-order.date')}}</th>
                    <th scope="col">{{__('admin-order.status')}}</th>
                    <th scope="col">{{__('admin-order.student')}}</th>
                </tr>
            </thead>
            <tbody class="sortable-table ">
                @if(count($items))
                    @foreach($items as $item)
                        <tr class="item draggable" id='item-{{ $item->id }}'>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->item_name }}</td>
                            <td>${{ number_format($item->price) }}</td>
                            <td>{{ $item->payment_method }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->student ? $item->student->name : 'N/A' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="11" class="text-center">{{ __('sys.no_item_found') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    {{ $items->appends(request()->query())->links() }}
</div>
