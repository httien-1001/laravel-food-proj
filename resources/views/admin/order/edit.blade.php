<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa bài viết') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('mess'))
                        <div class="my-3 col text-green-500	font-bold	">
                            {{ session('mess') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('orders.update',$order->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-7 border p-3">
                                <div class="flex justify-around	border-b-4 mb-4">
                                    <div class="mr-2"><span>#IdOrder:</span>
                                        <p class="font-bold">{{$order->id}}</p>
                                    </div>
                                    <div class="mr-2"><span>Ngày tạo:</span>
                                        <p class="font-bold">{{$order->created_at}}</p>
                                    </div>
                                    <div class="mr-2"><span>Cập nhật lần cuối:</span>
                                        <p
                                            class="font-bold">{{$order->updated_at}}</p>
                                    </div>
                                    <div class="mr-2"><span>Tổng giá:</span>
                                        <p class="font-bold">{{number_format($order->total_price - $order->voucher > 0 ? $order->total_price - $order->voucher : 0) . ' vnđ'}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                STT
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tên
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Giá
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Số lượng
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $n = 1 ?>
                                        @foreach($order->getDetail as $detail)
                                            @foreach($detail->GetProducts as $Pro)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                {{$n++}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{$Pro->name}}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span>
                                            {{number_format($Pro->price) . ' vnđ '}}
                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{$detail->quantity}}

                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endforeach
                                        <!-- More items... -->
                                        </tbody>
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Giá gốc:{{number_format($order->total_price) . ' vnđ'}}

                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Voucher: {{number_format($order->voucher) . ' vnđ'}}
                                            </th>
                                            <th scope="col"
                                                class="">

                                            </th>
                                            <th scope="col"
                                                class="">

                                            </th>

                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-5 border">
                                <div class="intro-y box p-3">
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label for="name" class="block mb-2">Tên khách hàng:</label>
                                        <input type="text" value="{{$order->name}}" name="name" id="name"
                                               class="box w-full">
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label for="email" class="block mb-2">Email:</label>
                                        <input type="email" value="{{$order->email}}" name="email" id="email"
                                               class="box w-full">
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label for="phone" class="block mb-2">Phone:</label>
                                        <input type="text" value="{{$order->phone}}" name="phone" id="phone"
                                               class="box w-full">
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label for="addres" class="block mb-2">Địa chỉ:</label>
                                        <input type="text" value="{{$order->addres}}" name="addres" id="addres"
                                               class="box w-full">
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label for="note" class="block mb-2">Ghi chú:</label>
                                        <textarea class="box w-full" name="note" id="note">{{$order->note}}</textarea>
                                    </div>
                                    <div class="mt-2 border-b-2 pb-2">
                                        <label class="text-xl text-gray-600" id="status">Trạng thái</label></br>
                                        <select name="status" class="box w-full border-gray-300" id="status">
                                            @foreach($track as $st)
                                                <option
                                                    value="{{$st->id}}" {{$st->id == $order->status ? 'selected' : ''}} >{{$st->name}}</option>
                                            @endforeach
                                        </select>
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
