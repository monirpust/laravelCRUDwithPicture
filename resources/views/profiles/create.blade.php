<x-app>
    <div class="mx-8">
    <form action="{{route('store.user')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="name">
            Name
            </label>

            <input class="border border-grey-400 p-2 w-full" type="text" name="name" id="name" placeholder="Enter your name" required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="image">
                Image
                </label>
            <div class="flex">
                <input class="border border-grey-400 p-2 w-full" type="file" name="image" id="image" required>

            </div>

            @error('image')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>



        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="email">
            Email
            </label>

            <input class="border border-grey-400 p-2 w-full" type="email" name="email" id="email" placeholder="example@mail.com" required>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>


        <div class="mb-6">

            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>

        </div>

    </form>
</div>
</x-app>
