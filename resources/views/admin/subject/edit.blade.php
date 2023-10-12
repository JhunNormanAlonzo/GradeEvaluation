<x-master-layout>
    @push('styles')
        <link href="{{asset('Template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @endpush
    @push('scripts')
        <script src="{{asset('Template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('Template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('Template/js/demo/datatables-demo.js')}}"></script>
    @endpush
    @section('content')
        @section('title')
            <h1 class="h3 mb-0 text-gray-800">Create Subject</h1>
            <a href="{{route('admin.subject.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i>
                View All
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Subject</h6>
                    </div>
                    <div class="card-body">
                       <form action="{{route('admin.subject.update', [$subject->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-4 mb-sm-3">
                                    <x-input name="subject_code" ph="Subject Code" value="{{$subject->subject_code}}"></x-input>
                                    <x-validation name="subject_code"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <x-input name="description" ph="Description" value="{{$subject->description}}"></x-input>
                                    <x-validation name="description"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <x-input name="unit" ph="Unit" value="{{$subject->unit}}"></x-input>
                                    <x-validation name="unit"></x-validation>
                                </div>



                                <div class="col-12 mb-sm-3">
                                    <button class="btn btn-primary">Update</button>
                                </div>

                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-master-layout>
