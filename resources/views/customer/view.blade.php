<x-base-layout>
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">View Customer</h1>
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">User</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"><a href="{{ route('user.customer.index') }}" class="text-muted text-hover-primary">Customer</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_pane_1" >DashBoad</a> {{--   href="{{ route('consultant.consultant.edit',$consultant->id) }} --}}
                    </li>
                   
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_4">Appointments History</a>
                    </li>
                      <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_5">Offer History</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_7">Wallet & Transaction</a>
                   </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_8">Review & Ratings</a>
                    </li>
                  
                </ul>
                <!--begin::Navs-->
            </div>
        </div>

        

        

        <div class="tab-content" id="myTabContent">
            {{-- Tab 1 --}}
            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/300-1.jpg')}}" alt="image" />
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                </div>
                
                               
                            </div>
                            <div class="col-lg-8">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{!! $customer->name !!}</a>
                                {{-- gender --}}
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">Gender :{!!$customer->gender!!}</span>
                                </div>
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">Address :  {!! nl2br($customer->register_address) !!}</span>  
                                </div>
                                @if(isset($customer->country))
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">Country :  {!! $customer->country->country_name !!}</span>  
                                </div>
                                @endif
                                @if(isset($customer->state))
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">State :  {!! $customer->state->state_name !!}</span>  
                                </div>
                                @endif
                                @if(isset($customer->city))
                                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                    <span class="fw-bolder fs-6">City :  {!! $customer->city->city_name !!}</span>  
                                </div>
                                @endif
                                <div><hr></div>
                                <div class="form-group row">
                                    <div class="col-lg-6 d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                        <span class="fw-bolder">Email :  {!! $customer->email !!}</span> 
                                    </div>
                                    <div class="col-lg-6 d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                        <span class="fw-bolder fs-6">Phone :  {!! $customer->phone_no !!}</span>  
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div><hr></div>

                        <div class="form-group row">
                            <div class="col-sm-12"> 
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="col-sm-3" style="border-right-style: solid; border-width: 1px;">
                                            <div class=" card text-black bg-secondary " style="width: 15rem;">
                                                <div class="card-body">
                                                    <div class="div">
                                                        <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/wallet.png')}}" alt="image" />
                                                        {{ $customer->wallet ? $customer->wallet->balance :0}}
                                                        Wallet Balence in  {{ $companeySetting->country->currency->currencycode }}
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>

                                            <div class="card text-black bg-secondary " style="width: 15rem;">
                                                <div class="card-body">
                                                    <div class="div">
                                                        <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/calendar.png')}}"  alt="image" />
                                                        {{$app_completed ??''}}
                                                        Appointment Completed
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3" style="border-right-style: solid; border-width: 1px;">
                                            <span class="fw-bolder fs-6">Recent Booking</span>
                                          
                                            
                                        </div>

                                        <div class="col-sm-3" >
                                            <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                                <span class="fw-bolder fs-6"> Recent Reviews</span>
                                            </div>
                                            @foreach ($customer->reviews as $review)
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                {{ date('d-m-Y', strtotime($review->created_at)) ??''}}<br/>
                                                                {{ $review->customer->name ??''}} {{ $review->customer->email}}<br>
                                                            </div>
                                                            <div class="col-2">
                                                                <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/star.png')}}"  alt="image" />
                                                                {{ $review->rating ??''}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 @endforeach
                                        </div>
                                    </div>                                       
                                </div>
                                <div><hr></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                <span class="fw-bolder fs-6"> Recent Visited Consultants</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="card">
                                <div class="card-body text-black bg-secondary">
                                    <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                                        <span class="fw-bolder fs-6">{!! $consultant->name!!}</span>
                                        <p class="fs-6">{!! $consultant->phone_no!!}</p>
                                        <p class="fs-6">{!! $consultant->email!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- card body close --}}
                    </div>
                    {{-- card  close --}}
                </div>
                {{-- tab close  --}}
            </div>
            
            {{-- Tab 4  Appointment History --}}


            <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                <div class="d-flex align-items-left w-200px w-sm-300px flex-column mt-3">
                    <span class="fw-bolder fs-6"> Past/Current/Upcoming History</span>
                </div>
           
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable4" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            
                                            <!--<th>Date and Time</th>-->
                                            <th>Booking ID</th>
                                            <th>Appointment Type</th>
                                            <th>Consultant Name</th>
                                            <th>Admin Amount</th>
                                            <th>Consultant Amount</th>
                                            
                                            <th width="10%">Customer Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->appointment as $item)
                                        @php
                                        $Booking = $item->unse();
                                        
                                        $date = date_create($item->appointment_date);
                                        $consultant_data = date_create(date("Y-m-d H:i",strtotime($item->appointment_date) - ($Booking->diff)));
                                        
                                        
                                        //Abmin conversion Date
                                        
                                        
                                        
                                        
                                        
                                        @endphp
                                        <tr>
                                           <!--<td>{{ date_format($date,"M d, Y, l") }}  </br>{{ date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $Booking->consultant->preferre_slot*60); }}</td>-->
                                           <td>BK-{{ $item->id}}</td>
                                           <td>{{ $item->appointment_type ??''}}</td>
                                           <td>{{  $Booking->consultant->name }}</td>
                                           <td>{{ $Booking->Companysetting->country->currency->currencycode }} - {{ $Booking->amount*$Booking->Companysetting->country->currency->price }}</td>
                                           <td>{{ $Booking->consultantcurrency->currencycode }} - {{ ($Booking->amount/$Booking->customercurrnecy->price)*$Booking->consultantcurrency->price }}<br>
                                           {{ date_format($consultant_data,"M d, Y, l") }}  </br>{{ date_format($consultant_data,"h:i a")." - ". date("h:i a",strtotime(date_format($consultant_data,"Y-m-d H:i")) + $Booking->consultant->preferre_slot*60); }}</td>
                                           <td>{{ $Booking->customercurrnecy->currencycode }} - {{ $item->transaction->amount ??''}}<br>
                                           {{ date_format($date,"M d, Y, l") }}  </br>{{ date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $Booking->consultant->preferre_slot*60); }}</td>
                                           <td>{{ $item->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab 5  Offer History --}}
            <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable5" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>Date and Time</th>
                                            <th>Transaction ID</th>
                                            <th>Purchased By</th>
                                            <th>Purchased with</th>
                                            <th>Offer Title</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->offer_history as $offers)
                                        <tr>
                                           <td>{{ date('d-m-Y h:i:s', strtotime($offers->purchase_date))}}</td>
                                           <td></td>
                                           <td>{{ $offers->consultant->name ??''}} <br/> {{ $offers->consultant->email ??''}}</td>
                                           <td>{{ $customer->name ??''}} <br/> {{ $customer->email ??''}}</td>
                                           <td>{{ $offers->offer->offer_title ??''}}</td>
                                           <td>{{ $offers->offer->amount ??''}}</td>
                                           <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              {{-- Tab 7 Wallet --}}
            <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        
                        <div class="row gy-10 gx-xl-10">
                            <div class="card card-docs flex-row-fluid mb-2">
                                <table id="kt_datatable7" class="table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>Date & Time</th>
                                            <!--<th>Type</th>-->
                                            <!--<th>Transaction ID</th>-->
                                            <th>Statement</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($customer->wallet_trans as $trans)
                                        <tr>
                                           <td>{{ date('d-m-Y h:s:i', strtotime($trans->created_at)) ??''}}</td>
                                           <!--<td></td>-->
                                           <!--<td></td>-->
                                           <td>{{ $trans->action ??''}}</td>
                                           <td>{{ $trans->amount ??''}}</td>
                                           <td>{{ ($trans->type == 'add') ?'credit':'debited'}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab 8 Review &Rating--}}
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
                                            <th>Rating</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->reviews as $review)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($review->created_at)) ??''}}</td>
                                            <td></td>
                                            <td>{{ $review->consultant->name ??''}} <br> {{ $review->consultant->email}}</td>
                                            <td>{{ $customer->name ??''}} <br> {{ $customer->email}}</td>
                                            <td> <img src="{{ URL::asset(theme()->getDemo().'/media/avatars/star.png')}}"  alt="image" />{{ $review->rating ??''}}</td>
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
    </div>


    @section('scripts')
<script>

    var table1,table2,table3,table4 = null

    $(document).ready(function () {
        // Scheduling

       

        


    });
</script>

@endsection
</x-base-layout>
