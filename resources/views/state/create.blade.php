<x-base-layout>
    <div class="row col-10 gy-12 gx-xl-12">
        <div class="card card-docs flex-row-fluid mb-2">
            <form action="{{ route('master.state.store') }}" method="post" id="formCreate">
                @csrf
                <div class="py-5">
                    <div class="rounded border p-10">
                        <div class="mb-10">
                            <label for="" class="form-label">Country<span class="text-danger">*</span></label>
                            <select class="form-select" name="countryName" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @foreach($data as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">State name<span class="text-danger">*</span></label>
                            <input type="text" name="stateName" class="form-control " placeholder="State name"/>
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
