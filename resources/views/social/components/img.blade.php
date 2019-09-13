@if (isset($img) && trim($img) != '')
    <img src="{{ Storage::url($img) }}" alt="" class="{{ isset($class)?$class:'' }}">
@else
    <img src="/default.jpg" alt="" class="{{ isset($class)?$class:'' }}">
@endif