<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Danh sách Orders') }}

            </h2>
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
                            <th>#id</th>
                            <th>Tên</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Total Pỉce</th>
                            <th>Trạng thái</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($oder as $it)
                            <tr class="text-center">
                                <td>{{$it->id}}</td>
                                <td>{{$it->name}}</td>
                                <td>{{$it->phone}}</td>
                                <td>{{$it->email}}</td>

                                <td>{{number_format($it->total_price - $it->voucher > 0 ? $it->total_price - $it->voucher : 0) . ' vnđ'}}</td>
                                <td>{{$it->getStatus->name}}</td>
                                <td class="flex justify-center items-center	">
                                    <form action="{{route('orders.destroy',$it->id)}}" class="form"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                                class="bg-red-500 focus:outline-none text-white font-bold py-2 px-4 rounded-full">
                                            Xóa
                                        </button>
                                    </form>
                                    <div class=" px-4 py-2">
                                        <a href="{{route('orders.edit',$it->id)}}"
                                           class="bg-green-500 focus:outline-none text-white font-bold py-2 px-4  rounded-full">Sửa</a>
                                    </div>
                                    <div class=" px-4 py-2">
                                        <a href="{{route('orders.show',$it->id)}}"
                                           class="bg-green-500 focus:outline-none text-white font-bold py-2 px-4  rounded-full">Xem</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
