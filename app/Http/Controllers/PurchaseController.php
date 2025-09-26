<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    /**
     * Store a new purchase (course or ebook)
     */
    public function store(Request $request)
    {
        $messages = [
            'billing_name.required'   => 'Full Name is required.',
            'billing_email.required'  => 'Email is required.',
            'billing_email.email'     => 'Please enter a valid email address.',
            'billing_phone.required'  => 'WhatsApp number is required.',
            'country.required'        => 'Country is required.',
            'state.required'          => 'State is required.',
            'city.required'           => 'City is required.',
            'address.required'        => 'Full address is required.',
            'payment_method.required' => 'Please select a payment method.',
            'price.required'          => 'Price is required.',
            'price.numeric'           => 'Price must be a number.',
        ];

        $rules = [
            'billing_name'   => 'required|string|max:255',
            'billing_email'  => 'required|email|max:255',
            'billing_phone'  => 'required|string|max:20',
            'country'        => 'required|string|max:100',
            'state'          => 'required|string|max:100',
            'city'           => 'required|string|max:100',
            'address'        => 'required|string|max:500',
            'payment_method' => 'required|string',
            'price'          => 'required|numeric',
        ];

        // require either course_id or ebook_id depending on item_type
        $validated = $request->validate($rules, $messages);

        if ($request->filled('course_id')) {
            $referenceId = $request->course_id;
            $courseType  = 'course';
            $itemModel   = Course::find($referenceId);
            if (! $itemModel) {
                return response()->json(['status' => 'error', 'message' => 'Course not found.'], 404);
            }
        } elseif ($request->filled('ebook_id')) {
            $referenceId = $request->ebook_id;
            $courseType  = 'ebook';
            $itemModel   = Ebook::find($referenceId);
            if (! $itemModel) {
                return response()->json(['status' => 'error', 'message' => 'Ebook not found.'], 404);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'No item selected.'], 422);
        }


        DB::beginTransaction();
        try {
            // Get or create user
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                // For guests: create or fetch by email. Use a random password instead of a known one.
                $user = User::firstOrCreate(
                    ['email' => $request->billing_email],
                    [
                        'name'     => $request->billing_name,
                        'password' => Hash::make(Str::random(12)),
                        'role'     => 'guest',
                    ]
                );

                // update name if changed (don't overwrite role if existing)
                $user->update([
                    'name' => $request->billing_name,
                ]);
            }

            // Create order (marking completed here because this is a simple demo flow)
            $order = Order::create([
                'user_id'        => $user->id,
                'order_number'   => 'ORD-' . strtoupper(uniqid()),
                'reference_id'   => $referenceId,
                'payable_amount' => $request->price,
                'course_type'    => $courseType,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'status'         => 'pending',
                'order_date'     => now(),
                'payment_date'   => now(),
            ]);

            // Create purchase record (keep fields you already have)
            Purchase::create([
                'order_id'       => $order->id,
                'payable_amount' => $request->price,
                'billing_name'   => $request->billing_name,
                'billing_email'  => $request->billing_email,
                'billing_phone'  => $request->billing_phone,
                'country'        => $request->country,
                'state'          => $request->state,
                'city'           => $request->city,
                'address'        => $request->address,
                'payment_method' => $request->payment_method,
            ]);

            // Attach purchased item to user (so dashboard shows it)
            if ($courseType === 'course') {
                // attach course pivot
                $user->courses()->syncWithoutDetaching([$referenceId]);

                // // optional: attach lessons to user (if you track lesson access)
                // $lessonIds = CourseLesson::where('course_id', $referenceId)->pluck('id')->toArray();
                // foreach ($lessonIds as $lid) {
                //     DB::table('user_lessons')->updateOrInsert(
                //         ['user_id' => $user->id, 'lesson_id' => $lid],
                //         ['created_at' => now(), 'updated_at' => now()]
                //     );
                // }
            } else {
                // attach ebook pivot
                $user->ebooks()->syncWithoutDetaching([$referenceId]);
            }

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => ucfirst($courseType) . ' purchased successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Purchase.store error: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
}
