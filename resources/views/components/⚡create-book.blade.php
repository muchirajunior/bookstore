<?php

use Livewire\Component;
use App\Models\Book;

new class extends Component
{
    public $showModal = false;
    public $title;
    public $author;
    public $rating;

    public function openModal(){
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function confirmAction(){
        $this->validate([
            'title' => 'string|required|min:3|max:50',
            'author'=> 'string|required|min:3|max:50',
            'rating'=> 'integer|required|min:1|max:10',
        ]);
        Book::create([
            'title' => $this->title,
            'author'=> $this->author,
            'rating'=> $this->rating,
        ]);
        $this->redirect('/');
    }
};
?>

<div>
    <!-- Modal Trigger Button -->
    <button 
        wire:click="openModal" 
        class="hover:text-blue-300 transition-colors"
    >
    Create Book
    </button>

    <!-- Modal Overlay -->
    @if ($showModal)
        <div class="fixed inset-0 backdrop-blur-sm  flex items-center justify-center z-50">
            <!-- Modal Container -->
            <div class="bg-gray-200 rounded-xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-900">Create Book</h3>
                    <button 
                        wire:click="closeModal" 
                        class="text-gray-400 hover:text-gray-600 transition-colors"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="mb-6 text-black flex flex-col">
                    <label for="">Title</label>
                    <input type="text" wire:model='title' class="rounded-lg border border-gray-400 px-2 py-1 mb-3">
                    @error('title')
                        <div class="text-red-500"> {{ $message }} </div>
                    @enderror
                    <label for="">Author</label>
                    <input type="text" wire:model='author' class="rounded-lg border border-gray-400 px-2 py-1 mb-3">
                      @error('author')
                        <div class="text-red-500"> {{ $message }} </div>
                    @enderror
                    <label for="">Rating</label>
                    <input type="number" maxlength="2" wire:model='rating' class="rounded-lg border border-gray-400 px-2 py-1">
                      @error('rating')
                        <div class="text-red-500"> {{ $message }} </div>
                    @enderror
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between gap-3 ">
                    <button 
                        wire:click="closeModal" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                    >
                        Cancel
                    </button>
                    <button 
                        wire:click="confirmAction" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>