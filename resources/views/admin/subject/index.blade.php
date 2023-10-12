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
            <h1 class="h3 mb-0 text-gray-800">Subject</h1>
            <a href="{{route('admin.subject.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Create
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Subject Lists</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{$subject->subject_code}}</td>
                                        <td>{{$subject->description}}</td>
                                        <td>{{$subject->unit}}</td>

                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <button data-toggle="modal" data-target="#modal{{$subject->id}}" class="btn btn-info btn-sm" >Prereq</button>
                                                <a href="{{route('admin.subject.edit', [$subject->id])}}" class="btn btn-warning btn-sm" >Edit</a>
                                                <a href="{{ route('admin.subject.destroy', $subject->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                                            </div>
                                            <form action="{{route('admin.subject.prerequisite.store')}}" method="POST">
                                                @csrf
                                                @method("POST")
                                                <div class="modal fade" id="modal{{$subject->id}}">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Prerequisite for {{$subject->subject_code}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="row">
                                                                @foreach ($subjects as $prereq)
                                                                    @if ($subject->id != $prereq->id)
                                                                        <div class="col-2">

                                                                            @php
                                                                                $prereqIds = $subject->prerequisites->pluck('id')->toArray();
                                                                            @endphp
                                                                            <input type="text" hidden name="subject_id" id="" value="{{$subject->id}}">
                                                                            <input type="checkbox" name="prereq[]" value="{{$prereq->id}}" @if (in_array($prereq->id, $prereqIds)) checked @endif>
                                                                        </div>
                                                                        <div class="col-10">

                                                                            <small>{{$prereq->subject_code. " - ". $prereq->description}}</small>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                <button  class="btn btn-primary btn-sm">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

    @endsection
</x-master-layout>
z
