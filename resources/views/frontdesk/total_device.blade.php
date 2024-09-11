@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
    <div class="col-md-9 col-lg-8 col-xl-12">
    @if (session('message'))
        <div class="container mt-4">
            <div class="alert" style="background-color: #e8146c; color: white;">
                {{ session('message') }}
            </div>
        </div>
    @endif
        <div class="row">
            <div class="card dash-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="65">
                                        <img src="assets/img/pending-icon.png" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Total Device</h6>
                                    <h3>1</h3>
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row justify-content-end mt-3">
            <a style="width: 150px; height: 40px; display: flex; justify-content: center; align-items: center; margin: 0 20px 10px 0;"
               href="{{route('new_visitor_add')}}" class="btn btn-secondary btn-sm">Add new Visitor</a>
        </div> -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body pt-3">

                        <!-- Your table code remains unchanged -->
                        <div class="card card-table mb-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover table-center mb-0 patients-table table table-striped" style="width:100%">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>#</th>
                                           
                                            <th>SN</th>
                                            <th>Address</th>
                                            
                                            <th>Port</th>
                                            <th>IMEI</th>
                                            <th>IMSI</th>
                                            
                                            <!-- <th>Application Details</th> -->
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                        <tr>
                                            <td>1</td>
                                            <td>PRODUCT000100</td>
                                            <td>::ffff:103.230.105.2100</td>
                                            <td>9008</td>
                                            <td>123456789</td>
                                            <td>234567891</td>
                                            
                                            <td>
                                                <button  data-id="" id="approveButton"
                                                style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;"
                                                >Register</button>                                                
                                                <br>
                                                
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
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
  document.getElementById('approveButton').addEventListener('click', function() {
    var clickedElement = $(this);
    var visitor_id = clickedElement.data('id');
    Swal.fire({
      title: 'Register Now',
      html:
        '<form action="/register_now" method="post">' +
        '   @csrf' +
        '   <input type="phone" name="phone" class="form-control" placeholder="Enter Marchant Phone Number">' +
        '<br>'+
        '   <button type="submit" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">Submit</button>' +
        '</form>',
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonText: 'Cancel',
      showLoaderOnConfirm: true,
    })
  });
</script>


 
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    @endsection


@endsection