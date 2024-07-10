@extends("layouts.base-layout")

@section("main")
    <div class="container mt-4">
        <h1 class="text-light mb-4">Train Details</h1>
        <div class="card mb-5">
            <div class="card-header">
                <h2>{{ $train["train_code"] }} - {{ $train["company"] }}</h2>
            </div>
            <div class="card-body">
                <table class="table-striped table">
                    <tbody>
                        <tr>
                            <th scope="row">Train Code</th>
                            <td>{{ $train["train_code"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Company</th>
                            <td>{{ $train["company"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Departure Station</th>
                            <td>{{ $train["departure_station"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Arrival Station</th>
                            <td>{{ $train["arrival_station"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Departure Date</th>
                            <td>{{ $train["departure_date"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Departure Time</th>
                            <td>{{ $train["departure_time"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Arrival Date</th>
                            <td>{{ $train["arrival_date"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Arrival Time</th>
                            <td>{{ $train["arrival_time"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Travel Time</th>
                            <td>{{ $train["travel_time"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">On Time</th>
                            <td>
                                @if ($train["is_ontime"])
                                    Yes
                                    <img
                                        class="status-detail"
                                        src="{{ Vite::asset("resources/img/ontime.png") }}"
                                        alt="on-time"
                                    />
                                @else
                                    No
                                    <img
                                        class="status-detail"
                                        src="{{ Vite::asset("resources/img/delayed.png") }}"
                                        alt="delayed"
                                    />
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Canceled</th>
                            <td>
                                @if ($train["is_canceled"])
                                    Yes
                                    <img
                                        class="status-detail"
                                        src="{{ Vite::asset("resources/img/canceled.png") }}"
                                        alt="canceled"
                                    />
                                @else
                                        No
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Ticket Price</th>
                            <td>{{ $train["ticket_price"] }} &euro;</td>
                        </tr>
                        <tr>
                            <th scope="row">Train Type</th>
                            <td>{{ $train["train_type"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Carriage Number</th>
                            <td>{{ $train["carriage_number"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Available Seats</th>
                            <td>{{ $train["available_seats"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Service Class</th>
                            <td>{{ $train["service_class"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Conductor Name</th>
                            <td>{{ $train["conductor_name"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ticket Type</th>
                            <td>{{ $train["ticket_type"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Average Speed</th>
                            <td>{{ $train["average_speed"] }} km/h</td>
                        </tr>
                        <tr>
                            <th scope="row">Manufacture Date</th>
                            <td>{{ $train["manufacture_date"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
