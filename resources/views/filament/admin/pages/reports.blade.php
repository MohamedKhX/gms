<x-filament-panels::page>
    <div class="flex justify-center bg-white shadow-lg p-24">
        <a href="{{ route('print.subscriptions') }}"  target="_blank" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            طباعة تقرير عن الاشتراكات
        </a>

        <a href="{{ route('print.coaches') }}"  target="_blank" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            طباعة تقرير عن المدربين
        </a>
        <a href="{{ route('print.trainees') }}" target="_blank" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            طباعة تقرير عن المتدربين
        </a>
    </div>
</x-filament-panels::page>
