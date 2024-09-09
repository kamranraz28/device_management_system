@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
<div class="col-md-9 col-lg-8 col-xl-12">
    <div class="row">

    
        
    </div>
    <div class="row">
        <div class="col-sm-12">
        <h2>Device Activation Report</h2>
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
                                            <th>Marchant/Agent</th>
                                            <th>MSISDN</th>
                                            <th>Location</th>
                                            <th>Device SN</th>
                                            <th>Activation Date</th>
                                            <th>Last Warranty Date</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Kamran Telecom</td>
                                            <th>01609758371</th>
                                            <th>Mymensingh</th>
                                            <td>1234567</td>
                                            <td>20-03-2023</td>
                                            <td>19-03-2024</td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Shakib Telecom</td>
                                            <th>01609758372</th>
                                            <th>Mymensingh</th>
                                            <td>7654321</td>
                                            <td>20-03-2023</td>
                                            <td>19-03-2024</td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Tamim Telecom</td>
                                            <th>01709758377</th>
                                            <th>Mymensingh</th>
                                            <td>9876098</td>
                                            <td>20-03-2023</td>
                                            <td>19-03-2024</td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>Mash Telecom</td>
                                            <th>01609858377</th>
                                            <th>Mymensingh</th>
                                            <td>8764567</td>
                                            <td>20-03-2023</td>
                                            <td>19-03-2024</td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>Kajal Telecom</td>
                                            <th>01609858377</th>
                                            <th>Mymensingh</th>
                                            <td>5670567</td>
                                            <td>20-03-2023</td>
                                            <td>19-03-2024</td>
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