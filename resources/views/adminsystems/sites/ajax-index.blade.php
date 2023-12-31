
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('admin-setting.name')}}</th>
                    <th scope="col">{{__('admin-setting.slug')}}</th>
                    <th scope="col">{{__('admin-setting.status')}}</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody class="">
                @if( count($items) )
                @foreach($items as $item)
                <tr class="item draggable" id='item-{{ $item->id}}'>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{!! $item->slug !!}</td>
                    <td>{!! $item->status_fm !!}</td>
                    <td>
                        <a href="{{route('adminsystem.sites.show',$item->id)}}" class=""><span class="badge badge-primary">Show</span></a>
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
