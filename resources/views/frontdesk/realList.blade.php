@extends('frontdesk.master')

@section('title', 'VMS')

@section('content')
    <div class="col-md-9 col-lg-8 col-xl-12">
    
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
                                            <tr>
                                                <th>SN</th>
                                                <th>Address</th>
                                                <th>Port</th>
                                                <th>IMEI</th>
                                                <th>IMSI</th>
                                                <th>Battery</th>
                                                <th>Longitude</th>
                                                <th>Latitude</th>
                                                <th>Send</th>
                                            </tr>
                                        </thead>
                                        <tbody id="clients-table-body">
                                            @foreach($clients as $client)
                                                <tr>
                                                    <td>{{ $client['sn'] ?? '' }}</td>
                                                    <td>{{ $client['address'] ?? '' }}</td>
                                                    <td>{{ $client['port'] ?? '' }}</td>
                                                    <td>{{ $client['imei'] ?? '' }}</td>
                                                    <td>{{ $client['imsi'] ?? '' }}</td>
                                                    <td>{{ $client['battery'] ?? '' }}</td>
                                                    <td>{{ $client['lng'] ?? '' }}</td>
                                                    <td>{{ $client['lat'] ?? '' }}</td>
                                                    
                                                    <td>
                                                        <!-- Button that triggers form submission -->
                                                        <button onclick="document.getElementById('form-{{ $client['sn'] }}').submit();" style="background-color: #e8146c; color: white; padding: 10px 15px; border-radius: 5px; border: none; cursor: pointer;">
                                                            Send
                                                        </button>

                                                        <!-- Hidden form for submission -->
                                                        <form id="form-{{ $client['sn'] }}" action="{{ route('display', ['sn' => $client['sn']]) }}" method="POST" style="display: none;">
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

@section('js')
    <!-- Include Axios from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Additional JS files -->
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        // Function to fetch updated data and update the table
        function fetchClientsData() {
            axios.get('{{ route('real_list') }}')
                .then(function (response) {
                    // Check if the response data structure is as expected
                    // console.log('AJAX Response:', response.data);

                    const clients = response.data.clients; // Adjust based on your response structure
                    const tableBody = document.getElementById('clients-table-body');

                    // Check if clients data is available
                    if (clients && Array.isArray(clients)) {
                        // Clear the existing table body
                        tableBody.innerHTML = '';

                        // Loop through the clients and create new table rows
                        clients.forEach(function (client) {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${client.sn || ''}</td>
                                <td>${client.address || ''}</td>
                                <td>${client.port || ''}</td>
                                <td>${client.imei || ''}</td>
                                <td>${client.imsi || ''}</td>
                                <td>${client.battery || ''}</td>
                                <td>${client.lng || ''}</td>
                                <td>${client.lat || ''}</td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        console.error('Clients data is not in expected format:', clients);
                    }
                })
                .catch(function (error) {
                    console.error('Error fetching clients data:', error);
                });
        }

        // Fetch data initially
        fetchClientsData();

        // Set interval to refresh data every 10 seconds (10000 milliseconds)
        setInterval(fetchClientsData, 10000);
    </script>
@endsection

