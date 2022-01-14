<x-layout>
    <h1 class="py-4 font-bold">Create a Post</h1>

    <form method="POST"
          action="/posts"
          x-data
          @submit.prevent="$dispatch('recaptcha')"
    >
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Title
            </label>
            <input type="text" class="border border-gray-400 p-2 w-full"
                   name="title"
                   id="title"
            >
            @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Body
            </label>
            <textarea class="border border-gray-400 p-2 w-full"
                      name="body"
                      id="body"
            ></textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <x-recaptcha/>
        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit
            </button>
        </div>

        <ul>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </ul>
    </form>
</x-layout>
