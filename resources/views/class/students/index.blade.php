@extends('layouts.master')
@section('header')
<style>
select.form-control:not([size]):not([multiple]) {
    height: auto;
}
</style>
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Class</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Class</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('classes.index') }}">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="class">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card students-table-results">
                            <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('classes.students') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.students-table-results';
jQuery(document).ready(function() {
    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    // Handle pagination
    jQuery('body').on('click', ".page-link", function(e) {
        e.preventDefault();
        let url = jQuery(this).attr('href');
        getAjaxTable(url, wrapperResults, positionUrl);
    });

    $(".delete-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.data("id");
        if (confirm("Are you sure?")) {
            var url = '/classes/' + id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    window.location.reload(); // Xóa phần tử khỏi DOM
                }
            });
        }
    })
});
</script>
@endsection