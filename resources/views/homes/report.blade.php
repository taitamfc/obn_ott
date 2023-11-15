<div class="main-content-inner">
    <div class="row mb-4">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                    <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                    <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            @foreach($grades as $grade)
                            <a class="text-muted mb-0 mr-1 hover-cursor" href="/?grade={{$grade->id}}">{{ $grade->name }}</a>
                            <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                            @endforeach
                    </div>
                </div>
                <div class="d-flex">
                    <div class="btn-group mr-3">
                        <button type="button" class="btn btn-primary">Select Month</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <form action="" method="get">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1" id="dropdownMenu">
                            </div>
                        </form>
                    </div>
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
// Tạo một mảng chứa ba tháng gần đây nhất
var currentDate = new Date();
var recentMonths = [];
for (var i = 2; i >= 0; i--) {
    var month = currentDate.getMonth() - i;
    var year = currentDate.getFullYear();
    if (month < 0) {
        month += 12;
        year -= 1;
    }
    var monthString = (month + 1).toString().padStart(2, '0'); // Định dạng tháng thành chuỗi hai chữ số
    var yearString = year.toString();
    var monthYear = monthString + " " + yearString;
    recentMonths.push(monthYear);
}

// Tạo các phần tử thẻ <a> cho ba tháng gần đây nhất
for (var j = 0; j < recentMonths.length; j++) {
    var monthLink = document.createElement("input");
    monthLink.setAttribute("class", "dropdown-item");
    monthLink.setAttribute("type", "submit");
    monthLink.setAttribute("name", "month");
    monthLink.value = recentMonths[j];
    document.getElementById("dropdownMenu").appendChild(monthLink);
}
</script>