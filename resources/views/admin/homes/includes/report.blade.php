<div class="row mb-4">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                    {{ $cr_site->name }}
                </div>
            </div>
            <div class="d-flex">
                <div class="btn-group mr-3">
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="select-grade-dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        {{ __('admin-dashboard.select_grade') }} 
                    </button>
                    <form action="" method="get">
                        <div class="dropdown-menu" aria-labelledby="select-grade-dropdown" id="dropdownMenu">
                            @foreach($grades as $grade)
                            <a class="dropdown-item"
                                href="{{ route('admin.home') }}?grade={{$grade->id}}">{{ $grade->name }}</a>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
        <div class="card mb-mob-4 primary_card_bg">
            <!-- Card body -->
            <div class="card-body">
                <p class="card-title mb-0 text-white"></p>
                <h3 class="mb-0 text-white"></h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
        <div class="card mb-mob-4 primary_card_bg">
            <!-- Card body -->
            <div class="card-body">
                <p class="card-title mb-0 text-white"></p>
                <h3 class="mb-0 text-white"></h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
        <div class="card mb-mob-4 primary_card_bg">
            <!-- Card body -->
            <div class="card-body">
                <p class="card-title mb-0 text-white"></p>
                <h3 class="mb-0 text-white"></h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
        <div class="card mb-mob-4 primary_card_bg">
            <!-- Card body -->
            <div class="card-body">
                <p class="card-title mb-0 text-white"></p>
                <h3 class="mb-0 text-white"></h3>
            </div>
        </div>
    </div>
</div>