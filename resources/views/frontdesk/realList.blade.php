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
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body pt-3">
          <div class="card card-table mb-3">
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover table-center mb-0 patients-table table-striped"
                  style="width:100%">
                  <thead>
                    <tr>

                      <th>Marchant/Agent</th>
                      <th>MSISDN</th>
                      <th>SN</th>
                      <th>Port</th>
                      <th>Status</th>
                      <th>IMEI</th>
                      <th>IMSI</th>
                      <th>Battery</th>
                      <th>Location</th>
                      <th>Last Active</th>
                      <th>Send QR</th>
                      <th>Send Message</th>
                      <th>Cash In</th>
                      <th>Cash Out</th>
                      <th>Bill Pay</th>


                    </tr>
                  </thead>
                  <tbody id="clients-table-body">
                    @php
            $staticData = [
              ['marchant' => 'Kamran Telecom', 'msisdn' => '01609758377', 'sn' => 'PRODUCT0001', 'address' => '::ffff:202.134.9.133', 'port' => '14443', 'imei' => '354964794983915', 'imsi' => '470075020524481', 'battery' => '80%', 'location' => 'Mymensingh', 'status' => '1', 'last_active' => '2024-09-01 08:00:00'],
              ['marchant' => 'Mash Telecom', 'msisdn' => '01609758378', 'sn' => 'PRODUCT0030', 'address' => '::ffff:27.147.163.77', 'port' => '53160', 'imei' => '123456789012346', 'imsi' => '310260000000001', 'battery' => '60%', 'location' => 'Dhaka', 'status' => '2', 'last_active' => '2024-08-20 04:30:00'],
              ['marchant' => 'Tamim Telecom', 'msisdn' => '01609758376', 'sn' => 'XTRA0000015', 'address' => '192.168.1.3', 'port' => '8082', 'imei' => '123456789012347', 'imsi' => '310260000000002', 'battery' => '75%', 'location' => 'Dhaka', 'status' => '2', 'last_active' => '2024-08-15 10:45:00'],
              ['marchant' => 'Shakib Telecom', 'msisdn' => '01609758379', 'sn' => 'PRODUCT0004', 'address' => '192.168.1.4', 'port' => '8083', 'imei' => '123456789012348', 'imsi' => '310260000000003', 'battery' => '90%', 'location' => 'Barishal', 'status' => '2', 'last_active' => '2024-07-30 06:00:00'],
              ['marchant' => 'Kajal Telecom', 'msisdn' => '01609758371', 'sn' => 'XTRA0000013', 'address' => '192.168.1.5', 'port' => '8084', 'imei' => '123456789012349', 'imsi' => '310260000000004', 'battery' => '50%', 'location' => 'Sylhet', 'status' => '2', 'last_active' => '2024-08-05 03:15:00'],
            ];

            // Collect SNs from clients for matching
            $clientSNs = collect($clients)->pluck('sn')->toArray();
            $clientsCollection = collect($clients)->keyBy('sn');
          @endphp

                    @foreach ($staticData as $data)
                      @php
              // Initialize status as '2'
              $status = '2';
              $batteryHealth = '100%';

              if ($clientsCollection->has($data['sn'])) {

              $battery = $clientsCollection[$data['sn']]['battery'];
              $batteryvalue = (($battery - 2700) / (4200 - 2700)) * 100;
              $batteryHealth = (int) $batteryvalue . '%';
              }



              // Check if the SN exists in the $clientSNs array
              foreach ($clientSNs as $clientSN) {
              if ($data['sn'] === $clientSN) {
              $status = '1';


              }
              }

              // dump($status);

              // Determine the last active status
              if ($status == '1') {
              $lastActive = 'Active';
              } elseif ($status == '2') {
              $lastActive = \Carbon\Carbon::parse($data['last_active'])->format('Y-m-d H:i:s');
              } else {
              $lastActive = 'Never Activated';
              }
            @endphp
                      <tr id="sn-{{ $data['sn'] }}">
                        <td>{{ $data['marchant'] }}</td>
                        <td>{{ $data['msisdn'] }}</td>
                        <td>
                        {{ $data['sn'] }}
                        <div style="font-size: 0.8em; color: #6c757d;">
                          {{ $data['address'] }}
                        </div>
                        </td>
                        <td>{{ $data['port'] }}</td>
                        <td>
                        @if($status == '1')
              <i class="fas fa-lightbulb" class="active-light-bulb" style="color: #28a745; font-size: 1.5em;"></i>
            @else
        <i class="fas fa-lightbulb"  class="active-light-bulb"  style="color: #6c757d; font-size: 1.5em;"></i>
      @endif
                        </td> <!-- Display Status with Icon -->
                        <td>{{ $data['imei'] }}</td>
                        <td>{{ $data['imsi'] }}</td>
                        <td>{{$batteryHealth}}</td>
                        <td>{{ $data['location'] }}</td>

                        <td>{{ $lastActive }}</td> <!-- Display Last Active -->

                        <!-- Send QR Button -->
                        <td>
                        <button class="approveButton4"
                          style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;"
                          data-id="{{ $data['sn'] }}">
                          QR
                        </button>

                        </td>

                        <!-- Send Message Button -->
                        <td>
                        <button class="approveButton5"
                          style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;"
                          data-id="{{ $data['sn'] }}">
                          Message
                        </button>

                        </td>

                        <td>
                        <button class="approveButton"
                          style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;"
                          data-id="{{ $data['sn'] }}">
                          Cashin
                        </button>

                        <td>
                        <button class="approveButton2"
                          style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;"
                          data-id="{{ $data['sn'] }}">
                          Cashout
                        </button>

                        <td>
                        <button class="approveButton3"
                          style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;"
                          data-id="{{ $data['sn'] }}">
                          Bill Pay
                        </button>
                        </td>

                      </tr>
          @endforeach
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


