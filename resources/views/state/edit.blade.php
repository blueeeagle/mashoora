<x-base-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">State</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('master.state.index') }}" class="text-muted text-hover-primary">State</a></li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">Edit State</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-body pt-0">
                        <form action="{{ route('master.state.update',$state->id) }}" method="POST" id="formEdit">
                            @csrf
                            <div class="py-5">
                                <div class="rounded border p-10">
                                    <div class="mb-10">
                                        <label for="" class="form-label">Country<span class="text-danger">*</span></label>
                                        <select class="form-select" name="country_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($data as $country)
                                                <option {{ ($state->country_id ==  $country->id)?'selected':'' }} value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-10">
                                        <label for="" class="form-label">State name<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $state->state_name }}" name="state_name" class="form-control " placeholder="State name"/>
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
</x-base-layout>
