<x-base-layout>
    <div class="row col-10 gy-12 gx-xl-12">
        <div class="card card-docs flex-row-fluid mb-2">
            <form action="{{ route('master.city.store') }}" method="post" id="formCreate">
                @csrf
                <div class="py-5">
                    <div class="rounded border p-10">
                        <div class="mb-10">
                            <label for="" class="form-label">Country<span class="text-danger">*</span></label>
                            <select class="form-select" name="countryName" id="country_id" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @foreach($countrys as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">State<span class="text-danger">*</span></label>
                            <select class="form-select" name="stateName" id="state_id" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">City name<span class="text-danger">*</span></label>
                            <input type="text" name="cityName" class="form-control " placeholder="City name"/>
                        </div>
                        <div class="mb-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
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
