<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa bài viết') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('mess'))
                    <div class="my-3 col text-green-500	font-bold	">
                        {{ session('mess') }}
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('prod.update',$product->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-8 ">
                                <input type="text"
                                       class="intro-y border-gray-300 form-control py-3 px-4 box pr-10 placeholder-theme-13 w-full"
                                       placeholder="Title" name="name" required value="{{$product->name}}">
                                <div class="font-bold text-xl text-red-600">
                                    {{ $errors->first('name') }}
                                </div>
                                <div class="post intro-y overflow-hidden box mt-5">
                                    <textarea class="form-control my-editor" placeholder="Enter the Description"
                                              name="des">{{$product->des}}</textarea>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4 border">
                                <div class="intro-y box p-3">
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Giá</label></br>
                                        <input type="number" class="border-2 box border-gray-300 p-2 w-full"
                                               placeholder="Price" name="price" value="{{$product->price}}">
                                        <div class="font-bold text-xl text-red-600">
                                            {{ $errors->first('price') }}
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Danh mục</label></br>
                                        <select name="cate_id" class="box w-full border-gray-300">
                                            @foreach($cate as $cat)
                                                <option value="{{$cat->id}}"
                                                    {{$product->GetCate->id == $cat->id ? 'selected' : ''}}>
                                                    {{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Trạng thái</label></br>
                                        <select name="status" class="box w-full border-gray-300">
                                            <option value="0">Ẩn</option>
                                            <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Hiện</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Giảm giá</label></br>
                                        <select name="Flash_Sale" class="box w-full border-gray-300">
                                            <option value="0">Không</option>
                                            <option value="1" {{$product->Flash_Sale == 1 ? 'selected' : ''}}>Có
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="text-xl text-gray-600">Đặc biệt</label></br>
                                        <select name="Special" class="box w-full border-gray-300">
                                            <option value="0">Không</option>
                                            <option value="1" {{$product->Special == 1 ? 'selected' : ''}}>Có</option>
                                        </select>
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label class="text-xl text-gray-600">Ảnh nổi bật</label></br>
                                        <div
                                            class="catedit flex flex-col w-full rounded-xl space-y-5 items-center">
                                            <img class="w-full rounded-md "
                                                 src="{{url('public/')}}{{$product->img}}"
                                                 alt="motivation"/>
                                        </div>
                                        <div id="holder"
                                             class="flex flex-col w-full  px-3 py-3 rounded-xl space-y-5 items-center">
                                        </div>
                                        <div class="text-center">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fa fa-picture-o"></i> Choose</a>
                                            <input id="thumbnail" class="form-control" type="hidden" name="img" value="{{$product->img}}">
                                        </div>
                                        <div class="font-bold text-red-700">
                                            {{ $errors->first('img') }}
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit"
                                                class="p-4 w-full box bg-blue-500 text-white hover:bg-blue-400"
                                        >Lưu
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
