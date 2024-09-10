@extends('frontdesk.master')

@section('title', 'VMS')

@section('content')
<div class="col-md-9 col-lg-8 col-xl-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body pt-3">
                    <div class="card card-table mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-center mb-0 patients-table table-striped" style="width:100%">
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
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="clients-table-body">
                                        @php
                                            $staticData = [
                                                ['marchant' => 'Kamran Telecom', 'msisdn' => '01609758377', 'sn' => 'PRODUCT0001', 'address' => '::ffff:202.134.9.133', 'port' => '14443', 'imei' => '354964794983915', 'imsi' => '470075020524481', 'battery' => '3801%', 'location' => 'Mymensingh', 'status' => '1', 'last_active' => '2024-09-01 08:00:00'],
                                                ['marchant' => 'Mash Telecom', 'msisdn' => '01609758378', 'sn' => 'PRODUCT0030', 'address' => '::ffff:27.147.163.77', 'port' => '53160', 'imei' => '123456789012346', 'imsi' => '310260000000001', 'battery' => '60%', 'location' => 'Dhaka', 'status' => '2', 'last_active' => '2024-08-20 04:30:00'],
                                                ['marchant' => 'Tamim Telecom', 'msisdn' => '01609758376', 'sn' => '910100010', 'address' => '192.168.1.3', 'port' => '8082', 'imei' => '123456789012347', 'imsi' => '310260000000002', 'battery' => '75%', 'location' => 'Dhaka', 'status' => '2', 'last_active' => '2024-08-15 10:45:00'],
                                                ['marchant' => 'Shakib Telecom', 'msisdn' => '01609758379', 'sn' => 'PRODUCT0004', 'address' => '192.168.1.4', 'port' => '8083', 'imei' => '123456789012348', 'imsi' => '310260000000003', 'battery' => '90%', 'location' => 'Barishal', 'status' => '2', 'last_active' => '2024-07-30 06:00:00'],
                                                ['marchant' => 'Kajal Telecom', 'msisdn' => '01609758371', 'sn' => 'PRODUCT0005', 'address' => '192.168.1.5', 'port' => '8084', 'imei' => '123456789012349', 'imsi' => '310260000000004', 'battery' => '50%', 'location' => 'Sylhet', 'status' => '2', 'last_active' => '2024-08-05 03:15:00'],
                                            ];

                                            // Collect SNs from clients for matching
                                            $clientSNs = collect($clients)->pluck('sn')->toArray();
                                        @endphp

                                        @foreach ($staticData as $data)
                                            @php
                                                // Initialize status as '2'
                                                $status = '2';

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
                                            <tr>
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
                                                        <i class="fas fa-lightbulb" style="color: #28a745; font-size: 1.5em;"></i>
                                                    @else
                                                        <i class="fas fa-lightbulb" style="color: #6c757d; font-size: 1.5em;"></i>
                                                    @endif
                                                </td> <!-- Display Status with Icon -->
                                                <td>{{ $data['imei'] }}</td>
                                                <td>{{ $data['imsi'] }}</td>
                                                <td>{{ $data['battery'] }}</td>
                                                <td>{{ $data['location'] }}</td>

                                                <td>{{ $lastActive }}</td> <!-- Display Last Active -->

                                                <!-- Send QR Button -->
                                                <td>
                                                    <button onclick="document.getElementById('form-qr-{{ $data['sn'] }}').submit();" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">
                                                        Send
                                                    </button>
                                                    <form id="form-qr-{{ $data['sn'] }}" action="{{ route('qrcode_view', ['sn' => $data['sn']]) }}" method="GET" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </td>

                                                <!-- Send Message Button -->
                                                <td>
                                                    <button onclick="document.getElementById('form-msg-{{ $data['sn'] }}').submit();" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">
                                                        Send
                                                    </button>
                                                    <form id="form-msg-{{ $data['sn'] }}" action="{{ route('send', ['sn' => $data['sn']]) }}" method="GET" style="display: none;">
                                                        @csrf
                                                    </form>
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
