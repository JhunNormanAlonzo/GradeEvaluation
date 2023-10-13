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
            <h1 class="h3 mb-0 text-gray-800">Year level</h1>
            <a href="{{route('admin.year-level.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Create
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Year Level Lists</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($year_levels as $year_level)
                                    <tr>
                                        <td>{{$year_level->name}}</td>
                                        <td>
                                            <a href="{{route('admin.year-level.edit', [$year_level->id])}}" class="btn btn-warning btn-sm" >Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.year-level.destroy', $year_level->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
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
