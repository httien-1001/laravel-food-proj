<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Category') }}

            </h2>
            <ul class="flex">
                <li class="mx-3"><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                                    href="{{route('cate.create')}}">Thêm mới</a></li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-20 px-2">
                        @if (session('mess'))
                            <div class="my-3 col text-green-500	font-bold	">
                                {{ session('mess') }}
                            </div>
                        @endif
                        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                            <form method="post" action="{{route('banner.store')}}" class="md:flex"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="w-full">
                                    <div class="p-4 border-b-2"><span class="text-lg font-bold text-gray-600">Thêm banner</span>
                                    </div>
                                    <div class="p-3">
                                        <div class="mb-2"><span class="text-sm">Link</span>
                                            <input type="text" name="link"
                                                   class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                            <div class="font-bold text-xl text-red-600">
                                                {{ $errors->first('link') }}
                                            </div>
                                        </div>
                                        <div class="mb-2"><span>Ảnh</span>
                                            <div class="flex items-center justify-center">
                                                <div>
                                                    <div
                                                        class="flex flex-col max-w-md px-3 py-3 rounded-xl space-y-5 items-center">
                                                        <input
                                                            type="file"
                                                            class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent"
                                                            name="img">
                                                    </div>
                                                    <div class="font-bold text-red-700">
                                                        {{ $errors->first('img') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="font-bold text-xl text-red-600">
                                            {{ $errors->first('img') }}
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center pb-3 ">

                                        <button type="submit"
                                                class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">
                                            Create
                                        </button>
                                    </div>
                                </div>


                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

