@extends('layouts.admin.main_content')

@php
    $isNull = !isset($book) || $book == null;
@endphp

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            {{ $isNull ? 'Ajouter un Nouveau Livre' : 'Modifier le Livre' }}
        </h2>

        <form action="{{ $isNull ? '' : route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf


            <!-- Titre du livre -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Titre</label>
                <input type="text" name="title" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                       placeholder="Titre du livre" value="{{ old('title', !$isNull ? $book->title : '') }}" required>
                @error('title')
                <x-errorfield>
                    {{ $message }}
                </x-errorfield>
                @enderror
            </div>

            <!-- Auteur -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Auteur</label>
                <input  type="text" name="author" value="{{ old('author', !$isNull ? $book->author : '') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Nom de l'auteur" required>
                @error('author')
                    <x-errorfield>
                        {{ $message }}
                    </x-errorfield>
                @enderror
            </div>

            <!-- Prix -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Prix (FCFA)</label>
                <input type="number" name="price" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                       placeholder="Prix du livre" required step="0.01"
                       value="{{ old('price', !$isNull ? $book->price : '') }}">

            </div>

            <!-- Stock disponible -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Stock</label>
                <input type="number" name="stock"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                       placeholder="Quantité en stock" required
                       value="{{ old('stock', !$isNull ? $book->stock : '') }}">
                @error('stock')
                <x-errorfield>
                    {{ $message }}
                </x-errorfield>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                          rows="3" placeholder="Brève description du livre">{{ old('description', !$isNull ? $book->description : '') }}</textarea>
                @error('description')
                <x-errorfield>
                    {{ $message }}
                </x-errorfield>
                @enderror
            </div>

            <!-- Catégorie -->
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Choisir la catégorie</label>
                <select name="category_id" id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @if(!$isNull)
                        <option value="{{ old('category_id', $book->category->id) }}">{{ $book->category->name }}</option>
                    @endif
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Image du livre -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Image du livre</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('image')
                <x-errorfield>
                    {{ $message }}
                </x-errorfield>
                @enderror
            </div>

            <!-- Bouton Soumettre -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ $isNull ? 'Ajouter' : 'Modifier' }}
                </button>
            </div>
        </form>
    </div>
@endsection
