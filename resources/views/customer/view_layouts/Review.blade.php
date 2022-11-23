<div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

            <div class="row gy-10 gx-xl-10">
                <div class="card card-docs flex-row-fluid mb-2">
                    <table id="kt_datatable8" class="table table-row-bordered gy-5">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">

                                <th>Date and Time</th>
                                <th>Booking ID</th>
                                <th>Appointment Booked By</th>
                                <th>Appointment Booked with</th>
                                <th>Amount</th>
                                <th>Rating</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultant->reviewForView as $review)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($review->created_at)) ??''}}</td>
                                <td></td>
                                <td>{{ $review->customer->name ??''}} <br> {{ $review->customer->email}}</td>
                                <td>{{ $consultant->name ??''}} <br> {{ $consultant->email}}</td>
                                <td>{{ $review->amount ??''}}</td>
                                <td>{{ $review->rating ??''}}</td>
                                <td>{{ $review->comments ??''}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
