@extends('layouts.app')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Our Vinyl Collection</h2>
                <div class="flex space-x-4">
                    <select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($records as $record)
                    <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
                        @if($record->cover_image)
                            <img src="{{ asset('storage/' . $record->cover_image) }}" alt="{{ $record->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No image available</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $record->title }}</h3>
                            <p class="text-gray-600">{{ $record->artist }}</p>
                            <div class="mt-2 flex justify-between items-center">
                                <span class="text-lg font-bold text-indigo-600">€{{ number_format($record->price, 2) }}</span>
                                <span class="text-sm text-gray-500">{{ $record->condition }}</span>
                            </div>
                            <a href="{{ route('shop.show', $record) }}" class="mt-4 block w-full text-center bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $records->links() }}
            </div>
        </div>
    </div>
@endsection
