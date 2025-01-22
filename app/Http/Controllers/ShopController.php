<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('category')
            ->when(request('category'), function ($query) {
                return $query->where('category_id', request('category'));
            })
            ->latest()
            ->paginate(12);

        $categories = Category::all();

        return view('shop.index', compact('records', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.records.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'condition' => 'required|in:new,used,mint',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Record::create($validated);

        return redirect()->route('admin.records.index')->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('shop.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        $categories = Category::all();
        return view('admin.records.edit', compact('record', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'condition' => 'required|in:new,used,mint',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $record->update($validated);

        return redirect()->route('admin.records.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('admin.records.index')->with('success', 'Record deleted successfully.');
    }
}
