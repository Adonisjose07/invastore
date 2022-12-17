<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage your products') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white px-6 py-6 overflow-hidden shadow-sm sm:rounded-lg"> 
                <div class="text-right pb-5">
                    <a href="{{route('products.new')}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 link-no-decoration">Add New</a>
                </div>
                <table class="table yajra-datatable table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript" defer>
            window.addEventListener('DOMContentLoaded',
            $(function () {
                
                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "{{route('products.list')}}",
                    columns: [
                        {data: 'name', name: 'name'},
                        {data: 'price', name: 'price'},
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: true, 
                            searchable: true
                        },
                    ]
                });
                
            }));
        </script>
    @endpush
</x-app-layout>