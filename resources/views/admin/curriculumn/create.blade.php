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
            <h1 class="h3 mb-0 text-gray-800">Set Curriculumn</h1>
            <a href="{{route('admin.curriculumn.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i>
                View All
            </a>
        @endsection


        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Semester</h6>
                    </div>
                    <div class="card-body">
                       <form action="{{route('admin.curriculumn.store')}}" method="POST">
                        @csrf
                        @method('POST')
                            <div class="row">
                                <div class="col-6 mb-sm-3">
                                    <label for="">Semester</label>
                                    <select name="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                                        <option value="" selected>-- Select --</option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                                        @endforeach
                                      </select>
                                    <x-validation name="semester_id"></x-validation>

                                </div>
                                <div class="col-6 mb-sm-3">
                                    <label for="">YearLevel</label>
                                    <select name="year_level_id" class="form-control @error('year_level_id') is-invalid @enderror">
                                        <option value="" selected>-- Select --</option>
                                        @foreach ($year_levels as $year_level)
                                            <option value="{{$year_level->id}}">{{$year_level->name}}</option>
                                        @endforeach
                                      </select>
                                    <x-validation name="year_level_id"></x-validation>
                                </div>
                                <div class="col-12 ">
                                    <div class="text-danger">
                                        @error('subject_id')
                                            Select at least one subject
                                        @enderror
                                    </div>
                                    <div class="row">
                                        @foreach ($subjects as $subject)
                                            <div class="col-lg-3 col-sm-6 col-12 rounded pt-2" onmouseover="changeBackground(this)" onmouseout="removeBackground(this)">
                                                <div class="row px-5">
                                                    <div class="col-6">
                                                        <input type="checkbox" name="subject_id[]" id="subject_{{$subject->id}}" value="{{$subject->id}}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label style="user-select: none;" for="subject_{{$subject->id}}">{{$subject->subject_code}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>


                                <div class="col-12 mb-sm-3 my-3">
                                    <button class="btn btn-primary">Save</button>
                                </div>

                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
    <script>
        function changeBackground(element) {
          element.style.backgroundColor = 'lightblue'; // Change the background color to light blue
        }

        function removeBackground(element) {
          element.style.backgroundColor = ''; // Change the background color to light blue
        }
      </script>
    @endpush
</x-master-layout>
