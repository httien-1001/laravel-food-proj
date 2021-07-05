<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User') }}

            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold my-2 ">Danh sách user</h2>

                    <table id="user" class="display table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Quyền</th>
                            <th>Địa chỉ</th>
                            <th>Ngày tạo</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user != null)
                            @foreach($user as $u)
                                <tr class="text-center">
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->phone}}</td>
                                    <td>{{$u->getRole->name}}</td>
                                    <td>{{$u->Address}}</td>
                                    <td>{{$u->created_at}}</td>
                                    <td class="flex justify-center items-center	">
                                        @if($u->id  != 1)
                                            <form action="{{route('user.delete',$u->id)}}}" class="form"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="bg-red-500 focus:outline-none text-white font-bold py-2 px-4 rounded-full">
                                                    Xóa
                                                </button>
                                            </form>
                                            <div class=" px-4 py-2">
                                                <a href="{{route('user.edit',$u->id)}}"
                                                   class="bg-green-500 focus:outline-none text-white font-bold py-2 px-4  rounded-full">Sửa</a>
                                            </div>
                                        @endif

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

