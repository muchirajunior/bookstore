<?php

use Livewire\Component;

use App\Models\Book;

new class  extends Component {

    public $books = [];

    public $searchKey ='';

    public function mount(){
        $this->populateBooks();
    }

    public function populateBooks(){
        $this->books = Book::where('title','LIKE',"%{$this->searchKey}%")->get();
    }

    //called whenever we update property -- use $property for general use
    public function updated($searchKey){
        $this->populateBooks();
    }

    public function delete(Book $book){
        $book->delete();
        $this->populateBooks();
    }
};
?>

<div>

   <livewire:page-header subtitle='Here is a list of all the books' />

   <div class="flex justify-end items-center">
        <input 
            type="text",
            class="rounded border border-gray-200 px-2 py-1 focus:outline-none "
            placeholder="Search books"
            wire:model.live.debounce.500ms='searchKey'
            wire:click="populateBooks"
        />
   </div>

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