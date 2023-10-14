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
            <h1 class="h3 mb-0 text-gray-800">Edit Teacher</h1>
            <a href="{{route('admin.teacher.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i>
                View All
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Teacher</h6>
                    </div>
                    <div class="card-body">
                       <form action="{{route('admin.teacher.update', [$teacher->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-4 mb-sm-3">
                                    <label for="section_id">Section</label>
                                    <x-select2 name="section_id">
                                        @foreach ($sections as $section)
                                            <option @if($teacher->section_id == $section->id) selected @endif value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </x-select2>
                                    <x-validation name="section_id"></x-validation>
                                </div>
                                <div class="col-12"></div>

                                <div class="col-4 mb-sm-3">
                                    <x-input name="name" ph="Name" value="{{$teacher->user->name}}"></x-input>
                                    <x-validation name="name"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <x-input name="email" ph="Email" value="{{$teacher->user->email}}"></x-input>
                                    <x-validation name="email"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <x-input type="text" name="id_number" ph="ID Number" value="{{$teacher->id_number}}"></x-input>
                                    <x-validation name="id_number"></x-validation>
                                </div>
                                <div class="col-12 mb-sm-3">
                                    <textarea name="address" class="form-control" id="" rows="2" placeholder="Complete Address">{{$teacher->address}}</textarea>
                                    <x-validation name="address"></x-validation>
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
