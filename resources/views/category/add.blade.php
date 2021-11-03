<h1>This is All Category page</h1>
<hr>
<a href="{{route('all-category')}}">All Category</a>  ||
<a href="{{route('add-category')}}">Add Category</a>
<hr>
<h1>{{Session::get('message')}}</h1>
<form action="{{route('new-category')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <th>Category Name</th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>Category Description</th>
            <td><textarea type="text" name="description"></textarea></td>
        </tr>
        <tr>
            <th>Category image</th>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Submit"></td>
        </tr>
    </table>


</form>
