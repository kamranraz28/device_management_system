@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
<div class="col-md-9 col-lg-8 col-xl-12">
    <div class="row">

        <div class="card dash-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar2">
                                <div class="circle-graph2" data-percent="65">
                                    <img src="assets/img/total-icon.png" class="img-fluid" alt="Patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Registered Device </h6>
                                <h3>305</h3>
                                <p class="text-muted">Till Today</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
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
                                            <th>Battery Stats</th>
                                            <th>ON/OFF</th>
                                            <th>Device Status</th>
                                            <th>Last Online</th>
                                            <th>Disable/Enable</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Kamran Telecom</td>
                                            <th>01609758371</th>
                                            <th>Mymensingh</th>
                                            <td>1234567</td>
                                            <td>BH-90%</td>
                                            <td>
                                                <i class="fas fa-lightbulb"
                                                    style="color: #28a745; font-size: 1.5em;"></i>

                                            </td>

                                            <td>Active</td>
                                            <td>2 Days Ago</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Shakib Telecom</td>
                                            <th>01609758372</th>
                                            <th>Mymensingh</th>
                                            <td>7654321</td>
                                            <td>BH-89%</td>
                                            <td>
                                                <i class="fas fa-lightbulb"
                                                    style="color: #28a745; font-size: 1.5em;"></i>

                                            </td>
                                            <td>Active</td>
                                            <td>5 Days Ago</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Tamim Telecom</td>
                                            <th>01709758377</th>
                                            <th>Mymensingh</th>
                                            <td>9876098</td>
                                            <td>BH-95%</td>
                                            <td>
                                                <i class="fas fa-lightbulb"
                                                    style="color: #6c757d; font-size: 1.5em;"></i>

                                            </td>
                                            <td>Active</td>
                                            <td>1 Days Ago</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>Mash Telecom</td>
                                            <th>01609858377</th>
                                            <th>Mymensingh</th>
                                            <td>8764567</td>
                                            <td>BH-90%</td>
                                            <td>
                                                <i class="fas fa-lightbulb"
                                                    style="color: #6c757d; font-size: 1.5em;"></i>

                                            </td>
                                            <td>Active</td>
                                            <td>2 Days Ago</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>Kajal Telecom</td>
                                            <th>01609858377</th>
                                            <th>Mymensingh</th>
                                            <td>5670567</td>
                                            <td>BH-90%</td>
                                            <td>
                                                <i class="fas fa-lightbulb"
                                                    style="color: #6c757d; font-size: 1.5em;"></i>

                                            </td>
                                            <td>Active</td>
                                            <td>2 Days Ago</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle" checked>
                                                    <span class="slider round"></span>
                                                </label>
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
</div>


@section('js') 

<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>


<script>
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function () {
            const statusCell = this.closest('tr').querySelector('td:nth-child(8)');
            if (this.checked) {
                statusCell.textContent = 'Active';
            } else {
                statusCell.textContent = 'Inactive';
            }
        });
    });
</script>

@endsection


@endsection