@extends('layouts.app')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Admin Dashboard</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Records Management Card -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Records Management</h3>
                    <p class="text-gray-600 mb-4">Manage your vinyl record inventory, add new records, update prices, and track stock levels.</p>
                    <a href="{{ route('records.index') }}" class="inline-block bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                        Manage Records
                    </a>
                </div>

                <!-- Categories Card -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Categories</h3>
                    <p class="text-gray-600 mb-4">Organize your records by managing music categories and genres.</p>
                    <a href="#" class="inline-block bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                        Manage Categories
                    </a>
                </div>

                <!-- Community Management Card -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Community</h3>
                    <p class="text-gray-600 mb-4">Moderate forum discussions and manage user interactions.</p>
                    <a href="#" class="inline-block bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                        Manage Community
                    </a>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Stats</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-sm text-gray-600">Total Records</p>
                        <p class="text-2xl font-bold text-indigo-600">{{ $totalRecords ?? 0 }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-sm text-gray-600">Low Stock Items</p>
                        <p class="text-2xl font-bold text-yellow-600">{{ $lowStockCount ?? 0 }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-sm text-gray-600">Total Categories</p>
                        <p class="text-2xl font-bold text-green-600">{{ $totalCategories ?? 0 }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-sm text-gray-600">Forum Posts</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $forumPostsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
