<h1>Create Bundle</h1>
<form action="{{ route('bundles.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <label for="price">Price:</label>
    <input type="text" id="price" name="price">
    <button type="submit">Create</button>
</form>
