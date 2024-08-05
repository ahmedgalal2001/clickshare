<h1>Attribute Values</h1>
<a href="{{ route('attribute-values.create') }}">Create New Attribute Value</a>
<ul>
    @foreach ($attributeValues as $attributeValue)
        <li>
            <a href="{{ route('attribute-values.show', $attributeValue->id) }}">{{ $attributeValue->value }}</a>
            <a href="{{ route('attribute-values.edit', $attributeValue->id) }}">Edit</a>
            <form action="{{ route('attribute-values.destroy', $attributeValue->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
