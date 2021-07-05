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
                    <h2 class="text-2xl font-bold my-2 ">Danh sách danh mục</h2>
                    <table id="cate" class="display table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($cate != null)
                            @foreach($cate as $it)
                                <tr class="text-center">
                                    <td>{{$it->id}}</td>
                                    <td>{{$it->name}}</td>
                                    <td>{!!$it->status == 1 ? "<span class='rounded-full
                                bg-green-500 py-1 px-6'>Hiện</span>" : "<span class='rounded-full
                                 bg-red-700 py-1 px-6 text-white'>Ẩn</span>"!!}</td>
                                    <td class="flex justify-center items-center	">
                                        <form action="{{route('cate.destroy',$it->id)}}" class="form"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" id="delete"
                                                    class="bg-red-500 focus:outline-none text-white font-bold py-2 px-4 rounded-full">
                                                Xóa
                                            </button>
                                        </form>
                                        <div class=" px-4 py-2">
                                            <a href="{{route('cate.edit',$it->id)}}"
                                               class="bg-green-500 focus:outline-none text-white font-bold py-2 px-4  rounded-full">Sửa</a>
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

</x-app-layout>
