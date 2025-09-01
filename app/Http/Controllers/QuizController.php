<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz.index', compact('quizzes'));
    }


    public function create()
    {
        return view('admin.quiz.create');
    }


    // public function show($id)
    // {
    //     $quiz = Quiz::findOrFail($id);
    //     return response()->json($quiz);
    // }

    public function show(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($quiz);
        }

        return view('admin.quiz.show', compact('quiz'));
    }



    //  public function show(string $id)
    //     {
    //         $quiz = Quiz::find($id);
    //         return view('admin.quiz.show', compact('quiz'));
    //     }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:course_modules,id',
            'question' => 'required|string|max:255',
            'option_one' => 'nullable|string|max:255',
            'option_two' => 'nullable|string|max:255',
            'option_three' => 'nullable|string|max:255',
            'option_four' => 'nullable|string|max:255',
            'correct_answer' => 'nullable|string|max:255',
        ]);

        // Quiz::create($request->all());

        $quiz = new Quiz();
        $quiz->course_module_id = $request->module_id;
        $quiz->question = $request->question;
        $quiz->option_one = $request->option_one;
        $quiz->option_two = $request->option_two;
        $quiz->option_three = $request->option_three;
        $quiz->option_four = $request->option_four;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();

        return response()->json([
            'status' => true,
            'message' => 'Quiz created successfully.'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'module_id' => 'required|exists:course_modules,id',
            'question' => 'required|string|max:255',
            'option_one' => 'nullable|string|max:255',
            'option_two' => 'nullable|string|max:255',
            'option_three' => 'nullable|string|max:255',
            'option_four' => 'nullable|string|max:255',
            'correct_answer' => 'nullable|string|max:255',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->course_module_id = $request->module_id;
        $quiz->question = $request->question;
        $quiz->option_one = $request->option_one;
        $quiz->option_two = $request->option_two;
        $quiz->option_three = $request->option_three;
        $quiz->option_four = $request->option_four;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->update();

        // $quiz->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Quiz updated successfully.'
        ]);
    }



    public function getQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        return response()->json($quiz);
    }




    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return response()->json([
            'status' => true,
            'message' => 'Quiz deleted successfully.'
        ]);
    }
}
