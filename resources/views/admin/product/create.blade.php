<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm sản phảm mới') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('prod.store')}}">
                        @csrf
                        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-8 ">
                                <input type="text"
                                       class="intro-y border-gray-300 form-control py-3 px-4 box pr-10 placeholder-theme-13 w-full"
                                       placeholder="Title" name="name" required>
                                <div class="font-bold text-xl text-red-600">
                                    {{ $errors->first('name') }}
                                </div>
                                <div class="post intro-y overflow-hidden box mt-5">
                                    <textarea class="form-control my-editor" placeholder="Enter the Description"
                                              name="des"></textarea>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4 border">
                                <div class="intro-y box p-3">
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Giá</label></br>
                                        <input type="number" class="border-2 box border-gray-300 p-2 w-full"
                                               placeholder="Price" name="price"></input>
                                        <div class="font-bold text-xl text-red-600">
                                            {{ $errors->first('price') }}
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Giá</label></br>
                                        <input type="number" class="border-2 box border-gray-300 p-2 w-full"
                                               placeholder="Sale Price" name="sale_price"></input>
                                        <div class="font-bold text-xl text-red-600">
                                            {{ $errors->first('sale_price') }}
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Danh mục</label></br>
                                        <select name="cate_id" class="box w-full border-gray-300">
                                            @foreach($cate as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Trạng thái</label></br>
                                        <select name="statuts" class="box w-full border-gray-300">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Giảm giá</label></br>
                                        <select name="Flash_Sale" class="box w-full border-gray-300">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Đặc biệt</label></br>
                                        <select name="Special" class="box w-full border-gray-300">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>
                                        </select>
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label class="text-xl text-gray-600">Ảnh nổi bật</label></br>
                                        <div
                                            class="flex flex-col w-full rounded-xl space-y-5 items-center">
                                            <div id="holder"
                                                 class="flex w-full rounded-xl space-y-5 items-center">
                                            </div>
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fa fa-picture-o"></i> Choose</a>
                                            <input id="thumbnail" class="form-control" type="hidden" name="img">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit"
                                                class="p-4 w-full box bg-blue-500 text-white hover:bg-blue-400"
                                        >Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
