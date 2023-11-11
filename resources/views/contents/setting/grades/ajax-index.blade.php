@foreach($items as $item)
<tr class="item draggable" id='item-{{ $item->id}}'>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->name }}</td>
    <td>{!! $item->img_fm !!}</td>	
    <td>{!! $item->status_fm !!}</td>
    <td>
        <ul class="d-flex justify-content-center">
            <li class="mr-3">
                <a href="javascript:;" data-id="{{ $item->id }}" data-action="{{ route('grades.update',$item->id) }}" class="show-form-edit btn btn-success">
                    <i class="fa fa-edit"></i>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="delete-item btn btn-danger "
                    data-id="{{ $item->id }}">
                    <i class="ti-trash"></i>
                </a>
            </li>
        </ul>
    </td>
</tr>
@endforeach