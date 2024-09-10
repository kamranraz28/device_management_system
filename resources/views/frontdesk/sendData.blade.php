@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')
<div class="col-md-9 col-lg-8 col-xl-12">
    <br>
    <br>
    <h1 style="text-align:center">Send Promotional Message to Device</h1>
    <br>

    @if ($message!== null)
    <div class="container mt-4">
        <div class="alert" style="background-color: #e8146c; color: white;">
            {{ $message }}
        </div>
    </div>
    @endif
    
<div class="row">
    

    <div class="col-md-12">
    <h4 style="text-align:center">Device SN: {{$sn}}</h4>
        <form action="{{ route('display', ['sn' => $sn]) }}"
        method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
            @csrf

            <div class="form-group" style="margin-bottom: 15px;">
                
                <input type="text" id="message" name="message" class="form-control" placeholder="Enter message" required style="width: calc(100% - 20px); padding: 10px; box-sizing: border-box; border-radius: 4px; border: 1px solid #ccc;">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="background-color: #e8146c; border-color: #e8146c; color: white; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; border: none;">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</div>



</div>




@endsection