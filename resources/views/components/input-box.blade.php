@props(['pattern' => ''])
<div class="w-full">
    <label for="{{$name}}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$label . ' '}}
        @if ($required)
        <span class="text-red-500"> *</span>
    @endif
    </label>
    <input type="text" name="{{$name}}" id="{{$name}}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Enter {{$label}}" @if ($pattern) pattern="{{$pattern }}" @endif {{$required ? 'required' : ''}} value="{{old($name) ? old($name) : ($value ? $value : '') }}">
        {{$slot}}
    @error($name)
    <span>{{$message}}</span>
    @enderror
</div>
