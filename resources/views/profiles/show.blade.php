<x-app>
        <div class="mx-8 items-center">
            <img class="mb-2" style="width:350px; height:250px" src="{{$user->image}}" alt="{{$user->name}} Image">


        </div>
        <div class="items-center my-4 mx-4">
            <div class="my-4">
                <h2 class="font-bold text-xl">Nmae: {{$user->name}}</h2>
                <p class="font-bold text-xl">Email: {{$user->email}}</p>
                <p class="font-bold text-xl">Contact Number:</p>
                @foreach ($user->contacts as $contact)
                    <p class="text-lg"> {{$contact->contact}}</p>
                @endforeach

            </div>
            <div class="mx-4">
                    <a class="rounded-full border border-gray-300 shadow py-2 px-2 text-black mr-4" href="{{$user->id}}/edit">Edit User</a>

            </div>
        </div>

</x-app>
