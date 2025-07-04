<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Product</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
  <div>
    <a class="text-blue-500 hover:underline" href="{{ route('index') }}">Back</a>
  </div>
  <div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create a New Product</h2>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf
      <!-- Product Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
        <input
    type="text"
    id="name"
    name="name"
    value="{{ old('name') }}"
    class="mt-1 w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500"
     />

@error('name')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea
          id="description"
          name="description"
          rows="4"
          value="{{ old('description') }}"
          class="mt-1 w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500"
        ></textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
          
        @enderror
      </div>

      <!-- Image Upload -->
      <div>
        <label for="" class="block text-sm font-medium text-gray-700">Product Image</label>
        <input
          type="file"
          id="image"
          name="image"
          class="mt-1 w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-lg file:bg-gray-50 hover:file:bg-gray-100"
        />
      </div>

      <!-- Submit Button -->
      <div class="pt-4">
        <button
          type="submit"
          class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl hover:bg-blue-700 transition"
        >
          Submit Product
        </button>
      </div>
    </form>
  </div>
</body>
</html>
