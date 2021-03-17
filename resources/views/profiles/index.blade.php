<x-app>
    <div class="mx-12 my-8 items-center">
        <h1>Click On User name to show detail info</h1>
        <h2>List of Users:</h2>
        <ol>
            @foreach ($users as $user)
                <li class="font-bold text-400"><a href="proflies/{{$user->name}}">{{$user->name}}</a></li>
            @endforeach
        </ol>

        <div class="mx-0 my-4">
            <a class="rounded-full border border-gray-300 shadow py-2 px-2 text-black mr-4" href="{{route('create.user')}}">Add New User</a>
        </div>

    </div>
</x-app>
