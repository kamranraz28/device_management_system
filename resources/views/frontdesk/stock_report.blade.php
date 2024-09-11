@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
<div class="col-md-9 col-lg-8 col-xl-12">
    <br>
<div class="row">
    <div class="col-6">
        <!-- From Date Field -->
        <label for="from_date">From Date:</label>
        <input type="date" id="from_date" class="form-control" name="from_date">
    </div>
</div>
<br>
<div class="row">
    <div class="col-6">
        <!-- From Date Field -->
        <label for="from_date">To Date:</label>
        <input type="date" id="from_date" class="form-control" name="from_date">
    </div>
</div>
<br>

    <div class="row">
        <div class="col-sm-12">
        <h2>Stock Report</h2>
            <div class="card">

                <div class="card-body pt-3">

                    <div class="card card-table mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example"
                                    class="table table-hover table-center mb-0 patients-table table table-striped"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                            <th>Device SN</th>
                                            <th>IMEI</th>
                                            <th>Stock-in Date</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            
                                            <td>1234567</td>
                                            <td>20032023</td>
                                            <td>11-09-2024</td>
                                            
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            
                                            <td>7654321</td>
                                            <td>20032023</td>
                                            <td>11-09-2024</td>
                                            
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            
                                            <td>9876098</td>
                                            <td>20032023</td>
                                            <td>11-09-2024</td>
                                           
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            
                                            <td>8764567</td>
                                            <td>20032023</td>
                                            <td>11-09-2024</td>
                                            
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            
                                            <td>5670567</td>
                                            <td>20032023</td>
                                            <td>11-09-2024</td>
                                            
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
</div>





@endsection