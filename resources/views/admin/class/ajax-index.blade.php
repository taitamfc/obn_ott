<div class="card">
    <div class="card-body">
        <div class="single-table">
            <div class="table-responsive">
                <table class="table table-hover progress-table text-left ">
                    <thead class="text-uppercase">
                        <tr>
                            <th scope="col">{{__('admin-class.name')}}</th>
                            <th scope="col" class='text-center'>{{__('admin-class.course-view-count')}}</th>
                            <th scope="col" class='text-center'>{{__('admin-class.last-view')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                <a href="{{ route('admin.classes.show',$item->id) }}" style='color:black'>{{ $item->name }}
                                </a>
                            </td>
                            <td class='text-center'>{{ $item->total_lessons }}</td>
                            <td class='text-center'>{{ $item->last_view }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>