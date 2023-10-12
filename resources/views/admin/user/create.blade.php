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
            <h1 class="h3 mb-0 text-gray-800">Create User</h1>
            <a href="{{route('admin.user.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i>
                View All
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
                    </div>
                    <div class="card-body">
                       <form action="{{route('admin.user.store')}}" method="POST">
                        @csrf
                        @method('POST')
                            <div class="row">
                                <div class="col-4 mb-sm-3">
                                    <x-input name="name" ph="Name"></x-input>
                                    <x-validation name="name"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <x-input name="email" ph="Email"></x-input>
                                    <x-validation name="email"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <x-input type="password" name="password" ph="Password"></x-input>
                                    <x-validation name="password"></x-validation>
                                </div>

                                <div class="col-4 mb-sm-3">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="" selected>-- Select --</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                      </select>
                                      <x-validation name="role"></x-validation>
                                </div>

                                <div class="col-12 mb-sm-3">
                                    <button class="btn btn-primary">Save</button>
                                </div>

                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-master-layout>
