<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Category
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 mt-5">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">New Category Form</h3>
                    <p class="mt-1 text-sm text-gray-600">Use this form to add new category information. Then click the save button located in bottom right.</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form action="{{route('categories.add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-6">
                                <div class="col-span-1">
                                    <label for="category-name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                    <input 
                                        type="text" 
                                        name="category-name" 
                                        id="category-name" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    >
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-gray-700">Banner</label>
                                    <div class="mt-1 flex items-center">
                                        <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                            <svg id="svgMainPhoto" class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <img id="imgMainPhoto" class="hidden">
                                        </span>
                                        <input type="file" id="mainPhoto" name="main" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <label for="category-description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <div class="mt-1">
                                        <textarea id="category-description" name="category-description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" ></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Brief description for this category.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('mainPhoto').addEventListener('change', (e) => {
                const reader = new FileReader()
                let file = document.getElementById('mainPhoto').files[0]
                reader.onload = async (event) => {
                    let svgMainPhoto = document.getElementById('svgMainPhoto');
                    if(svgMainPhoto){
                        svgMainPhoto.classList.add('hidden');
                    }
                    document.getElementById('imgMainPhoto').classList.remove('hidden');
                    document.getElementById('imgMainPhoto').setAttribute('src', event.target.result)
                }
                reader.readAsDataURL(file)
            }, false)   
        </script>
    
    @endpush
</x-app-layout>