<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-left ">
            <thead>
                <tr>
                    <!-- <td class="w-70">{{__('admin-question.avatar')}}</td> -->
                    <td class="w-30p">{{__('admin-question.name')}}</td>
                    <td>{{__('admin-question.title')}}</td>
                    <td>{{__('admin-question.lesson')}}</td>
                    <td>{{__('admin-question.subject')}}</td>
                    <td>{{__('admin-question.teacher')}}</td>
                    <td>{{__('admin-question.date')}}</td>
                    <td class='text-center'>{{__('admin-question.action')}}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <!-- <td>
                        <div class="avatar avatar-md">
                            <img src="https://rtsolutz.com/vizzstudio/demo-falr/falr/assets/images/author/author-img1.jpg"
                                alt="Image" class="img-responsive">
                        </div>
                    </td> -->
                    <td class="text-nowrap">
                        <div class="fw-600 ">{{ isset($item->student)?$item->student->name : '' }}</div>
                    </td>
                    <td>{!! $item->title !!}</td>
                    <td>{{ $item->lesson_name }}</td>
                    <td>{{ $item->subject_name }}</td>
                    <td>{{ $item->user_name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="{{ route('admin.questionanswer.edit', ['questionanswer' => $item->id]) }}"
                                    class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
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
<div class="card-footer">
    {{ $items->appends(request()->query())->links() }}
</div>