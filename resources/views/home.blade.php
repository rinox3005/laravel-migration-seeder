<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Trains</title>
        @vite("resources/js/app.js")
    </head>

    <body>
        <main>
            <section class="container my-5">
                <h1 class="display-4 fw-bold text-light mb-5 text-center">
                    Trains Departing Today
                </h1>
                <div class="row g-4 justify-content-center">
                    @foreach ($trains as $train)
                        <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                            <div class="card h-100">
                                <img
                                    class="logo"
                                    src="{{ Vite::asset("resources/img/" . $train["company"] . ".png") }}"
                                    alt="{{ $train["company"] }}"
                                />

                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $train["company"] }}
                                        {{ $train["train_code"] }}

                                        @if ($train["is_ontime"])
                                            <img
                                                class="status"
                                                src="{{ Vite::asset("resources/img/ontime.png") }}"
                                                alt="on-time"
                                            />
                                        @else
                                            <img
                                                class="status"
                                                src="{{ Vite::asset("resources/img/delayed.png") }}"
                                                alt="delayed"
                                            />
                                        @endif
                                    </h5>
                                    <h6>
                                        D: {{ $train["departure_station"] }} -
                                        {{ \Illuminate\Support\Carbon::parse($train["departure_date"])->format("d/m/Y") }}
                                        - {{ $train["departure_time"] }}
                                    </h6>
                                    <h6>
                                        A: {{ $train["arrival_station"] }} -
                                        {{ \Illuminate\Support\Carbon::parse($train["arrival_date"])->format("d/m/Y") }}
                                        -
                                        {{ $train["arrival_time"] }}
                                    </h6>
                                    {{--
                                        <h6>
                                        T/C: {{ $train["carriage_number"] }}
                                        </h6>
                                    --}}
                                    <button class="btn btn-danger">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </body>
</html>
