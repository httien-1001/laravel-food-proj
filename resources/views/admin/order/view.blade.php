<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders') }}

            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex">
                        <h2 class="text-2xl font-bold my-2 ">Chi tiết</h2>
                        <a type="button" href="{{route('orders.pdf',$Order->id)}}"
                           class="ml-5 px-5 py-2 bg-blue-700 border text-white font-bold" style="cursor: pointer">Download
                            PDF </a>
                    </div>

                    <div class="p-2" id="pdf">
                        <div class="flex flex-nowrap p-2">
                            <p class="font-bold mr-2 p-2 border">Tên: {{$Order->name}}</p>
                            <p class="font-bold mr-2 p-2 border">SĐT: {{$Order->phone}}</p>
                            <p class="font-bold mr-2 p-2 border">Email: {{$Order->email}}</p>
                            <p class="font-bold mr-2 p-2 border">Trạng thái: {{$Order->getStatus->name}}</p>
                            <p class="font-bold mr-2 p-2 border">Tổng
                                giá: {{number_format($Order->total_price - $Order->voucher > 0 ? $Order->total_price - $Order->voucher : 0) . ' vnđ'}}</p>
                        </div>
                        <div class="p-2 flex ">
                            <p class="font-bold mr-2 p-2 border w-">Ngày tạo: {{$Order->created_at}}</p>
                            <p class="font-bold mr-2 p-2 border w-">Cập nhật lần cuối: {{$Order->updated_at}}</p>
                        </div>
                        <div class="p-2">
                            <div class="font-bold mr-4 p-2 border">Địa chỉ: {{$Order->addres}}</div>
                        </div>
                        <div class="p-2">
                            <div class="font-bold mr-4 p-2 border">Ghi chú: {{$Order->note}}</div>

                        </div>
                        <div class="mt-3 p-2">

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
                                @foreach($id as $detail)
                                    @foreach($detail->GetProducts as $Pro)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        1
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
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
