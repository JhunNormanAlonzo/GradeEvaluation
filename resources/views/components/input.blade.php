@props([
    'type' => 'text',
    'name' => '',
    'ph' => '',
    'value' => ''

])


<label for="{{$name}}">{{$ph}}</label>
<input type="{{$type}}" name="{{$name}}" value="{{$value}}" class="form-control @error($name) is-invalid @enderror form-control-user" id="{{$name}}" placeholder="{{$ph}}">
