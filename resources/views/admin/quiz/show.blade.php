<x-app-layout>
    <div class="max-w-7xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-200">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <x-heroicon-o-question-mark-circle class="w-7 h-7 text-yellow-600" />
                Quiz Details
            </h2>
            <a href="{{ url('course') }}"
               class="mt-4 sm:mt-0 px-5 py-2.5 text-sm font-medium text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg transition duration-200">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline-block" /> Back to Quizzes
            </a>
        </div>

        <!-- Quiz Content -->
        <div class="space-y-6">

            <!-- Question -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Question</p>
                <p class="text-lg font-semibold text-gray-800">
                    {{ $quiz->question ?? 'N/A' }}
                </p>
            </div>

            <!-- Options -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-4 text-sm text-gray-500">Options</p>
                <ul class="space-y-3">
                    <li class="px-4 py-2 rounded-lg border 
                        @if($quiz->correct_answer == $quiz->option_one) bg-green-100 border-green-300 text-green-800 font-semibold @else bg-white text-gray-700 @endif">
                        A) {{ $quiz->option_one }}
                    </li>
                    <li class="px-4 py-2 rounded-lg border 
                        @if($quiz->correct_answer == $quiz->option_two) bg-green-100 border-green-300 text-green-800 font-semibold @else bg-white text-gray-700 @endif">
                        B) {{ $quiz->option_two }}
                    </li>
                    <li class="px-4 py-2 rounded-lg border 
                        @if($quiz->correct_answer == $quiz->option_three) bg-green-100 border-green-300 text-green-800 font-semibold @else bg-white text-gray-700 @endif">
                        C) {{ $quiz->option_three }}
                    </li>
                    <li class="px-4 py-2 rounded-lg border 
                        @if($quiz->correct_answer == $quiz->option_four) bg-green-100 border-green-300 text-green-800 font-semibold @else bg-white text-gray-700 @endif">
                        D) {{ $quiz->option_four }}
                    </li>
                    <!-- <li class="px-4 py-2 rounded-lg border 
                        @if($quiz->correct_answer == $quiz->correct_answer) bg-green-100 border-green-300 text-green-800 font-semibold @else bg-white text-gray-700 @endif">
                        E) {{ $quiz->correct_answer }}
                    </li> -->
                </ul>
            </div>

            <!-- Correct Answer -->
            <div class="p-5 rounded-xl bg-gray-50 border">
                <p class="mb-2 text-sm text-gray-500">Correct Answer</p>
                <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700 font-semibold">
                    {{  $quiz->correct_answer }}
                </span>
            </div>

        </div>
    </div>
</x-app-layout>
