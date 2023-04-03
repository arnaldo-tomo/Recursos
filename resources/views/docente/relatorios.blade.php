@extends('layouts.principal_admin')
@section('conteudo')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-bar-chart"></i>PERFORMANCE REPORT</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>MAKE SELECTION</h6>
                    <div class="inner-item dash-search-form">
                        <div class="col-md-3 col-sm-6">
                            <label>CLASS</label>
                            <select>
                                <option>5th STD</option>
                                <option>6th STD</option>
                                <option>7th STD</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>SECTION</label>
                            <select>
                                <option>PTH05A</option>
                                <option>PTH05B</option>
                            </select>
                        </div>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-md-3 col-sm-6">
                            <label>ROLL NO</label>
                            <select>
                                <option>ALL</option>
                                <option>PTH01A01</option>
                                <option>PTH01A02</option>
                                <option>PTH01A03</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>COURSE CODE</label>
                            <select>
                                <option>MTH101</option>
                                <option>MTH102</option>
                                <option>MTH103</option>
                                <option>MTH104</option>
                            </select>
                        </div>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-md-3 col-sm-6">
                            <label class="top-margin">TYPE</label>
                            <select>
                                <option>Class Assessment</option>
                                <option>MTE</option>
                                <option>ETE</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>SELECT</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-6">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-line-chart"></i>GRAPH REPORT</h6>
                    <div class="inner-item">
                        <div class="summary-chart">
                            <canvas id="studentAttendenceLine"></canvas>
                            <div class="chart-legends">
                                <span class="red">ABSENT</span>
                                <span class="orange">FAIL</span>
                                <span class="green">PASS</span>
                            </div>
                            <div class="chart-title">
                                <h6 class="bottom-title">STUDENT PERFORMANCE REPORT</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-list"></i>TABLE REPORT</h6>
                    <div class="inner-item">
                        <div>
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-puzzle-piece"></i>ROLL #</th>
                                        <th><i class="fa fa-cogs"></i>TYPE</th>
                                        <th><i class="fa fa-exclamation"></i>MARKS</th>
                                        <th><i class="fa fa-check"></i>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PTH05A01</td>
                                        <td>MTE</td>
                                        <td>45</td>
                                        <td>PASS</td>
                                    </tr>
                                    <tr>
                                        <td>PTH05A012</td>
                                        <td>MTE</td>
                                        <td>45</td>
                                        <td>PASS</td>
                                    </tr>
                                    <tr>
                                        <td>PTH05A03</td>
                                        <td>MTE</td>
                                        <td>45</td>
                                        <td>PASS</td>
                                    </tr>
                                    <tr>
                                        <td>PTH05A04</td>
                                        <td>MTE</td>
                                        <td>25</td>
                                        <td>FAIL</td>
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

@endsection