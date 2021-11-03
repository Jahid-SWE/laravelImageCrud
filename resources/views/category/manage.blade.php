<h1>This is All Category page</h1>
<hr>
<a href="{{route('all-category')}}">All Category</a>  ||
<a href="{{route('add-category')}}">Add Category</a>
<hr>
<h1>{{Session::get('message')}}</h1>
<table border="1px solid"  width="600">
    <tr align="center">
        <th>SL NO</th>
        <th>Category Name</th>
        <th>Category Image</th>
        <th>Category Description</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $category)
    <tr align="center">
        <td>{{$loop->iteration}}</td>
        <td>{{$category->name}}</td>
        <td><img src="{{asset($category->image)}}" alt="{{$category->name}}" width="120" height="90"></td>
        <td>{{$category->description}}</td>
        <td>
            <a href="{{route('edit-category',['id'=>$category->id])}}">Edit</a>
            <a href="{{route('delete-category',['id'=>$category->id])}}" onclick="return confirm('Are You sure to delete this')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
