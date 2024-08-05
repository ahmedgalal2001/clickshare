<h1>Edit Bundle</h1>
<form action="{{ route('bundles.update', $bundle->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $bundle->name }}">
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="{{ $bundle->price }}">
    <button type="submit">Update</button>
</form>
