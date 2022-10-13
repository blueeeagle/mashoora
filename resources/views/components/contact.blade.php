                                <!--<hr>
                                <h4 class="com-head">Contact</h4>
                                <hr>-->
                                <div class="rounded border p-10">
                                    <div class="fv-row mb-10">
                                        <div id="kt_docs_repeater_basic">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_basic">
                                                    <div data-repeater-item>
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label class="required form-label fs-6 mb-4 mt-4">Name:</label>
                                                                <input type="text" name="cname" data-cname class="form-control mb-2 mb-md-0" placeholder="name" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class=" required form-label fs-6 mb-4 mt-4">Title</label>
                                                                <input type="text" name="ctitle" data-ctitle class="form-control mb-2 mb-md-0" placeholder="Title" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="required form-label fs-6 mb-4 mt-4">Email</label>
                                                                <input type="email" name="cemail" data-cemail class="form-control mb-2 mb-md-0" placeholder="Email" />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="required form-label fs-6 mb-4 mt-4">Mobile</label>
                                                                <input type="tel" name="cmobile" data-cmobile class="form-control mb-2 mb-md-0" placeholder="Mobile" required/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="required form-label fs-6 mb-4 mt-4">Phone</label>
                                                                <input type="tel" name="cphone" data-cphone class="form-control mb-2 mb-md-0" placeholder="Phone" required/>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                    <i class="la la-trash-o"></i>Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                    <i class="la la-plus"></i>Add
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @section('scripts')
                                @parent
                                <script>
var Contact = $('#kt_docs_repeater_basic');

    Contact.repeater({
        initEmpty: false,
        defaultValues: {
            'cphone':''
        },

        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
    @if(isset($contact)) Contact.setList(@json($contact)) @endif
</script>

@endsection
