@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
@section('css')
<style>
    .dataTables_filter {
        padding: 20px;
    }

    .dataTables_length {
        padding-left: 20px;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
<div class="col-md-9 col-lg-8 col-xl-12">
    <div class="row">

        <div class="card dash-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="75">
                                    <img src="assets/img/total-icon.png" class="img-fluid" alt="patient"
                                        style="filter: hue-rotate(270deg) saturate(500%) brightness(0.9);">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Total Device</h6>
                                <h3>305</h3>
                                <p class="text-muted">Till Today</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="90">
                                    
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Active Device</h6>
                                <h3>295</h3>
                                <p class="text-muted">Till Today</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="card dash-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="5">
                                    
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Inactive Device</h6>
                                <h3>10</h3>
                                <p class="text-muted">Till Today</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="98">
                                    
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Registered Device</h6>
                                <h3>300</h3>
                                <p class="text-muted">Till Today</p>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="card dash-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="2">
                                    
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Unregistered Device</h6>
                                <h3>5</h3>
                                <p class="text-muted">Till Today</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="95">
                                    
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Reparining Device</h6>
                                <h3>12</h3>
                                <p class="text-muted">Till Today</p>
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
    $(document).ready(function () {
        $('#datatable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "pageLength": 10,
            "order": [],
            "columnDefs": [{
                "targets": [0, 6],
                "orderable": false
            }],
            "language": {
                "paginate": {
                    "previous": "&lt;",
                    "next": "&gt;"
                }
            }
        });
    });
</script>
@endsection


@endsection