@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Cash In Start-->
<script>
  // Use event delegation to handle click events for all buttons with the class 'approveButton'
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.approveButton').forEach(function (button) {
      button.addEventListener('click', function () {
        var clickedElement = $(this);  // jQuery selector
        var visitor_id = clickedElement.data('id');

        Swal.fire({
          title: 'Cash In',
          html:
            '<strong>Device SN: ' + visitor_id + '</strong><br><br>' +
            '<form action="/cashin/' + visitor_id + '" method="post">' +  // Inject visitor_id into the action URL
            '   @csrf' +
            '   <div class="form-group">' +
            '       <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" required>' +
            '   </div>' +
            '<br>' +
            '   <button type="submit" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">Submit</button>' +
            '</form>',
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonText: 'Cancel',
          showLoaderOnConfirm: true,
        });
      });
    });
  });
</script>
<!-- Cash In End-->

<!-- Cash Out Start-->
<script>
  // Use event delegation to handle click events for all buttons with the class 'approveButton'
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.approveButton2').forEach(function (button) {
      button.addEventListener('click', function () {
        var clickedElement = $(this);  // jQuery selector
        var visitor_id = clickedElement.data('id');

        Swal.fire({
          title: 'Cash Out',
          html:
            '<strong>Device SN: ' + visitor_id + '</strong><br><br>' +
            '<form action="/cashout/' + visitor_id + '" method="post">' +  // Inject visitor_id into the action URL
            '   @csrf' +
            '   <div class="form-group">' +
            '       <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" required>' +
            '   </div>' +
            '<br>' +
            '   <button type="submit" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">Submit</button>' +
            '</form>',
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonText: 'Cancel',
          showLoaderOnConfirm: true,
        });
      });
    });
  });
</script>
<!-- Cash Out End-->


<!-- Pay Bill Start-->
<script>
  // Use event delegation to handle click events for all buttons with the class 'approveButton'
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.approveButton3').forEach(function (button) {
      button.addEventListener('click', function () {
        var clickedElement = $(this);  // jQuery selector
        var visitor_id = clickedElement.data('id');

        Swal.fire({
          title: 'Bill Pay',
          html:
            '<strong>Device SN: ' + visitor_id + '</strong><br><br>' +
            '<form action="/paybill/' + visitor_id + '" method="post">' +  // Inject visitor_id into the action URL
            '   @csrf' +
            '   <div class="form-group">' +
            '       <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" required>' +
            '   </div>' +
            '<br>' +
            '   <button type="submit" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">Submit</button>' +
            '</form>',
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonText: 'Cancel',
          showLoaderOnConfirm: true,
        });
      });
    });
  });
</script>
<!-- Pay Bill End-->


<!-- QR Start-->
<script>
  // Use event delegation to handle click events for all buttons with the class 'approveButton'
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.approveButton4').forEach(function (button) {
      button.addEventListener('click', function () {
        var clickedElement = $(this);  // jQuery selector
        var visitor_id = clickedElement.data('id');

        Swal.fire({
          title: 'Send QR',
          html:
            '<strong>Device SN: ' + visitor_id + '</strong><br><br>' +
            '<form action="/qr/' + visitor_id + '" method="post">' +  // Inject visitor_id into the action URL
            '   @csrf' +
            '   <div class="form-group">' +
            '       <input type="text" name="message" id="message" class="form-control" placeholder="Enter Message Here" required>' +
            '   </div>' +
            '<br>' +
            '   <button type="submit" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">Submit</button>' +
            '</form>',
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonText: 'Cancel',
          showLoaderOnConfirm: true,
        });
      });
    });
  });
</script>
<!-- QR End-->



<!-- Message Start-->
<script>
  // Use event delegation to handle click events for all buttons with the class 'approveButton'
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.approveButton5').forEach(function (button) {
      button.addEventListener('click', function () {
        var clickedElement = $(this);  // jQuery selector
        var visitor_id = clickedElement.data('id');

        Swal.fire({
          title: 'Send Message',
          html:
            '<strong>Device SN: ' + visitor_id + '</strong><br><br>' +
            '<form action="/display/' + visitor_id + '" method="post">' +  // Inject visitor_id into the action URL
            '   @csrf' +
            '   <div class="form-group">' +
            '       <input type="text" name="message" id="message" class="form-control" placeholder="Enter Message Here" required>' +
            '   </div>' +
            '<br>' +
            '   <button type="submit" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">Submit</button>' +
            '</form>',
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonText: 'Cancel',
          showLoaderOnConfirm: true,
        });
      });
    });
  });
  setInterval(function(){
    console.log('running');
    fetch('http://167.172.83.81:3000/clients').then(res=>{return res.json()}).then(dt=>{
      console.log(dt);
      let ids = dt.map(s=>s.sn);
      document.querySelectorAll('.active-light-bulb').forEach(item=>{
        item.style.color = '#6c757d'
      })
      ids.forEach(sn=>{
        let x = document.querySelector('tr#sn-'+sn+' .active-light-bulb');
        if(!x) return;
        x.style.color="#28a745"
      })
    })
  },5000)
</script>
<!-- Message End-->

@endsection