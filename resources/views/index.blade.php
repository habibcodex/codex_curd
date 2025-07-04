<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      
      @layer utilities{
      .container{
        @apply mx-auto px-4 sm:px-6 lg:px-50;
      }
    }


    </style>
  </head>
  <body>
    <div class="container">
      <div class="flex justify-between items-center py-4 my-5">
        <p>Ripon video</p>
        <a href="{{ route('index') }}"><h2 class="text-red-500">Home</h2></a>
      <a href="{{ route('create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add new post</a>
      </div>

      @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
          {{ session('success') }}
        </div>
        
      @endif
    </div>



     <div class="max-w-7xl mx-auto bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-700">Product Table</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium">ID</th>
            <th class="px-6 py-3 text-left text-sm font-medium">Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium">Description</th>
            <th class="px-6 py-3 text-left text-sm font-medium">Image</th>
            <th class="px-6 py-3 text-left text-sm font-medium">Action</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
        @foreach ($products as $product)
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->id }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->name }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ $product->description }}</td>
            <td class="px-6 py-4">
              @if ($product && $product->image)
                <img src="{{ asset('upload/' . $product->image) }}" alt="Product Image" class="w-12 h-12 rounded-lg object-cover">
              @else
                
              @endif
            </td>
            <td class="px-6 py-4">
              <a href="{{ route('product.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Edit</a>
              <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
               <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm ml-2">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          <!-- Repeat <tr> for more rows -->
        </tbody>
      </table>
    </div>
  </div>
    
  </body>
</html>