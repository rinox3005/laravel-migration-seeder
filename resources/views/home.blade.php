@extends("layouts.base-layout")

@section("main")
    <img
        src="{{ Vite::asset("resources/img/train-home.jpg") }}"
        class="d-block w-100"
        alt="Train 1"
    />

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="card p-3">
                    <h3>Book Tickets</h3>
                    <p>
                        Book your tickets conveniently online and enjoy a
                        hassle-free journey.
                    </p>
                    <a href="#" class="btn btn-danger">Book Now</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card p-3">
                    <h3>Train Schedules</h3>
                    <p>
                        Check the latest train schedules and plan your trip
                        accordingly.
                    </p>
                    <a href="/trains" class="btn btn-danger">View Schedule</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card p-3">
                    <h3>Contact Us</h3>
                    <p>
                        Have questions or need assistance? Contact our support
                        team.
                    </p>
                    <a href="#" class="btn btn-danger">Get in Touch</a>
                </div>
            </div>
        </div>
    </div>
@endsection
