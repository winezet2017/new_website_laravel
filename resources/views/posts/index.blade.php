<x-app-layout>
    <div class="my-4 text-center px-20">
        {{ $posts->links() }}
    </div>
    @foreach ($posts as $post)
        {{-- @php
            $num = $posts->firstItem() + $loop->index;
        @endphp --}}
        <div class=" bg-gray-200 mx-10 mb-10 shadow-lg">
            <div class="flex justify-end gap-3 p-5 w-full ">
                @if (Auth::check() && Auth::user()->id == $post->user_id)
                    <a class="p-2 bg-gray-300 shadow-lg rounded items-center hover:text-blue-500"
                        href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="p-2  bg-gray-300 shadow-lg rounded items-center hover:text-red-500"
                            type="submit">Delete</button>
                    </form>
                @endif
            </div>
            <div class="flex gap-5 px-20 py-10 rounded m-30 justify-center items-center ">

                {{-- <span class="">{{ $num }}</span> --}}
                <div class="">

                    @if ($post->photo)
                        <img src="{{ asset('storage/' . $post->photo) }}"
                            class="rounded w-64 h-40 object-cover object-center" alt="Post Photo">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3qcfDI8z36AkniszDbj8wWMyS4nmkBB66PA&s"
                            class="rounded w-64 h-40 object-cover object-center" alt="Dummy Photo">
                    @endif

                </div>
                <div class="w-full ">
                    <div class=" flex-1 p-10 rounded shadow bg-white w-full">
                        <a href="{{ route('users.show', $post->user->id) }}"
                            class="text-red-700 bold">{{ $post->user->name }}</a>
                        <h1 class="text-3xl">{{ $post->title }}</h1>
                        <p class="flex justify-between w-full">
                            {{ $post->created_at->format('d-m-Y') }}<span
                                class="underline">{{ $post->category->name }}</span>
                        <p>
                    </div>
                </div>
            </div>
            <div class="px-20 py-10 w-full overflow-hidden">
                <p class="w-auto">{{ Str::limit($post->description, 50) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="text-xl text-blue-600 block mt-3">Read
                    More..</a>
            </div>
        </div>
    @endforeach
</x-app-layout>
