<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">

    <input type="hidden" name="" id="trigerClick">
    <div id="kt_content_container" class="container-xxl">
        <div class="row gy-10 gx-xl-10">
            <div class="card card-docs flex-row-fluid mb-2">
                <table id="kt_datatable" class="table table-row-bordered gy-5">
                    <thead>
                        <tr class="fw-bold fs-6 text-muted">
                            <th>SNo</th>
                            <th>Create Date</th>
                            <th>schedule From - To</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SNo</th>
                            <th>Create Date</th>
                            <th>schedule From - To</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h2 class="card-title fw-bolder">Calendar</h2>
                <div class="card-toolbar">
                    <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Add Event</button>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="kt_calendar_app"></div>
                <!--end::Calendar-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modals-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_add_event" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <form class="form" action="{{ route('activities.schedules.store') }}" id="kt_modal_add_event_form">
                        @csrf
                        <div class="modal-header">
                            <h2 class="fw-bolder" data-kt-calendar="title">Add Event</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event_close">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body py-10 px-lg-17">
                            <div class="fv-row mb-5">
                                <label class="required form-label fs-6 mb-2" >Scheduling Type</label>
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <input class="form-check-input me-3" name="schedule_type" type="radio" value="0" checked id="standard" />
                                    <label class="form-check-label" for="standard">
                                        <div class="fw-bolder text-gray-800">Standard </div>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <input class="form-check-input me-3" name="schedule_type" type="radio" value="1" id="Variant" />
                                    <label class="form-check-label" for="Variant">
                                        <div class="fw-bolder text-gray-800">Flexi or Variant</div>
                                    </label>
                                </div>
                            </div>
                            <div class="fv-row mb-9" hidden>
                                <label class="fs-6 fw-bold required mb-2">Event Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_name" />
                            </div>
                            <div class="fv-row mb-9" hidden>
                                <label class="fs-6 fw-bold mb-2">Event Location</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_location" />
                            </div>
                            <div class="fv-row mb-9" hidden>
                                <label class="fs-6 fw-bold mb-2">Event Description</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                            </div>
                            <div class="fv-row mb-9 d-none">
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="kt_calendar_datepicker_allday" />
                                    <span class="form-check-label fw-bold" for="kt_calendar_datepicker_allday">All Day</span>
                                </label>
                            </div>
                            <div class="fv-row mb-9" data-standard>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label class="form-label">From</label>
                                        <div class="input-group mb-3">
                                            <input name="from_date" id="from_date" class="form-control form-control-solid" placeholder="" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">To</label>
                                        <div class="input-group mb-3">
                                            <input name="to_date" id="to_date" class="form-control form-control-solid" placeholder="" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-sm btn-light-primary" id="create_Slot" type="button">
                                            <i class="la la-plus"></i> Create Slot
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="fv-row mb-9" data-Variant>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label class="form-label">Recurring Till</label>
                                        <div class="input-group mb-3">
                                            <input name="recurring" id="recurring" class="form-control form-control-solid" placeholder="" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded border p-10">
                                <div class="mb-10">
                                    <div class="kt_docs_repeater_nested">
                                        <div class="form-group">
                                            <div data-repeater-list="kt_docs_repeater_nested_outer">
                                                <div data-repeater-item>
                                                    <div class="form-group row mb-5 form-parent">
                                                        <div class="col-lg-2">
                                                            <label data-repeater-title class="form-label">Sunday</label>
                                                            <div class='form-check form-switch form-check-custom form-check-solid'>
                                                                <input class='form-check-input checkboxOnOff' name="day" type='checkbox' value='' />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="inner-repeater">
                                                                <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                                                    <div data-repeater-item>
                                                                        <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                        <label class="form-label">From :</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="time" name="from" class="form-control" placeholder="Enter contact number" required />
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label class="form-label">To :</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="time" name="to" class="form-control" placeholder="Enter contact number" required />
                                                                            <button class="border border-secondary btn btn-icon btn-light-danger" data-repeater-delete type="button">
                                                                                <i class="la la-trash-o fs-3"></i>
                                                                            </button>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                                        <input class="form-check-input" type="checkbox" value="1" id="Video" name="video" />
                                                                                        <label class="form-check-label" for="Video" >
                                                                                            Video
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                                        <input class="form-check-input" type="checkbox" value="1" id="Voice" name="voice" />
                                                                                        <label class="form-check-label" for="Voice" >
                                                                                            Voice
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                                        <input class="form-check-input" type="checkbox" value="1" id="Text" name="text" />
                                                                                        <label class="form-check-label" for="Text" >
                                                                                            Text
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                                        <input class="form-check-input" type="checkbox" value="1" id="Direct" name="direct" />
                                                                                        <label class="form-check-label" for="Direct" >
                                                                                            Direct
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-sm btn-light-primary" data-repeater-create type="button">
                                                                    <i class="la la-plus"></i> Add Number
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-lg-2 g-10 d-none">
                                <div class="col">
                                    <div class="fv-row mb-9">
                                        <label class="fs-6 fw-bold mb-2 required">Event Start Date</label>
                                        <input class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Pick a start date" id="kt_calendar_datepicker_start_date" />
                                    </div>
                                </div>
                                <div class="col" data-kt-calendar="datepicker">
                                    <div class="fv-row mb-9">
                                        <label class="fs-6 fw-bold mb-2">Event Start Time</label>
                                        <input class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Pick a start time" id="kt_calendar_datepicker_start_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-lg-2 g-10 d-none">
                                <div class="col">
                                    <div class="fv-row mb-9">
                                        <label class="fs-6 fw-bold mb-2 required">Event End Date</label>
                                        <input class="form-control form-control-solid" name="calendar_event_end_date" placeholder="Pick a end date" id="kt_calendar_datepicker_end_date" />
                                    </div>
                                </div>
                                <div class="col" data-kt-calendar="datepicker">
                                    <div class="fv-row mb-9">
                                        <label class="fs-6 fw-bold mb-2">Event End Time</label>
                                        <input class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Pick a end time" id="kt_calendar_datepicker_end_time" />
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Modal body-->
                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_modal_add_event_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Modal - New Product-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_view_event" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header border-0 justify-content-end">
                        <!--begin::Edit-->
                        <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit Event" id="kt_modal_view_event_edit">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Edit-->
                        <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Delete Event" id="kt_modal_view_event_delete">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary" data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body pt-0 pb-20 px-lg-17">
                        <!--begin::Row-->
                        <div class="d-flex">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <div class="mb-9">
                                <!--begin::Event name-->
                                <div class="d-flex align-items-center mb-2">
                                    <span class="fs-3 fw-bolder me-3" data-kt-calendar="event_name"></span>
                                    <span class="badge badge-light-success" data-kt-calendar="all_day"></span>
                                </div>
                                <!--end::Event name-->
                                <!--begin::Event description-->
                                <div class="fs-6" data-kt-calendar="event_description"></div>
                                <!--end::Event description-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <circle fill="currentColor" cx="12" cy="12" r="8" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Event start date/time-->
                            <div class="fs-6">
                                <span class="fw-bolder">Starts</span>
                                <span data-kt-calendar="event_start_date"></span>
                            </div>
                            <!--end::Event start date/time-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="d-flex align-items-center mb-9">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <circle fill="currentColor" cx="12" cy="12" r="8" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Event end date/time-->
                            <div class="fs-6">
                                <span class="fw-bolder">Ends</span>
                                <span data-kt-calendar="event_end_date"></span>
                            </div>
                            <!--end::Event end date/time-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                    <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Event location-->
                            <div class="fs-6" data-kt-calendar="event_location"></div>
                            <!--end::Event location-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Modal body-->
                </div>
            </div>
        </div>
        <!--end::Modal - New Product-->
        <!--end::Modals-->
    </div>

</div>
