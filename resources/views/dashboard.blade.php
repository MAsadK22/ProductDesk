<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product_Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in now!") }}
                </div>
            </div>
        </div>
    </div>
    
    <!-- Continue with simple HTML below -->
    <div class="container">
        <button class="btn btn-primary">
            <a href="/create" class="text-light" style="text-decoration: none; color: inherit;">Add New Product</a>
        </button>
        <table class="table table-striped my-5">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <img src="products/{{$product->image}}" class="rounded-circle" width="60" height="60" style="border-radius: 50%;"/>
                </td>
                <td>
                    <button class="btn btn-dark">
                        <a href="edit/{{$product->id}}" class="text-light" style="text-decoration: none; color: inherit;">Edit</a>
                    </button>
                    <form action="delete/{{$product->id}}" method="POST" class="d-inline" id="deleteForm_{{$product->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="showConfirmationDialog({{$product->id}})">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    
    
    <!-- Add Bootstrap CSS and JavaScript below (if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showConfirmationDialog(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                // If the user clicks "OK," submit the form with the corresponding product ID
                document.getElementById("deleteForm_" + productId).submit();
            } else {
                // If the user clicks "Cancel," do nothing
            }
        }
    </script>

</x-app-layout>
