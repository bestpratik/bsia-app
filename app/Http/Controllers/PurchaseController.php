<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\CourseLesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Store a new purchase (course or ebook)
     */
    public function store(Request $request)
    {
        // ✅ Custom validation messages
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

        // ✅ Common rules
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

        // ✅ At least one of course_id or ebook_id must be present
        if ($request->has('course_id')) {
            $rules['course_id'] = 'required|integer';
        } elseif ($request->has('ebook_id')) {
            $rules['ebook_id'] = 'required|integer';
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid purchase: Course or Ebook ID is required.'
            ], 422);
        }

        $request->validate($rules, $messages);

        DB::beginTransaction();
        try {
            // 1️⃣ Determine if user is logged in
            if (Auth::check()) {
                // Use logged-in user
                $user = Auth::user();
            } else {
                // Guest user: create or fetch existing by email
                $user = User::firstOrCreate(
                    ['email' => $request->billing_email],
                    [
                        'name'     => $request->billing_name,
                        'password' => Hash::make('password123'),
                        'role'     => 'guest'
                    ]
                );

                // Always update name (optional: do not overwrite role if existing user)
                $user->update([
                    'name' => $request->billing_name,
                    'role' => $user->wasRecentlyCreated ? 'guest' : $user->role
                ]);
            }

            // 2️⃣ Determine course type
            if ($request->has('course_id')) {
                $referenceId = $request->course_id;
                $courseType  = 'course';
            } else {
                $referenceId = $request->ebook_id;
                $courseType  = 'ebook';
            }

            // 3️⃣ Create Order
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

            // 4️⃣ Create Purchase
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

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => ucfirst($courseType) . ' purchased successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
}