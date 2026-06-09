@props([
    'name' => 'required',
])
@error($name)
    <p class="text-error">{{ $message }}</p>
@enderror
