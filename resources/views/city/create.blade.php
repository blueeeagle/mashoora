<x-base-layout>
    <div class="row col-10 gy-12 gx-xl-12">
        <div class="card card-docs flex-row-fluid mb-2">
            <form action="{{ route('master.city.store') }}" method="post" id="formCreate">
                @csrf
                <div class="py-5">
                    <div class="rounded border p-10">
                        <div class="mb-10">
                            <label for="" class="form-label">Country<span class="text-danger">*</span></label>
                            <select class="form-select" name="countryName" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @foreach($countrys as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">State<span class="text-danger">*</span></label>
                            <select class="form-select" name="stateName" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @foreach($data as $country)
                                    <option value="{{$country->id}}">{{$country->state_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">City name<span class="text-danger">*</span></label>
                            <input type="text" name="cityName" class="form-control " placeholder="City name"/>
                        </div>
                        <div class="fv-row mb-10">
                            {{-- <label class="required fw-bold fs-6 mb-5"></label> --}}
                            <div class="form-check form-check-custom form-check-solid mb-5">
                                <!--begin::Input-->
                                <input class="form-check-input me-3" name="status" type="checkbox" value="1" id="status" />
                                <!--end::Input-->

                                <!--begin::Label-->
                                <label class="form-check-label" for="status">
                                    <div class="fw-bolder text-gray-800">Status</div>
                                </label>
                                <!--end::Label-->
                            </div>
                        </div>
                        <div class="mb-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-base-layout>
