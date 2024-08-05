<h1>{{ $bundle->name }} - ${{ $bundle->price }}</h1>
<a href="{{ route('bundles.edit', $bundle->id) }}">Edit</a>
<form action="{{ route('bundles.destroy', $bundle->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
