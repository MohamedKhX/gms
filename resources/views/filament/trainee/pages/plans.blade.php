@php
    $plans = \App\Models\Plan::all();
@endphp

<x-filament-panels::page>
    <style>
        .bg-gray-900\/50 {
            background-color: rgba(17,24,39,.5) !important;
        }
        .z-40 {
            z-index: 40 !important;
        }
        .inset-0 {
            inset: 0 !important;
        }
    </style>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    أختر الباقة المناسبة لك
                </h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    استمتع بتجربة لياقة بدنية مميزة تتناسب مع أهدافك الصحية ومستوى لياقتك. في صالتنا الرياضية، نقدم مجموعة متنوعة من الباقات التي تلبي احتياجاتك الفردية وتضمن لك تجربة تدريبية ممتعة وفعّالة.
                </p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0 items-center">
                @foreach($plans as $plan)
                    {{-- Start Plan Card --}}
                    <div class="w-full flex flex-col p-6 my-auto mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">{{ $plan->name }}</h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                            {{ $plan->description }}
                        </p>
                        <div class="flex justify-center items-baseline my-8">
                            <span class="mr-2 text-4xl font-extrabold">{{ $plan->price . ' د.ل ' }}</span>
                            <span class="text-gray-500 dark:text-gray-400">/ {{ $plan->duration . " يوم" }}</span>
                        </div>
                        <!-- List -->
                        <span class="text-right mb-4 font-semibold">الرياضات :</span>
                        <ul role="list" class="mb-8 space-y-4 text-left list-disc">
                            @foreach($plan->sports as $sport)
                                <li class="text-right space-x-3">
                                    <span>
                                        {{ ' ' . $sport->name }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Modal toggle -->
                        <button data-modal-target="checkout_modal_{{ $plan->id }}" data-modal-toggle="checkout_modal_{{ $plan->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                           اشترك الآن
                        </button>

                        <!-- Main modal -->
                        <div id="checkout_modal_{{ $plan->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            هل تريد الاشتراك في {{ $plan->name }}
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="checkout_modal_{{ $plan->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">إغلاق النافذة</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            إذا كنت تريد الاشتراك في الباقة عن طريق الدفع الإلكتروني فسيكون السعر بالدلاور
                                        </p>
                                        <p>
                                            <span class="font-semibold text-xl text-gray-800">السعر: </span>
                                            <span class="font-semibold text-xl text-gray-800">{{ $plan->price_dollar . ' دولار ' }}</span>
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <a href="{{ route('checkout', [$plan->stripe_price_id, $plan->id]) }}" data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">الذهاب إلى صفحة الدفع</a>
                                        <button data-modal-hide="checkout_modal_{{ $plan->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">إغلاق النافذة</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    {{-- End Plan Card --}}
                @endforeach

            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</x-filament-panels::page>
