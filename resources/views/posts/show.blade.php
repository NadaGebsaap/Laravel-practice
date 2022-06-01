<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post') }} 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('posts.show', $post) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Message -->
                        <div class="p-5">
                            <x-label for="body" :value="__('Show Message')"/>

                            <x-label id="body" class="block mt-1 w-full" type="text" name="body" :value="old('body', $post->body)" required autofocus />
                                
                            <x-label for="body" :value="__('Message Owner')"/>

                            <x-label id="body" class="block mt-1 w-full" type="text" name="body" :value="old('body', $post->owner->name)" required autofocus />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>