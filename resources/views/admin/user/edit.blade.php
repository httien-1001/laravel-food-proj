<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User') }}

            </h2>
            <ul class="flex">
                <li class="mx-3"><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                                    href="">Thêm mới</a></li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold my-2 ">Danh sách user</h2>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{route('user.update',$edit->id)}}" class="md:flex"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="w-full">
                            <div class="p-4 border-b-2"><span
                                    class="text-lg font-bold text-gray-600">Sửa user => {{$edit->name}}</span>
                            </div>
                            <div class="p-3">
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Avata</label>
                                    <div class="flex items-center justify-center">
                                        <div>
                                            <div
                                                class="flex flex-col max-w-md px-3 py-3 rounded-xl space-y-5 items-center">
                                                <img class="w-full rounded-md"
                                                     src="{{url('public/')}}{{$edit->avata}}"
                                                     alt="motivation"/>
                                                <input
                                                    type="file"
                                                    class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent"
                                                    name="avata">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2"><span class="text-sm">Tên</span>
                                    <input type="text" name="name" value="{{$edit->name}}"
                                           class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                                <div class="mb-2"><span class="text-sm">Email</span>
                                    <input type="text" name="email" value="{{$edit->email}}"
                                           class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                                <div class="mb-2"><span class="text-sm">Phone</span>
                                    <input type="text" name="phone" value="{{$edit->phone}}"
                                           class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                                <div class="mb-2"><span class="text-sm">Địa chỉ</span>
                                    <input type="text" name="address" value="{{$edit->Address}}"
                                           class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>

                                <div class="mb-2"><span class="text-sm">Quyền</span>
                                    <select
                                        class="appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full"
                                        name="quyen">
                                        @foreach($role as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
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
</x-app-layout>

