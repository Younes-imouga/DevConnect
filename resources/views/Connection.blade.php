<x-app-layout>
<div class="flex justify-around mx-auto sm:px-6 lg:px-8">
    <div class="w-[40%]">
        <h2 class="font-semibold text-center text-4xl text-gray-800 leading-tight mb-8 mt-14 ml-3">
            My Connections
        </h2>

        <div class="bg-white shadow-md rounded-lg p-4 max-w-4xl mx-auto mb-8">
            @foreach($Connection as $connection)
                @if($connection->status === 'accepted')
                    @if($connection->connectedUser->id !== auth()->user()->id)
                        <div class="flex items-center justify-between">
                            <a href="{{ route('profile.show', $connection->connectedUser->id) }}" class="flex items-center space-x-3">
                                <img src="{{ $connection->connectedUser->profile->image ? asset('storage/' . $connection->connectedUser->profile->image) : 'data:image/jpeg;base64,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' }}" alt="{{ $connection->connectedUser->name }}" class="w-12 h-12 rounded-full"/>
                                <span>{{ $connection->connectedUser->name }}</span>
                            </a>
                            <a href="{{ route('profile.show', $connection->connectedUser->id) }}" class="text-blue-600 hover:underline">Go to Profile</a>
                        </div>
                    @elseif($connection->user->id !== auth()->user()->id)
                        <div class="flex items-center justify-between">
                            <a href="{{ route('profile.show', $connection->user->id) }}" class="flex items-center space-x-3">
                                <img src="{{ $connection->user->profile->image ? asset('storage/' . $connection->user->profile->image) : 'data:image/jpeg;base64,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' }}" alt="{{ $connection->connectedUser->name }}" class="w-12 h-12 rounded-full"/>
                                <span>{{ $connection->user->name }}</span>
                            </a>
                            <a href="{{ route('profile.show', $connection->user->id) }}" class="text-blue-600 hover:underline">Go to Profile</a>
                        </div>

                    @endif
                @endif
            @endforeach
        </div>
    </div>
    <div class="w-[40%]">
        <h2 class="font-semibold text-center text-4xl text-gray-800 leading-tight mb-8 mt-14 mr">
            My Invitations
        </h2>

        <div class="bg-white shadow-md rounded-lg p-4 max-w-4xl mx-auto mb-8">
            @foreach($recievedConnections as $connection)
                @if($connection->status === 'pending')
                    <div class="flex items-center justify-between">
                        <a href="{{ route('profile.show', $connection->user->id) }}" class="flex items-center space-x-3">
                            <img src="{{ $connection->user->profile->image ? asset('storage/' . $connection->user->profile->image) : 'default-image-url.jpg' }}" alt="{{ $connection->user->name }}" class="w-12 h-12 rounded-full"/>
                            <span>{{ $connection->user->name }}</span>
                        </a>
                        <form action="{{ route('connections.accept', $connection->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-green-600 hover:underline">Accept</button>
                        </form>
                        <form action="{{ route('connections.decline', $connection->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline">Decline</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
</div>
</x-app-layout>