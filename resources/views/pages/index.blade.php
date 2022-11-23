<x-base-layout>
    @if (\Session::has('errors'))
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>{!! \Session::get('errors') !!}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <!--begin::Row-->
   <center> <h2 style="margin-top: 50px">Coming Soon</h2></center>

</x-base-layout>
