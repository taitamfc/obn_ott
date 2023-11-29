<div class="row">
    <!-- Primary table -->
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body col-12">
                <div class="row d-flex justify-content-between">
                    <h4 class="header-title">Q&A Table</h4>
                    <form class="input-group input-daterange w-50" method='get' action=''>
                        <input type="date" class="form-control bg-light w-25" name="fromDate">
                        <div class="input-group-addon btn btn-light">to</div>
                        <input type="date" class="form-control bg-light w-25" name="toDate">
                        <button type='submit' class='btn btn-light'><i class="ti-search"></i>
                    </form>
                </div>
                <div class="table-responsive datatable-primary">
                    <table id="dataTable" class="text-center w-100">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Name</th>
                                <th>Student_ID</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($qas as $qa)
                            <tr>
                                <td>{{ isset($qa->student)?$qa->student->name : '' }}</td>
                                <td>{{ isset($qa->student)?$qa->student->code : '' }}</td>
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
<div class="card-footer" style='float:right'>
    {{ $qas->appends(request()->query())->links() }}
</div>