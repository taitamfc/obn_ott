@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">App</p>
                            <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                            <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                            <p class="text-muted mb-0 hover-cursor">Analytics</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-group mr-3">
                            <button type="button" class="btn btn-primary">02 Aug 2021</button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                <a class="dropdown-item" href="#">Sept 2021</a>
                                <a class="dropdown-item" href="#">Oct 2021</a>
                                <a class="dropdown-item" href="#">Nov 2021</a>
                            </div>
                        </div>
                        <button class="btn bg-white border d-none d-sm-block">Download Report</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                <div class="card mb-mob-4 icon_card primary_card_bg">
                    <!-- Card body -->
                    <div class="card-body">
                        <p class="card-title mb-0 text-white">Number Of Sales</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 text-white">5,009</h3>
                            <div class="arrow_icon"><i class="ion-arrow-up-c text-primary"></i></div>
                        </div>
                        <p class="mb-0 text-white">1.92% <span class="text-white ml-1"><small>(Since last
                                    month)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                <div class="card mb-mob-4 icon_card success_card_bg">
                    <!-- Card body -->
                    <div class="card-body">
                        <p class="card-title mb-0 text-white">New Products</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 text-white">94,356</h3>
                            <div class="arrow_icon"><i class="ion-arrow-down-c text-success"></i></div>
                        </div>
                        <p class="mb-0 text-white">1.92% <span class="text-white ml-1"><small>(Since last
                                    month)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                <div class="card mb-mob-4 icon_card warning_card_bg">
                    <!-- Card body -->
                    <div class="card-body">
                        <p class="card-title mb-0 text-white">New Users</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 text-white">1,253</h3>
                            <div class="arrow_icon"><i class="ion-arrow-up-c text-warning"></i></div>
                        </div>
                        <p class="mb-0 text-white">1.27% <span class="text-white ml-1"><small>(Since last
                                    month)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                <div class="card mb-mob-4 icon_card info_card_bg">
                    <!-- Card body -->
                    <div class="card-body">
                        <p class="card-title mb-0 text-white">Today Earning</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 text-white">5,224</h3>
                            <div class="arrow_icon"><i class="ion-arrow-up-c text-info"></i></div>
                        </div>
                        <p class="mb-0 text-white">9.12% <span class="text-white ml-1"><small>(Since last
                                    day)</small></span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card overflow_visible">
                <div class="card-body">
                    <h4 class="card_title">Draggable Events</h4>
                    <!-- the events -->
                    <div id="external-events">
                        <div class="external-event bg-success">Lunch</div>
                        <div class="external-event bg-warning">Go home</div>
                        <div class="external-event bg-info">Do homework</div>
                        <div class="external-event bg-primary">Work on UI design</div>
                        <div class="external-event bg-danger">Sleep tight</div>
                        <div class="custom-control custom-checkbox primary-checkbox mt-3">
                            <input type="checkbox" class="custom-control-input" id="drop-remove">
                            <label class="custom-control-label" for="drop-remove">Remove After Drop</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 mt-mob-4">
            <div class="card">
                <div class="card-body">
                    <!-- THE CALENDAR -->
                    <div id="calendar" class="full_calendar fc fc-unthemed fc-ltr">
                        <div class="fc-toolbar fc-header-toolbar">
                            <div class="fc-left">
                                <div class="fc-button-group"><button type="button"
                                        class="fc-prev-button fc-button fc-state-default fc-corner-left"
                                        aria-label="prev"><span
                                            class="fc-icon fc-icon-left-single-arrow"></span></button><button
                                        type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"
                                        aria-label="next"><span
                                            class="fc-icon fc-icon-right-single-arrow"></span></button>
                                </div>
                                <button type="button"
                                    class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled"
                                    disabled="">today</button>
                            </div>
                            <div class="fc-right">
                                <select id="view-selector">
                                    <option value="month"
                                        class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">
                                        Month</option>
                                    <option value="agendaWeek" class="fc-agendaWeek-button fc-button fc-state-default">
                                        Week</option>
                                    <option value="agendaDay"
                                        class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">
                                        Day</option>
                                </select>
                            </div>

                            <div class="fc-center">
                                <h2>November 2023</h2>
                            </div>
                            <div class="fc-clear"></div>
                        </div>
                        <div class="fc-view-container" style="">
                            <div class="fc-view fc-month-view fc-basic-view" style="">
                                <table class="">
                                    <thead class="fc-head">
                                        <tr>
                                            <td class="fc-head-container fc-widget-header">
                                                <div class="fc-row fc-widget-header">
                                                    <table class="">
                                                        <thead>
                                                            <tr>
                                                                <th class="fc-day-header fc-widget-header fc-sun">
                                                                    <span>Sun</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-mon">
                                                                    <span>Mon</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-tue">
                                                                    <span>Tue</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-wed">
                                                                    <span>Wed</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-thu">
                                                                    <span>Thu</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-fri">
                                                                    <span>Fri</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-sat">
                                                                    <span>Sat</span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="fc-body">
                                        <tr>
                                            <td class="fc-widget-content">
                                                <div class="fc-scroller fc-day-grid-container"
                                                    style="overflow: hidden; height: 565.6px;">
                                                    <div class="fc-day-grid fc-unselectable">
                                                        <div class="fc-row fc-week fc-widget-content"
                                                            style="height: 94px;">
                                                            <div class="fc-bg">
                                                                <table class="">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past"
                                                                                data-date="2023-10-29"></td>
                                                                            <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                                                data-date="2023-10-30"></td>
                                                                            <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                                                data-date="2023-10-31"></td>
                                                                            <td class="fc-day fc-widget-content fc-wed fc-past"
                                                                                data-date="2023-11-01"></td>
                                                                            <td class="fc-day fc-widget-content fc-thu fc-past"
                                                                                data-date="2023-11-02"></td>
                                                                            <td class="fc-day fc-widget-content fc-fri fc-past"
                                                                                data-date="2023-11-03"></td>
                                                                            <td class="fc-day fc-widget-content fc-sat fc-past"
                                                                                data-date="2023-11-04"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="fc-content-skeleton">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="fc-day-top fc-sun fc-other-month fc-past"
                                                                                data-date="2023-10-29"><span
                                                                                    class="fc-day-number">29</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                                                data-date="2023-10-30"><span
                                                                                    class="fc-day-number">30</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                                                data-date="2023-10-31"><span
                                                                                    class="fc-day-number">31</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-wed fc-past"
                                                                                data-date="2023-11-01"><span
                                                                                    class="fc-day-number">1</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-thu fc-past"
                                                                                data-date="2023-11-02"><span
                                                                                    class="fc-day-number">2</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-fri fc-past"
                                                                                data-date="2023-11-03"><span
                                                                                    class="fc-day-number">3</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-sat fc-past"
                                                                                data-date="2023-11-04"><span
                                                                                    class="fc-day-number">4</span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td rowspan="2"></td>
                                                                            <td rowspan="2"></td>
                                                                            <td rowspan="2"></td>
                                                                            <td class="fc-event-container" colspan="3">
                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"
                                                                                    style="background-color:#F5D41E;border-color:#F5D41E">
                                                                                    <div class="fc-content">
                                                                                        <span class="fc-time">12a</span>
                                                                                        <span class="fc-title">Long
                                                                                            Event</span>
                                                                                    </div>
                                                                                </a></td>
                                                                            <td rowspan="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fc-event-container">
                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"
                                                                                    style="background-color:#F2385A;border-color:#F2385A">
                                                                                    <div class="fc-content">
                                                                                        <span class="fc-time">12a</span>
                                                                                        <span class="fc-title">All
                                                                                            Day Event</span>
                                                                                    </div>
                                                                                </a>
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="fc-row fc-week fc-widget-content"
                                                            style="height: 94px;">
                                                            <div class="fc-bg">
                                                                <table class="">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fc-day fc-widget-content fc-sun fc-past"
                                                                                data-date="2023-11-05"></td>
                                                                            <td class="fc-day fc-widget-content fc-mon fc-today "
                                                                                data-date="2023-11-06"></td>
                                                                            <td class="fc-day fc-widget-content fc-tue fc-future"
                                                                                data-date="2023-11-07"></td>
                                                                            <td class="fc-day fc-widget-content fc-wed fc-future"
                                                                                data-date="2023-11-08"></td>
                                                                            <td class="fc-day fc-widget-content fc-thu fc-future"
                                                                                data-date="2023-11-09"></td>
                                                                            <td class="fc-day fc-widget-content fc-fri fc-future"
                                                                                data-date="2023-11-10"></td>
                                                                            <td class="fc-day fc-widget-content fc-sat fc-future"
                                                                                data-date="2023-11-11"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="fc-content-skeleton">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="fc-day-top fc-sun fc-past"
                                                                                data-date="2023-11-05"><span
                                                                                    class="fc-day-number">5</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-mon fc-today "
                                                                                data-date="2023-11-06"><span
                                                                                    class="fc-day-number">6</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-tue fc-future"
                                                                                data-date="2023-11-07"><span
                                                                                    class="fc-day-number">7</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-wed fc-future"
                                                                                data-date="2023-11-08"><span
                                                                                    class="fc-day-number">8</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-thu fc-future"
                                                                                data-date="2023-11-09"><span
                                                                                    class="fc-day-number">9</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-fri fc-future"
                                                                                data-date="2023-11-10"><span
                                                                                    class="fc-day-number">10</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-sat fc-future"
                                                                                data-date="2023-11-11"><span
                                                                                    class="fc-day-number">11</span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td rowspan="2"></td>
                                                                            <td class="fc-event-container">
                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"
                                                                                    style="background-color:#04C4DC;border-color:#04C4DC">
                                                                                    <div class="fc-content">
                                                                                        <span
                                                                                            class="fc-time">10:30a</span>
                                                                                        <span
                                                                                            class="fc-title">Meeting</span>
                                                                                    </div>
                                                                                </a>
                                                                            </td>
                                                                            <td class="fc-event-container" rowspan="2">
                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"
                                                                                    style="background-color:#1CE882;border-color:#1CE882">
                                                                                    <div class="fc-content">
                                                                                        <span class="fc-time">7p</span>
                                                                                        <span class="fc-title">Birthday
                                                                                            Party</span>
                                                                                    </div>
                                                                                </a></td>
                                                                            <td rowspan="2"></td>
                                                                            <td rowspan="2"></td>
                                                                            <td rowspan="2"></td>
                                                                            <td rowspan="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fc-event-container">
                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"
                                                                                    style="background-color:#65B7F3;border-color:#65B7F3">
                                                                                    <div class="fc-content">
                                                                                        <span class="fc-time">12p</span>
                                                                                        <span
                                                                                            class="fc-title">Lunch</span>
                                                                                    </div>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="fc-row fc-week fc-widget-content"
                                                            style="height: 94px;">
                                                            <div class="fc-bg">
                                                                <table class="">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fc-day fc-widget-content fc-sun fc-future"
                                                                                data-date="2023-11-12"></td>
                                                                            <td class="fc-day fc-widget-content fc-mon fc-future"
                                                                                data-date="2023-11-13"></td>
                                                                            <td class="fc-day fc-widget-content fc-tue fc-future"
                                                                                data-date="2023-11-14"></td>
                                                                            <td class="fc-day fc-widget-content fc-wed fc-future"
                                                                                data-date="2023-11-15"></td>
                                                                            <td class="fc-day fc-widget-content fc-thu fc-future"
                                                                                data-date="2023-11-16"></td>
                                                                            <td class="fc-day fc-widget-content fc-fri fc-future"
                                                                                data-date="2023-11-17"></td>
                                                                            <td class="fc-day fc-widget-content fc-sat fc-future"
                                                                                data-date="2023-11-18"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="fc-content-skeleton">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="fc-day-top fc-sun fc-future"
                                                                                data-date="2023-11-12"><span
                                                                                    class="fc-day-number">12</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-mon fc-future"
                                                                                data-date="2023-11-13"><span
                                                                                    class="fc-day-number">13</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-tue fc-future"
                                                                                data-date="2023-11-14"><span
                                                                                    class="fc-day-number">14</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-wed fc-future"
                                                                                data-date="2023-11-15"><span
                                                                                    class="fc-day-number">15</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-thu fc-future"
                                                                                data-date="2023-11-16"><span
                                                                                    class="fc-day-number">16</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-fri fc-future"
                                                                                data-date="2023-11-17"><span
                                                                                    class="fc-day-number">17</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-sat fc-future"
                                                                                data-date="2023-11-18"><span
                                                                                    class="fc-day-number">18</span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="fc-row fc-week fc-widget-content"
                                                            style="height: 94px;">
                                                            <div class="fc-bg">
                                                                <table class="">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fc-day fc-widget-content fc-sun fc-future"
                                                                                data-date="2023-11-19"></td>
                                                                            <td class="fc-day fc-widget-content fc-mon fc-future"
                                                                                data-date="2023-11-20"></td>
                                                                            <td class="fc-day fc-widget-content fc-tue fc-future"
                                                                                data-date="2023-11-21"></td>
                                                                            <td class="fc-day fc-widget-content fc-wed fc-future"
                                                                                data-date="2023-11-22"></td>
                                                                            <td class="fc-day fc-widget-content fc-thu fc-future"
                                                                                data-date="2023-11-23"></td>
                                                                            <td class="fc-day fc-widget-content fc-fri fc-future"
                                                                                data-date="2023-11-24"></td>
                                                                            <td class="fc-day fc-widget-content fc-sat fc-future"
                                                                                data-date="2023-11-25"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="fc-content-skeleton">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="fc-day-top fc-sun fc-future"
                                                                                data-date="2023-11-19"><span
                                                                                    class="fc-day-number">19</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-mon fc-future"
                                                                                data-date="2023-11-20"><span
                                                                                    class="fc-day-number">20</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-tue fc-future"
                                                                                data-date="2023-11-21"><span
                                                                                    class="fc-day-number">21</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-wed fc-future"
                                                                                data-date="2023-11-22"><span
                                                                                    class="fc-day-number">22</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-thu fc-future"
                                                                                data-date="2023-11-23"><span
                                                                                    class="fc-day-number">23</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-fri fc-future"
                                                                                data-date="2023-11-24"><span
                                                                                    class="fc-day-number">24</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-sat fc-future"
                                                                                data-date="2023-11-25"><span
                                                                                    class="fc-day-number">25</span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="fc-row fc-week fc-widget-content"
                                                            style="height: 94px;">
                                                            <div class="fc-bg">
                                                                <table class="">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fc-day fc-widget-content fc-sun fc-future"
                                                                                data-date="2023-11-26"></td>
                                                                            <td class="fc-day fc-widget-content fc-mon fc-future"
                                                                                data-date="2023-11-27"></td>
                                                                            <td class="fc-day fc-widget-content fc-tue fc-future"
                                                                                data-date="2023-11-28"></td>
                                                                            <td class="fc-day fc-widget-content fc-wed fc-future"
                                                                                data-date="2023-11-29"></td>
                                                                            <td class="fc-day fc-widget-content fc-thu fc-future"
                                                                                data-date="2023-11-30"></td>
                                                                            <td class="fc-day fc-widget-content fc-fri fc-other-month fc-future"
                                                                                data-date="2023-12-01"></td>
                                                                            <td class="fc-day fc-widget-content fc-sat fc-other-month fc-future"
                                                                                data-date="2023-12-02"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="fc-content-skeleton">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="fc-day-top fc-sun fc-future"
                                                                                data-date="2023-11-26"><span
                                                                                    class="fc-day-number">26</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-mon fc-future"
                                                                                data-date="2023-11-27"><span
                                                                                    class="fc-day-number">27</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-tue fc-future"
                                                                                data-date="2023-11-28"><span
                                                                                    class="fc-day-number">28</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-wed fc-future"
                                                                                data-date="2023-11-29"><span
                                                                                    class="fc-day-number">29</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-thu fc-future"
                                                                                data-date="2023-11-30"><span
                                                                                    class="fc-day-number">30</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-fri fc-other-month fc-future"
                                                                                data-date="2023-12-01"><span
                                                                                    class="fc-day-number">1</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-sat fc-other-month fc-future"
                                                                                data-date="2023-12-02"><span
                                                                                    class="fc-day-number">2</span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td class="fc-event-container">
                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"
                                                                                    href="http://google.com/"
                                                                                    style="background-color:#4327B7;border-color:#4327B7">
                                                                                    <div class="fc-content">
                                                                                        <span class="fc-time">12a</span>
                                                                                        <span class="fc-title">Click
                                                                                            for
                                                                                            Google</span>
                                                                                    </div>
                                                                                </a>
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="fc-row fc-week fc-widget-content"
                                                            style="height: 95px;">
                                                            <div class="fc-bg">
                                                                <table class="">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fc-day fc-widget-content fc-sun fc-other-month fc-future"
                                                                                data-date="2023-12-03"></td>
                                                                            <td class="fc-day fc-widget-content fc-mon fc-other-month fc-future"
                                                                                data-date="2023-12-04"></td>
                                                                            <td class="fc-day fc-widget-content fc-tue fc-other-month fc-future"
                                                                                data-date="2023-12-05"></td>
                                                                            <td class="fc-day fc-widget-content fc-wed fc-other-month fc-future"
                                                                                data-date="2023-12-06"></td>
                                                                            <td class="fc-day fc-widget-content fc-thu fc-other-month fc-future"
                                                                                data-date="2023-12-07"></td>
                                                                            <td class="fc-day fc-widget-content fc-fri fc-other-month fc-future"
                                                                                data-date="2023-12-08"></td>
                                                                            <td class="fc-day fc-widget-content fc-sat fc-other-month fc-future"
                                                                                data-date="2023-12-09"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="fc-content-skeleton">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="fc-day-top fc-sun fc-other-month fc-future"
                                                                                data-date="2023-12-03"><span
                                                                                    class="fc-day-number">3</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-mon fc-other-month fc-future"
                                                                                data-date="2023-12-04"><span
                                                                                    class="fc-day-number">4</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-tue fc-other-month fc-future"
                                                                                data-date="2023-12-05"><span
                                                                                    class="fc-day-number">5</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-wed fc-other-month fc-future"
                                                                                data-date="2023-12-06"><span
                                                                                    class="fc-day-number">6</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-thu fc-other-month fc-future"
                                                                                data-date="2023-12-07"><span
                                                                                    class="fc-day-number">7</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-fri fc-other-month fc-future"
                                                                                data-date="2023-12-08"><span
                                                                                    class="fc-day-number">8</span>
                                                                            </td>
                                                                            <td class="fc-day-top fc-sat fc-other-month fc-future"
                                                                                data-date="2023-12-09"><span
                                                                                    class="fc-day-number">9</span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Primary table -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body col-12">
                    <h4 class="header-title">Data Table Primary</h4>
                    <div class="table-responsive datatable-primary">
                        <table id="dataTable2" class="text-center w-100">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start Date</th>
                                    <th>salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>21</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection