<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
<header>
    <nav class="p-4">
        <a href="/categories" class="text-white">Category</a>
        <a href="/authors" class="text-white">Author</a>
        <a href="/books">Book</a>
    </nav>
</header>
    <h1>Categories</h1>
    
    <h2>Add new category</h2>
    <form action="{{ url('/categories') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <button type="submit">Save</button>
    </form>

    <h2>Category List</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id ?? '' }}</td>
            <td>{{ $category->name ?? '' }}</td>
            <td>
                <a href="{{ url('/categories/'.$category->id.'/edit') }}">Edit</a>
                <form action="{{ url('/categories/'.$category->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
