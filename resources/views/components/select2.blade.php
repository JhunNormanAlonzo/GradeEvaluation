@props(['name' => ''])
<select class="select2 form-control form-control-lg  @error($name) is-invalid @enderror"" name="{{$name}}" >
    <option value="" disabled selected>-- Select --</option>
    {{$slot}}
</select>
