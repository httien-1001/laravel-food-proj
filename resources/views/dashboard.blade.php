<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white-900 border border-indigo-400 rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-green-600"><i
                                                class="fa fa-folder-open fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-black-400">Danh mục</h5>
                                        <h3 class="font-bold text-3xl text-yellow-700">{{count($cate)}}</h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white-900 border border-indigo-400 rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-green-600"><i
                                                class="fa fa-product-hunt fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-black-400">Bài viết</h5>
                                        <h3 class="font-bold text-3xl text-yellow-700">{{count($post)}} </h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white-900 border border-indigo-400 rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-green-600"><i
                                                class="fa fa-users fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-black-400">Người dùng</h5>
                                        <h3 class="font-bold text-3xl text-yellow-700">{{count($user)}} </h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white-900 border border-indigo-400 rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-green-600"><i
                                                class="fa fa-shopping-basket fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-black-400">Đơn hàng</h5>
                                        <h3 class="font-bold text-3xl text-yellow-700">{{count($order)}} </h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
