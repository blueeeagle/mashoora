<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">City</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Master</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"><a href="{{ route('master.city.index') }}" class="text-muted text-hover-primary">City</a></li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">Edit City</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-body pt-0">
                        <form action="{{ route('master.city.update',$city->id) }}" method="POST" id="formEdit">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                    <div class="mb-10">
                                        <label for="" class="form-label">Country<span class="text-danger">*</span></label>
                                        <select class="form-select" name="country_id" id="country_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($countrys as $country)
                                                <option {{ ($city->country_id ==  $country->id)?'selected':'' }} value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-10">
                                        <label for="" class="form-label">State<span class="text-danger">*</span></label>
                                        <select class="form-select" name="state_id" id="state_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($state as $country)
                                                <option {{ ($city->state_id ==  $country->id)?'selected':'' }} value="{{$country->id}}">{{$country->state_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-10">
                                        <label for="" class="form-label">City name<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $city->city_name }}" name="city_name" class="form-control " placeholder="City name"/>
                                    </div>
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        $(document).ready(function () {

        var state = $("#state_id")
        $("#country_id").on('select2:select', function (e) {
                var data = e.params.data;
                $.ajax({
                    url:"{{route('master.country.getState')}}",
                    method:"POST",
                    data:{id:data.id,"_token": "{{ csrf_token() }}",},
                    success:function(data){
                        var option = null
                        if(data.states.length != null){
                            data.states.forEach((e)=>{
                                option += '<option value='+e.id+'>'+e.state_name+'</option>';
                            })
                        }
                        state.html(option).trigger("change");
                    }
                })
            })
        })
    </script>
    @endsection
</x-base-layout>
