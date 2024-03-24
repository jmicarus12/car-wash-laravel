@extends('frontend.layouts.auth')

@section('title', __('Bookings'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Bookings')

                        <x-slot name="headerActions">
                            <x-utils.link
                                class="card-header-action"
                                :href="route('frontend.bookings.index')"
                                :text="__('Go Back')"
                            />
                        </x-slot>
                    </x-slot>

                    <x-slot name="body">
                        @if (auth()->user()->cars)
                            <div class="row">
                                @forelse ($stores as $store)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="{{ $store->avatar }}" class="card-img-top" alt="Store Avatar">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $store->store_name }}</h5>
                                                <p class="card-text">Location: {{ $store->address }}</p>
                                                <a href="#" class="btn btn-primary create-booking" data-storeid="{{ $store->id }}">Create Booking</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeat the above card structure with more data -->
                                @empty
                                    No store available.
                                @endforelse
                            </div>
                        @else
                            Please add your unit first before creating a booking. <br>
                            <a href="{{ route('frontend.cars.create') }}" rel="noopener noreferrer">Click here to add</a>
                        @endif
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h2 id="storeName">Store Name</h2> <!-- Assuming $storeName contains the store name -->
                        <form method="POST" action="{{ route('frontend.bookings.store') }}">
                            @csrf
                    
                            <!-- Store Service -->
                            <div class="form-group">
                                <label for="store_service">Select Store Service:</label>
                                <select class="form-control" id="store_service" name="car_wash_service_id" required>
                                </select>
                            </div>
                    
                            <!-- Car Selection -->
                            <div class="form-group">
                                <label for="car">Select Car:</label>
                                <select class="form-control" id="car" name="user_car_id" required>
                                    <option value="">Select Car</option>
                                    
                                    @foreach (auth()->user()->cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->car_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );

            $('.create-booking').click(function() {
                var storeId = $(this).data("storeid");
                collectServices(storeId);
                $('#exampleModal').modal('show');
            });

            function collectServices(storeId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('frontend.bookings.ajax-store-services') }}",
                    data: {
                        store_id: storeId,
                    },
                    beforeSend: function () {
                        
                    },
                    success: function (res) {
                        console.log(res);
                        $('#storeName').html(res.store.store_name);

                        var $el = $("#store_service");
                        $el.empty(); // remove old options
                        // Add Place Holder
                        $el.append($("<option></option>")
                            .attr("value", '').text('Select Service'));

                        $.each(res.services, function(index, service) {
                        $el.append($("<option></option>")
                            .attr("value", service.id).text(service.service_name));
                        });
                    }
                });
            }
        });
    </script>
@endpush
