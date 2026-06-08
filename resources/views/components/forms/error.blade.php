@props([
    'name' => 'required',
])
@error($name)
    <p class="text-red-500">{{ $message }}</p>
@enderror
