<div class="row mt-4">
    <!-- Primary table -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h4 class="card_title mb-0">Q&A</h4>
                    </div>
                </div>
                <div class="table-responsive mt-10">
                    <table class="table table-hover table-center">
                        <thead>
                            <tr>
                                <td class="w-70">Avatar</td>
                                <td class="w-30p">Name</td>
                                <td>Student_ID</td>
                                <td>Question</td>
                                <td>Answer</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($qas as $qa)
                                <tr>
                                    <td>
                                        <div class="avatar avatar-md">
                                            <img src="https://rtsolutz.com/vizzstudio/demo-falr/falr/assets/images/author/author-img1.jpg" alt="Image" class="img-responsive">
                                        </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="fw-600 ">{{ isset($qa->student)?$qa->student->name : '' }}</div>
                                    </td>
                                    <td>{{ isset($qa->student)?$qa->student->id : '' }}</td>
                                    <td>{{ $qa->question }}</td>
                                    <td>{{ $qa->answer }}</td>
                                    <td>{{ $qa->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>