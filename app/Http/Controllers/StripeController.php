<?php

namespace App\Http\Controllers;

use App\Models\AssignCourse;
use App\Models\Course;
use Stripe;
use Exception;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
    public function payStripe(Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);

        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )
            ));
            if (!isset($response['id'])) {
                return redirect()->route('addmoney.paymentstripe');
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'USD',
                'amount' =>  $request->price,
                'description' => 'pay course price',
            ]);

            if ($charge['status'] == 'succeeded') {
                $course = AssignCourse::query()
                    ->where('course_id', $request->courseId)
                    ->where('student_id', $request->studentId)
                    ->first();
                $course->payment = 'paid';
                $course->save();
                return redirect('stripe')->with('success', 'Payment Success!');
            } else {
                return redirect('stripe')->with('error', 'something went to wrong.');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
