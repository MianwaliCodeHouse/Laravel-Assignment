<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-6">
                <h1 class="text-2xl font-bold text-white mb-6">Products</h1>

                <form method="GET" action="{{ route('products.index') }}"
                    class="mb-6 flex gap-3 flex-wrap space-y-4 lg:space-y-0 lg:space-x-4">
                    <div class="w-full lg:w-1/4">
                        <label for="category" class="block text-gray-400">Category</label>
                        <select name="category_id"
                            class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-300">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full lg:w-1/4">
                        <label for="name" class="block text-gray-400">Product Name</label>
                        <input type="text" name="name"
                            class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-300"
                            value="{{ request('name') }}">
                    </div>

                    <div class="w-full lg:w-1/4">
                        <label for="min_price" class="block text-gray-400">Min Price</label>
                        <input type="number" name="min_price"
                            class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-300"
                            value="{{ request('min_price') }}">
                    </div>

                    <div class="w-full lg:w-1/4">
                        <label for="max_price" class="block text-gray-400">Max Price</label>
                        <input type="number" name="max_price"
                            class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-300"
                            value="{{ request('max_price') }}">
                    </div>

                    <div class="w-full lg:w-auto" style="display: flex; align-items: end">
                        <button type="submit" class="px-4 py-2 bg-white rounded-md shadow-sm">Search</button>
                    </div>
                </form>

                @can('create')
                <a href="{{ route('products.create') }}"
                    class="inline-block mb-6 px-4 py-2 bg-gray-800 text-white rounded-md shadow-sm">Add New Product</a>
                @endcan


                <div class="overflow-x-auto">
                    <table class="w-full bg-gray-800 text-gray-300">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Sr.No.</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Image</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Price</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-700 divide-y divide-gray-600">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('products.show', $product) }}"
                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md shadow-sm">View</a>
                                        @can('update', $product)
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md shadow-sm">Edit</a>
                                        @endcan
                                        @can('delete', $product)
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md shadow-sm">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
