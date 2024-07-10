@extends("layouts.base-layout")

@section("main")
    <section class="container my-5">
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
                            <a
                                href="{{ route("train-details", $train->id) }}"
                                class="btn btn-danger mt-2"
                            >
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
