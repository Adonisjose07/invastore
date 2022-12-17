<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add new product
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        <form action="{{route('products.add')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 mt-5">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Product Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Use this form to add product information. Then click save button located in bottom right.</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="col-span-1">
                                <label for="product-name" class="block text-sm font-bold text-gray-700">Product Name</label>
                                <input 
                                    type="text" 
                                    name="product-name" 
                                    id="product-name" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    value=""
                                >
                            </div>
                            <div class="col-span-1">
                                <label for="product-category" class="block text-sm font-bold text-gray-700">Product Category</label>
                                <select 
                                    name="product-category" 
                                    id="product-category" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                >
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                                
                            </div>

                            <div class="col-span-1">
                                <label for="product-description" class="block text-sm font-bold text-gray-700">Description</label>
                                <div class="mt-1">
                                    <textarea id="product-description" name="product-description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Brief description for this product.</p>
                            </div>

                            <div class="col-span-1">
                                <label for="product-price" class="block text-sm font-bold text-gray-700">Price</label>
                                <input 
                                    type="text" 
                                    name="product-price" 
                                    id="product-price" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    value=""
                                >
                                <p class="mt-2 text-sm text-gray-500">Set product price for this product.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1 mt-5">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Product Media</h3>
                    <p class="mt-1 text-sm text-gray-600">Use this form to modify product images and media. Then click save button located in bottom right.</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-gray-700">Main Photo</label>
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
                                <label class="block text-sm font-bold text-gray-700">Gallery photos</label>
                                <div class="mt-1 flex justify-center flex-wrap rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                    <div id="galleryThumbs"></div>
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" id="galleryPlaceholder" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex justify-center text-sm text-gray-600">
                                            <label for="gallery" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span class="text-center">Select files</span>
                                            <input id="gallery" name="gallery[]" type="file" class="sr-only" multiple>
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Product</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
       <script>

            document.getElementById('mainPhoto').addEventListener('change', (e) => {
                const reader = new FileReader()
                let file = document.getElementById('mainPhoto').files[0]
                reader.onload = async (event) => {
                    document.getElementById('svgMainPhoto').classList.add('hidden');
                    document.getElementById('imgMainPhoto').classList.remove('hidden');
                    document.getElementById('imgMainPhoto').setAttribute('src', event.target.result)
                }
                reader.readAsDataURL(file)
            }, false)

            document.getElementById('gallery').addEventListener('change', (e) => {
                document.getElementById('galleryPlaceholder').classList.add('hidden');
                document.getElementById('galleryThumbs').innerHTML='';
                let files = document.getElementById('gallery').files
                for(i=0; i<files.length; i++){
                    const reader = new FileReader();
                    ((i, reader) => {
                        reader.onload = async (event) => {
                            let img = document.createElement('img');
                            img.src = event.target.result;
                            img.className = 'imgThumb';
    
                            let div = document.createElement('div');
                            div.className = 'thumbsContainer px-2 border border-zinc-400 mb-4';
    
                            let button = document.createElement('button');
                            button.className='bg-red-500 hover:bg-red-600 text-white rounded block mx-auto px-2 my-2'
                            button.textContent = 'cancel';
                            button.type = 'button';
                            button.dataset.ref = i;
    
                            button.addEventListener('click', deleteThumb, false)
    
                            div.appendChild(img)
                            div.appendChild(button)
                            
                            document.getElementById('galleryThumbs').appendChild(div)                        
                        }
                    })(i, reader);
                    reader.readAsDataURL(files[i])
                }
            }, false)

            function deleteThumb(e){
                let index = e.target.dataset.ref;
                const dt = new DataTransfer()

                let files = document.getElementById('gallery').files;
                for(let i=0; i<files.length; i++){
                    if(i != index){
                        dt.items.add(files[i])
                    }
                }

                document.getElementById('gallery').files = dt.files;
                document.querySelector("button[data-ref='"+index+"']").parentElement.remove();

            }
        </script>
    
    @endpush
</x-app-layout>