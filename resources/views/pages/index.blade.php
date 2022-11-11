<x-base-layout>
    @if (\Session::has('errors'))
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>{!! \Session::get('errors') !!}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-12">
            {{ theme()->getView('partials/widgets/lists/_widget-2', array('class' => 'card-xl-stretch mb-xl-8', 'chartColor' => 'danger', 'chartHeight' => '200px')) }}
        </div>
       
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 gx-xl-12">
        <div class="col-xxl">
            {{ theme()->getView('partials/widgets/mixed/_widget-1', array('class' => 'card-xl-stretch mb-xl-8', 'chartColor' => 'danger', 'chartHeight' => '200px')) }}
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 gx-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-3', array('class' => 'card-xxl-stretch mb-xl-3')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-8">
            {{ theme()->getView('partials/widgets/tables/_widget-9', array('class' => 'card-xxl-stretch mb-5 mb-xl-8')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-2', array('class' => 'card-xl-stretch mb-xl-8')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-6', array('class' => 'card-xl-stretch mb-xl-8')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-4', array('class' => 'card-xl-stretch mb-5 mb-xl-8', 'items' => '5')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 gx-xxl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-5', array('class' => 'card-xxl-stretch mb-xl-3', 'chartColor' => 'success', 'chartHeight' => '150px')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-8">
            {{ theme()->getView('partials/widgets/tables/_widget-5', array('class' => 'card-xxl-stretch mb-5 mb-xxl-8')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-base-layout>
