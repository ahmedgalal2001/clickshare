<h1>Bundles</h1>
<a href="{{ route('bundles.create') }}">Create New Bundle</a>
<ul>
    @foreach ($bundles as $bundle)
        <li>
            <a href="{{ route('bundles.show', $bundle->id) }}">{{ $bundle->name }} - ${{ $bundle->price }}</a>
            <a href="{{ route('bundles.edit', $bundle->id) }}">Edit</a>
            <form action="{{ route('bundles.destroy', $bundle->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
