@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>EXAMINATION SEATING PLAN</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-puzzle-piece"></i>SEATING PLAN</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-calendar"></i>DATE</th>
                                    <th><i class="fa fa-clock-o"></i>TIMING</th>
                                    <th><i class="fa fa-code"></i>COURSE CODE</th>
                                    <th><i class="fa fa-building-o"></i>ROOM</th>
                                    <th><i class="fa fa-puzzle-piece"></i>SEAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20 Sep 2017</td>
                                    <td>09-11 AM</td>
                                    <td>MTH101</td>
                                    <td>Room# 404 </td>
                                    <td>RM404S010</td>
                                </tr>
                                <tr>
                                    <td>22 Sep 2017</td>
                                    <td>09-11 AM</td>
                                    <td>MTH101</td>
                                    <td>Room# 404 </td>
                                    <td>RM404S010</td>
                                </tr>
                                <tr>
                                    <td>24 Sep 2017</td>
                                    <td>09-11 AM</td>
                                    <td>MTH101</td>
                                    <td>Room# 404 </td>
                                    <td>RM404S010</td>
                                </tr>
                                <tr>
                                    <td>26 Sep 2017</td>
                                    <td>09-11 AM</td>
                                    <td>MTH101</td>
                                    <td>Room# 404 </td>
                                    <td>RM404S010</td>
                                </tr>
                                <tr>
                                    <td>28 Sep 2017</td>
                                    <td>09-11 AM</td>
                                    <td>MTH101</td>
                                    <td>Room# 404 </td>
                                    <td>RM404S010</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>COURSE DETAILS</h6>
                    <div class="inner-item">
                        <div class="item-header">
                            <div class="col-xs-2">
                                <h6>COURSE CODE</h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>DESCRIPTION</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>LECTURE</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>PRACTICLE</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>CREDITS</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tbl-row">
                            <div class="col-xs-2">
                                <h6>MTH101</h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>Basic Mathematics</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>3</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>2</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>4</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tbl-row">
                            <div class="col-xs-2">
                                <h6>PHY101</h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>Current & Electricity</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>3</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>2</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>4</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tbl-row">
                            <div class="col-xs-2">
                                <h6>MTH101</h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>Basic Mathematics</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>3</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>2</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>4</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tbl-row">
                            <div class="col-xs-2">
                                <h6>PHY101</h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>Current & Electricity</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>3</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>2</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6>4</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection