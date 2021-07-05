<x-app-layout xmlns="http://www.w3.org/1999/html">
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Options') }}

            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-span-1 lg:col-span-6">
                        <div class="p-10 rounded-md shadow-md bg-white">
                            @if (session('mess'))
                                <div class="my-3 col text-green-500	font-bold	">
                                    {{ session('mess') }}
                                </div>
                            @endif
                            <form method="post" action="{{route('options.update',$opti->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Logo</label>
                                    <div class="flex items-center justify-center">
                                        <div>
                                            <div
                                                class="flex flex-col max-w-md px-3 py-3 rounded-xl space-y-5 items-center">
                                                <img class="w-full rounded-md"
                                                     src="{{url('/')}}{{$opti->logo}}"
                                                     alt="motivation"/>
                                                <input
                                                    type="file"
                                                    class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent"
                                                name="img">
                                            </div>
                                            <div class="font-bold text-red-700">
                                                {{ $errors->first('img') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Title</label>
                                    <input type="text" name="title" value="{{$opti->title}}"
                                           class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"/>
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">About</label>
                                    <textarea
                                        name="About"
                                        class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest">{{$opti->About}}</textarea>
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Facebook</label>
                                    <input type="text" name="facebook" value="{{$opti->facebook}}"
                                           class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"/>
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Youtube</label>
                                    <input type="text" name="youtube" value="{{$opti->youtube}}"
                                           class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"/>
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Instagram</label>
                                    <input type="text" name="instagram" value="{{$opti->instagram}}"
                                           class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"/>
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-3 text-gray-600" for="">Twitter</label>
                                    <input type="text" name="twitter" value="{{$opti->twitter}}"
                                           class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"/>
                                </div>
                                <div>
                                    <button type="submit"
                                            class="w-full text-ceenter px-4 py-3 bg-blue-500 rounded-md shadow-md text-white font-semibold">
                                        Lưu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function () {
        $('#cate').DataTable({})
            .columns.adjust()
            .responsive.recalc();
    });
</script>
