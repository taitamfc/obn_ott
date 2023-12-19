<div class="card">
    <div class="card-body">
        <div class="single-table">
            <div class="table-responsive">
                <table class="table table-hover progress-table text-left ">
                    <thead class="text-uppercase">
                        <tr>
                            <th scope="col" class='text-center'>{{__('admin-class.student')}}</th>
                            <th scope="col" class='text-center'>{{__('admin-class.course')}}</th>
                            <th scope="col" class='text-center'>{{__('admin-class.complete')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('admin.classes.detail',$item->id) }}"
                                    style='color:black'>{{ $item->student->name }}
                                </a>
                            </td>
                            <td class='text-center'>{{ $item->course->name }}</td>
                            <td class='text-center'>{{ $item->view_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>