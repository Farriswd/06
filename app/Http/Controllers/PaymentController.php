<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Stripe\BaseStripeClient;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentController extends Controller
{
    public function index() {
        return inertia('Payment/Index');
    }

    public function store(Request $request) {
        $request->validate([
            'quantity' => 'required|integer'
        ]);

        $user = auth()->user();

        try {
            DB::beginTransaction();
            //stripe payment
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'SA point',
                        ],
                        'unit_amount' => 10,
                    ],
                    'quantity' => $request->quantity
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' =>route('payment.cancel')
            ]);

            $paymentData = [
                'user_id' => $user->id,
                'amount' => (float) $request->quantity * 0.1,
                'quantity' => $request->quantity,
                'status' => 'pending',
                'session_id' => $checkout_session->id,
                'type' => 'stripe'
            ];

            $payment = Payment::create($paymentData);
            if (!$payment) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Payment create problem!');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Payment error:'.$e->getMessage());
        }

        return Inertia::location($checkout_session->url);

    }

    public function success(Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        try {
            DB::beginTransaction();
            $session = Session::retrieve($sessionId);
            if (!$session) throw new NotFoundHttpException();
            $payment = Payment::where('session_id', $session->id)->first();
            if (!$payment) throw new NotFoundHttpException();
            if ($payment->status === 'pending') {
                $payment->update(['status' => 'success']);
                $payment->user->balance += $payment->quantity;
                $payment->user->save();
            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            throw new NotFoundHttpException();
        }
        return inertia('Payment/Success');
    }

    public function cancel() {
        return inertia('Payment/Cancel');
    }
}
