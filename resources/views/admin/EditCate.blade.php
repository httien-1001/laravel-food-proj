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
                    <div class="py-20 h-screen px-2">
                        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                            <form method="post" action="{{route('cate.update',$edit->id)}}" class="md:flex"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="w-full">
                                    <div class="p-4 border-b-2"><span class="text-lg font-bold text-gray-600">Sửa danh mục</span>
                                    </div>
                                    <div class="p-3">
                                        <div class="mb-2"><span class="text-sm">Tên</span>
                                            <input type="text" name="name" value="{{$edit->name}}"
                                                   class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                            <div class="font-bold text-xl text-red-600">
                                                {{ $errors->first('name') }}
                                            </div>
                                        </div>

                                        <div class="mb-2"><span>Ảnh</span>
                                            <div>
                                                <div
                                                     class="catedit flex flex-col w-full  px-3 py-3 rounded-xl space-y-5 items-center">
                                                    <img class="w-full rounded-md h-72 object-cover	"
                                                         src="{{url('public/')}}{{$edit->img}}"
                                                         alt="motivation"/>
                                                </div>
                                                <div id="holder"
                                                     class="flex flex-col w-full  px-3 py-3 rounded-xl space-y-5 items-center">
                                                </div>
                                                <div class="text-center">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        <i class="fa fa-picture-o"></i> Choose</a>
                                                    <input id="thumbnail" class="form-control" type="hidden" name="img" value="{{$edit->img}}">
                                                </div>
                                                <div class="font-bold text-red-700">
                                                    {{ $errors->first('img') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2"><span class="text-sm">Trang thái</span>
                                            <select
                                                class="appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full"
                                                name="status">
                                                <option value="0">Ẩn</option>
                                                <option value="1" {{$edit->status == 1 ? 'Selected' : ''}}>Hiện</option>
                                            </select>
                                        </div>
                                        <div class="font-bold text-xl text-red-600">
                                            {{ $errors->first('img') }}
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center pb-3 ">
                                        @if (session('mess'))
                                            <div class="my-3 col text-green-500	font-bold	">
                                                {{ session('mess') }}
                                            </div>
                                        @endif
                                        <button type="submit"
                                                class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">
                                            Save
                                        </button>
                                    </div>
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
