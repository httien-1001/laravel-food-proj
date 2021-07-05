<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Banner') }}
            </h2>
            <ul class="flex">
                <li class="mx-3"><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                                    href="{{route('banner.create')}}">Thêm mới</a></li>
            </ul>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold my-2 ">Danh sách bài viết</h2>

                    <table id="table_id" cla class="display table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Ảnh</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($banner != null)
                            @foreach($banner as $it)
                                <tr>
                                    <td>{{$it->id}}</td>
                                    <td><img src="{{url('/')}}{{$it->images}}" width="150px"></td>
                                    <td>{{$it->link}}</td>
                                    <td>{!!$it->status == 1 ? "<span class='rounded-full
                                bg-green-500 py-1 px-6'>Hiện</span>" : "<span class='rounded-full
                                 bg-red-700 py-1 px-6 text-white'>Ẩn</span>"!!}</td>
                                    <td class="flex justify-center items-center	 mt-5">
                                        <form action="{{route('banner.destroy',$it->id)}}" class="form"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                    class="bg-red-500 focus:outline-none text-white font-bold py-2 px-4 rounded-full">
                                                Xóa
                                            </button>
                                        </form>
                                        <div class=" px-4 py-2">
                                            <a href="{{route('prod.edit',$it->id)}}"
                                               class="bg-green-500 focus:outline-none text-white font-bold py-2 px-4  rounded-full">Sửa</a>
                                        </div>
                                        <div class="px-4 py-2">
                                            <span onclick="openModal('mymodalcentered')" data-type="{{$it->id}}"
                                                  class="bg-blue-500 focus:outline-none text-white font-bold py-2 px-4
                                                   rounded-full view">Xem</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <dialog id="mymodalcentered" class="bg-transparent z-0 relative w-screen h-screen">
        <div
            class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
            <div class="bg-white flex rounded-lg w-3/4 relative">
                <div class="flex flex-col items-start">
                    <div class="p-7 flex items-center w-full">
                        <div class="text-gray-900 font-bold text-lg">Xem chi tiết</div>

                    </div>

                    <div class="px-7 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
{{--                        <div class="flex">--}}
{{--                            <h3 class="border-b font-bold text-xl mr-10">Tiêu đề: <span id="title">abc</span></h3>--}}
{{--                            <h3 class="border-b font-bold text-xl mr-10">Giá: <span id="price">abc</span></h3>--}}
{{--                            <h3 class="border-b font-bold text-xl mr-10">Danh mục: <span id="cate">abc</span></h3>--}}
{{--                            <h3 class="border-b font-bold text-xl mr-10">Trạng thái: <span id="stt">abc</span></h3>--}}
{{--                            <h3 class="border-b font-bold text-xl mr-10">Sale: <span id="sale">abc</span></h3>--}}
{{--                        </div>--}}
                    <h1 id="res"></h1>
                    </div>

                    <div class="p-7 flex justify-end items-center w-full">
                        <button type="button" onclick="modalClose('mymodalcentered')"
                                class="bg-transparent hover:bg-gray-500  text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</x-app-layout>

