<div class="card">
    <div class="card-body">
        <div class="single-table">
            <div class="table-responsive">
                <table class="table table-hover progress-table text-left ">
                    <thead class="text-uppercase">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col" class='text-center'>Course view count</th>
                            <th scope="col" class='text-center'>Last view</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
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