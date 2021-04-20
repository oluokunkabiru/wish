<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\Templatesetup;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }


    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $userid =  $paymentDetails['data']['metadata']['user_id'];
        $themeid =  $paymentDetails['data']['metadata']['theme_id'];
        $templateid =  $paymentDetails['data']['metadata']['template_id'];
        $event = Template::where('id', $templateid)->first();
        $template = Templatesetup::where('theme_id', $themeid)->first();
        $theme = Theme::with(['user', 'category', 'media'])->where('id', $themeid)->first();

        $event->templatesetup_id = $template->id;
        $event->payment_id = "KOADIT_".$themeid."_".$userid."_".$templateid."_".$event->name;
        $event->payment_data = json_encode($paymentDetails);
        $event->update();
        return redirect(route('userPreseupTemplateChoosed', [$event->id, str_replace(" ", "-", $event->name), $theme->id, str_replace(" ", "-", $theme->category->name)]));
        //   return  json_encode($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}