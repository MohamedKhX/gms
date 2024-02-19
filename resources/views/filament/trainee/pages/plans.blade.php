@php
    $plans = \App\Models\Plan::all();
@endphp


<x-filament-panels::page>
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
                    <div class="flex flex-col p-6 my-auto mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
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
                        <a href="#" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">
                            اشتراك
                        </a>
                    </div>
                    {{-- End Plan Card --}}
                @endforeach

            </div>
        </div>
    </section>
</x-filament-panels::page>
