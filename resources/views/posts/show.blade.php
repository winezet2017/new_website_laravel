<x-app-layout>

    {{-- <h1>{{ $post->user->name }}</h1>
    <h1>{{ $post->created_at }}</h1>
    <h1>{{ $post->title }}</h1>
    <h1>{{ $post->description }}</h1>
    <h1>{{ $post->user->info }}</h1> --}}
    <div class="px-20 py-10 text-white bg-gray-800">
        <div class="">
            <div class="flex items-center gap-3">

                <a class="text-red-600 underline">{{ $post->user->name }} </a>
                <p> / {{ $post->created_at->format('M/d/Y') }}</p>
            </div>
            <h1 class="mt-5 text-7xl font-black my-text"> {{ $post->title }}</h1>

        </div>
        <div class="grid md:grid-cols-4 min-h-screen ">
            <div class="col-span-3 w-full mt-5">
                <p>{{ Str::limit($post->description, 50) }}</p>
                <hr class="mr-10 mt-10 ">

            </div>
            <div class="col-span-1">
                <img src="{{ asset('storage/' . $post->user->photo) }}" class="rounded " alt="#ok" width="500">
                <p class="text-lg my-5"> About Author</p>
                <h1>{{ $post->user->info }}</h1>

            </div>
        </div>


    </div>

</x-app-layout>
