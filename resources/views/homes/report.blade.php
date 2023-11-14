<div class="main-content-inner">
    <div class="row mb-4">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                    <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($reports as $report)
        <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
            <div class="card mb-mob-4 icon_card info_card_bg">
                <!-- Card body -->
                <div class="card-body text-center">
                    <p class="card-title mb-2 text-white">{{ $report['content'] }}</p>
                    <div class="text-center">
                        <h3 class="mb-0 text-white">{{ $report['data'] }}</h3>
                    </div>
                    <p class="mb-0 text-white">1.92% <span class="text-white ml-1"><small>(Since last
                                month)</small></span></p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>