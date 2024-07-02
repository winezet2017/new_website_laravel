<x-app-layout>
    <div class="shadow-md bg-white px-8 py-2">

        @foreach ($categories as $item)
            <span
                class="inline-block py-1 m-1 rounded-lg bg-red-100 hover:bg-red-500 hover:text-white p-2 border-2 text-sm">{{ $item->name }}</span>
        @endforeach

    </div>
    <div class="grid md:grid-cols-4 min-h-screen p-10">
        <div class="col-span-3 w-full">
            @foreach ($posts as $post)
                <div class=" bg-gray-200 mx-10 mb-10 shadow-lg">
                    <div class="flex gap-5 px-20 py-10 rounded m-30 justify-center items-center ">
                        <div class="">
                            <img src="https://cdn.akamai.steamstatic.com/apps/dota2/images/dota_react/heroes/social/lion.jpg"
                                class="rounded h-full" alt="#ok" width="500">
                        </div>
                        <div class="w-full ">
                            <div class=" flex-1 p-10 rounded shadow bg-white w-full">
                                <a href="#" class="text-red-700 bold">{{ $post->user->name }}</a>
                                <h1 class="text-3xl">{{ $post->title }}</h1>
                                <p class="flex justify-between w-full">
                                    {{ $post->created_at->format('d-m-Y') }}<span
                                        class="underline">{{ $post->category->name }}</span>
                                <p>
                            </div>
                        </div>
                    </div>
                    <div class="px-20 py-10">
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-span-1">

            <div class="card p-5 bg-gray-200 mb-5 relative mt-[100px] rounded-md ">
                <img src="https://www.smashingmagazine.com/images/smashing-cat/workshop-explorer.svg" width="200"
                    alt="" class="absolute top-[-100px] left-[100px]">
                <a class="text-2xl text-red-700 p-5 mt-[100px] text-center bg-white rounded-md block mx-auto font-black shadow-md"
                    href="https://smashingconf.com/online-workshops/">Front-End & UX
                    Workshops, Online</a>
                <h1 class="text-2xl py-3 text-center d-block font-black mt-5">Boost your skills live, with our online
                    workshops.</h1>
                <p class="block text-center mt-5 text-lg">
                    Eg.
                    <a href="#" class="underline text-blue-800">Successful Design System</a>
                    with brad

                </p>
                <p class="py-3 block text-center mb-8 text-lg">
                    Frost and
                    <a href="#" class="underline text-blue-800 ">Accessibility For Designer</a>
                    <span class="block text-center">with Stéphanie Walter.</span>

                </p>
                <div class="mx-auto text-center p-5 mb-5">
                    <a class="py-7 px-5 bg-green-600 text-2xl rounded-md text-white text-bold">Jump to all workshops
                        ↬</a>


                </div>
                <p class="text-sm block text-center text-gray-500"> <span class="italic">2.5h live sessions</span>,
                    video recordings
                    and Q&A.</p>
            </div>



        </div>
    </div>
</x-app-layout>
