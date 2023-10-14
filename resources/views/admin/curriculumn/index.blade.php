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
            <h1 class="h3 mb-0 text-gray-800">Curriculumn</h1>
            <a href="{{route('admin.curriculumn.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Set Curriculumn
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Curriculumn Lists</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Semester</th>
                                        <th>Year Level</th>
                                        <th>Subjects</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($curriculumns as $curriculumn)
                                    <tr>
                                        <td>{{$curriculumn->semester->name}}</td>
                                        <td>{{$curriculumn->yearLevel->name}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#showSubject{{$curriculumn->id}}" class="badge btn btn-success">subjects</button>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.curriculumn.destroy', $curriculumn->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($curriculumns as $curriculumn)
            <div class="modal fade" id="showSubject{{$curriculumn->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Subjects
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($curriculumn->subjects as $sub)
                                    <div class="col-4 ">
                                        <button data-toggle="modal" data-target="#prereq{{$sub->id}}" class="badge btn btn-info">PREREQ</button>
                                        {{$sub->subject_code}}

                                        <div class="modal" id="prereq{{$sub->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Prerequisites
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Subject Code</th>
                                                                    <th>Description</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($sub->prerequisites as $prereq)
                                                                    <tr>
                                                                        <td>{{$prereq->subject_code}}</td>
                                                                        <td>{{$prereq->description}}</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="2" class="text-center">No prerequisites available.</td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 ">{{$sub->description}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection


</x-master-layout>
