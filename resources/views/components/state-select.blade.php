<div class="w-full ">

    <label for="state_id"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State
    @if ($required)
        <span class="text-red-500"> *</span>
    @endif
    </label>
    <select id="state_id" name="state_id" {{$required ? 'required' :''}}
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        <option selected>Choose a State</option>
        @foreach ($options as $item)
            <option value="{{ $item->id }}" {{ $value === $item->id ? 'selected' : '' }}>{{ $item->name }}
            </option>
        @endforeach
    </select>
</div>
