<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead>
                <tr>
                    <td class="w-70">Avatar</td>
                    <td class="w-30p">Name</td>
                    <td>Student ID</td>
                    <td>Question</td>
                    <td>Lesson</td>
                    <td>Subject</td>
                    <td>Teacher</td>
                    <td>Answer</td>
                    <td>Date</td>
                    <td class='text-center'>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        <div class="avatar avatar-md">
                            <img src="https://rtsolutz.com/vizzstudio/demo-falr/falr/assets/images/author/author-img1.jpg"
                                alt="Image" class="img-responsive">
                        </div>
                    </td>
                    <td class="text-nowrap">
                        <div class="fw-600 ">{{ isset($item->student)?$item->student->name : '' }}</div>
                    </td>
                    <td>{{ isset($item->student)?$item->student->id : '' }}</td>
                    <td>{{ $item->question }}</td>
                    <td>{{ $item->lesson_name }}</td>
                    <td>{{ $item->subject_name }}</td>
                    <td>{{ $item->user_name }}</td>
                    <td>{!! $item->answer !!}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="javascript:;" data-id="{{ $item->id }}"
                                    data-action="{{ route('admin.questionanswer.update',$item->id) }}"
                                    class="btn btn-primary show-form-edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <!-- <a href="javascript:;" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                    data-action="{{ route('admin.questionanswer.destroy',$item->id) }}">
                                    <i class="ti-trash"></i>
                                </a>
                            </li> -->
                        </ul>
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