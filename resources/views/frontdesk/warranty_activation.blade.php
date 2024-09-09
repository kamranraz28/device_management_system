@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
<div class="col-md-9 col-lg-8 col-xl-12">
    <br>
    <br>
    <h1 style="text-align:center">Warranty Activation</h1>
    <br>
    
<div class="row">

    <div class="col-md-12">
    
        <form action="your-submit-url" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold;">Marchant Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required style="width: calc(100% - 20px); padding: 10px; box-sizing: border-box; border-radius: 4px; border: 1px solid #ccc;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="phone" style="display: block; margin-bottom: 8px; font-weight: bold;">MSISDN</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required style="width: calc(100% - 20px); padding: 10px; box-sizing: border-box; border-radius: 4px; border: 1px solid #ccc;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="sn" style="display: block; margin-bottom: 8px; font-weight: bold;">SN</label>
                <input type="text" id="sn" name="sn" class="form-control" placeholder="Enter your SN" required style="width: calc(100% - 20px); padding: 10px; box-sizing: border-box; border-radius: 4px; border: 1px solid #ccc;">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="background-color: #e8146c; border-color: #e8146c; color: white; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; border: none;">
                    Submit
                </button>
            </div>
        </form>
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