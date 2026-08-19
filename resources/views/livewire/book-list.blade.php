<?php

use Livewire\Component;

use App\Models\Book;

new class  extends Component
{
    public $name = 'Junior';

    public $books = [];

    public function mount()
    {
        $this->populateBooks();
    }

    public function populateBooks()
    {
        $this->books = Book::all()->toArray();

    }

    public function delete(Book $book){
        $book->delete();
        $this->populateBooks();
    }
};
?>

<div>
    <header class="w-full flex justify-between">
        <span>
            <h2 class="text-xl font-bold">Hello, {{ $this->name }}</h2>
            <p class="text-gray-300">Here is a list of all books</p>
        </span>

        <form wire:submit='$refresh'>
            <span class="mr-2">Name</span>
            <input class="border border-gray-200 rounded-lg px-2 py-1" wire:model.live.debounce.500ms='name' type="text">
        </form>
    </header>

    <div class="grid grid-cols-2 gap-4 justify-between">
        @foreach ($books as $book)
            <div class="bg-gray-900 p-4 m-2 rounded-lg shadow">
                <b class="mb-3 text-left w-fu ll">{{ $book['title'] }}</b>
                <div class="flex flex-row justify-between mt-3">
                    <span class="text-gray-400">{{ $book['author'] }}</span>
                    <span class="bg-gray-950 rounded-full px-3 py-1">{{ $book['rating'] }}/10</span>
                    <button class="bg-pink-400 px-4 rounded" wire:click="delete({{ $book['id'] }})">Delete</button>
                </div>
            </div>
        @endforeach
    </div>
</div>