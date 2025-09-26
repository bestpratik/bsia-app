@extends('frontend.layout.front-layout')
@section('content')
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .course-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.08);
            background: #fff;
            height: 100%;
        }

        .course-card img {
            height: 350px;
            width: 100%;
            object-fit: cover;
        }

        .course-overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75), transparent);
        }

        .form-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.08);
            padding: 35px;
        }

        .form-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        .section-title {
            font-weight: 600;
            font-size: 1rem;
            margin-top: 20px;
            margin-bottom: 12px;
            color: #6b1d1d;
            border-left: 4px solid #b52a2a;
            padding-left: 10px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #b52a2a, #911f1f);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #911f1f, #6b1d1d);
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 12px;
        }

        label {
            font-weight: 500;
            margin-bottom: 6px;
        }

        textarea {
            resize: none;
        }

        .total-box {
            background: #fafafa;
            border-radius: 8px;
            padding: 12px 18px;
            margin-bottom: 20px;
            border: 1px solid #eee;
        }

        .total-box h5 {
            margin: 0;
            font-weight: 600;
            color: #6b1d1d;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>

    <div class="container my-5">
        <div class="row g-4">
            <!-- Left Column: Item Info -->
            <div class="col-md-6">
                <div class="course-card">
                    <div class="position-relative">
                        <img src="{{ asset('uploads/' . $item->featured_image) }}" alt="{{ $item->title }}">
                        <div class="course-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end">
                            <div class="p-4">
                                <span
                                    class="badge bg-danger mb-2">{{ $itemType === 'course' ? 'Mentorship Program' : 'E-Book' }}</span>
                                <h2 class="text-white fw-bold">{{ $item->title }}</h2>
                                @if ($itemType === 'course')
                                    <div class="d-flex flex-wrap text-white-50 small gap-3">
                                        <div><i class="fas fa-user-tie me-2"></i>By {{ $item->instructor_name }}</div>
                                        <div><i class="fas fa-clock me-2"></i>Beginner Friendly</div>
                                        <div><i class="fas fa-language me-2"></i>{{ $item->language }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Purchase Form -->
            <div class="col-md-6">
                <div class="form-card">
                    <h3 class="form-title">Purchase Form</h3>
                    <form id="purchaseForm" method="POST">
                        @csrf

                        <!-- Total -->
                        <div class="total-box d-flex justify-content-between align-items-center">
                            <h5>Total</h5>
                            <span class="fw-bold text-danger">
                                @if ($itemType === 'course')
                                    ₹{{ number_format($item->sellable_price, 2) }}
                                @else
                                    ₹{{ number_format($item->price, 2) }}
                                @endif
                            </span>
                        </div>

                        <!-- Hidden Inputs -->
                        @if ($itemType === 'course')
                            <input type="hidden" name="course_id" value="{{ $item->id }}">
                            <input type="hidden" name="price" value="{{ $item->sellable_price }}">
                        @else
                            <input type="hidden" name="ebook_id" value="{{ $item->id }}">
                            <input type="hidden" name="price" value="{{ $item->price }}">
                        @endif

                        <!-- Contact Details -->
                        <div class="section-title">Contact Details</div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="billing_name" class="form-control"
                                    placeholder="Enter your full name"
                                    value="{{ old('billing_name', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->name : '') }}">
                                <small class="text-danger error-billing_name"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" name="billing_email" class="form-control"
                                    placeholder="Enter your email"
                                    value="{{ old('billing_email', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->email : '') }}">
                                <small class="text-danger error-billing_email"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">WhatsApp Number<span class="text-danger">*</span></label>
                                <input type="tel" name="billing_phone" class="form-control"
                                    placeholder="Enter your WhatsApp number"
                                    value="{{ old('billing_phone', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->phone : '') }}">
                                <small class="text-danger error-billing_phone"></small>
                            </div>
                        </div>

                        <!-- Billing Address -->
                        <div class="section-title">Billing Address</div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Country<span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control" placeholder="Enter your country"
                                    value="{{ old('country', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->country : '') }}">
                                <small class="text-danger error-country"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">State<span class="text-danger">*</span></label>
                                <input type="text" name="state" class="form-control" placeholder="Enter your state"
                                    value="{{ old('state', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->state : '') }}">
                                <small class="text-danger error-state"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City<span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" placeholder="Enter your city"
                                    value="{{ old('city', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->city : '') }}">
                                <small class="text-danger error-city"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Full Address<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" rows="3" placeholder="Enter your complete billing address">{{ old('address', Auth::check() && Auth::user()->role !== 'admin' ? Auth::user()->address : '') }}</textarea>
                                <small class="text-danger error-address"></small>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div class="section-title">Payment Details</div>
                        <div class="mb-3">
                            <label class="form-label">Payment Method<span class="text-danger">*</span></label>
                            <select class="form-select" name="payment_method">
                                <option value="">Select Payment Method</option>
                                <option value="credit">Credit Card</option>
                                <option value="debit">Debit Card</option>
                                <option value="upi">UPI</option>
                                <option value="netbanking">Net Banking</option>
                            </select>
                            <small class="text-danger error-payment_method"></small>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-lock me-2"></i> Confirm & Proceed to Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 + jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $("form#purchaseForm").on("submit", function(e) {
            e.preventDefault();
            let $form = $(this);
            let $btn = $form.find("button[type=submit]");
            let formData = $form.serialize();

            $.ajax({
                url: "{{ route('purchase.store') }}",
                type: "POST",
                data: formData,
                dataType: "json",
                beforeSend: function() {
                    $btn.prop('disabled', true).html(
                        '<i class="fas fa-spinner fa-spin me-2"></i>Processing...');
                    $(".text-danger").text("");
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: response.message,
                        }).then(() => {
                            // redirect to dashboard to reflect new purchase
                            window.location.href = "{{ route('dashboard') }}";
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: response.message || "Server error"
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $(".error-" + key).text(value[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: xhr.responseJSON && xhr.responseJSON.message ? xhr
                                .responseJSON.message : "Something went wrong"
                        });
                    }
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Confirm & Proceed to Payment');
                }
            });
        });
    </script>
@endsection
