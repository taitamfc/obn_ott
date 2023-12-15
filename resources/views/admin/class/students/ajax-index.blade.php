<div class="card">
    <div class="card-body">
        <div class="single-table">
            <div class="table-responsive">
                <table class="table table-hover progress-table text-left ">
                    <thead class="text-uppercase">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{__('admin-class.name')}}</th>
                            <th scope="col">{{__('admin-class.student')}}</th>
                            <th scope="col">{{__('admin-class.email')}}</th>
                            <th scope="col">{{__('admin-class.course')}}</th>
                            <th scope="col">{{__('admin-class.date')}}</th>
                            <th scope="col">{{__('admin-class.status')}}</th>
                            <th scope="col" class="text-center">{{__('admin-class.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr class="item" id='item-{{ $item->id}}'>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->studentName() }}</td>
                            <td>{{ $item->studentCode() }}</td>
                            <td>{{ $item->studentEmail() }}</td>
                            <td>{{ $item->studentCourse() }}</td>
                            <td>{{ $item->studentDate() }}</td>
                            <td>{!! $item->statusDisplay()!!}</td>
                            <td>
                                <ul class="d-flex justify-content-center">
                                    <li class="mr-3">
                                        <a href="{{ route('admin.classes.show',$item->id) }}"><i class="ti-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="text-danger delete-item" data-id="{{ $item->id }}"
                                            data-action="{{ route('admin.classes.destroy',$item->id) }}">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination" style="float:right">
                    {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>