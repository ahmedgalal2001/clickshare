<h1>{{ $attributeValue->value }}</h1>
<a href="{{ route('attribute-values.edit', $attributeValue->id) }}">Edit</a>
<form action="{{ route('attribute-values.destroy', $attributeValue->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
