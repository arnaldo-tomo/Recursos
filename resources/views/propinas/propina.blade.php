@extends('layouts.principal_admin')
@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-bar-money"></i>FEES</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>VIEW FEE STATUS</h6>
                    <div class="inner-item dash-search-form">
                        <div class="col-sm-4">
                            <label>SESSION</label>
                            <select>
                                <option>All</option>
                                <option>2016 - 2017</option>
                                <option>2017 - 2018</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>FEE TYPE</label>
                            <select>
                                <option>All</option>
                                <option>Academic</option>
                                <option>Transport</option>
                                <option>Hostel</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>SEARCH</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>FEE DETAILS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-cogs"></i>FEE TYPE</th>
                                    <th><i class="fa fa-calendar"></i>DUE DATE</th>
                                    <th><i class="fa fa-calendar"></i>PAID DATE</th>
                                    <th><i class="fa fa-cogs"></i>PAYMENT MODE</th>
                                    <th><i class="fa fa-user"></i>PAID BY</th>
                                    <th><i class="fa fa-check"></i>STATUS</th>
                                    <th><i class="fa fa-ban"></i>RECEIPT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Academic</td>
                                    <td>17 Jul 2017</td>
                                    <td>15 Jul 2017</td>
                                    <td>Credit Card</td>
                                    <td>Lennore Doe</td>
                                    <td class="text-success">PAID</td>
                                    <td><a href="#"><i class="fa fa-download"></i>DOWNLOAD</a></td>
                                </tr>
                                <tr>
                                    <td>Hostel</td>
                                    <td>17 Jul 2017</td>
                                    <td>15 Jul 2017</td>
                                    <td>Cash</td>
                                    <td>John Doe</td>
                                    <td class="text-success">PAID</td>
                                    <td><a href="#"><i class="fa fa-download"></i>DOWNLOAD</a></td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td>22 Jul 2017</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="text-danger">Over Due</td>
                                    <td>-</td>
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