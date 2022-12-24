<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Notification;

class OrderController extends Controller
{
    public $order;

    public function manageOrder(){
        return view('admin.order.manage_order',[
            'orders'=>Order::all()
        ]);
    }

    public function delivered($id){
        $order=Order::find($id);
        $order->delivery_status='Delivered';
        $order->payment_status='Paid';
        $order->save();
        return redirect()->back();
    }

    public function canceled($id){
        $order=Order::find($id);
        $order->delivery_status='Canceled';
        if ($order->payment_status=='cash on delivery'){
            $order->payment_status='cash on delivery';
        }
        else{
            $order->payment_status='MoneyBack as soon';
        }
        $order->save();
        return redirect()->back();
    }


    //  ----  Order Pdf  ------ //
    public function printPdf($id){
        $order = Order::find($id);
        $pdf = Pdf::loadView('admin.pdf.print_pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }


    //  ----  Send Email Notification( Admin send to User) ------ //
    public function sendEmail($id){
        return view('admin.email.send_email',[
            'orders'=>Order::find($id)
        ]);
    }

    public function addSendMail(Request $request, $id){
        $order = Order::find($id);

        $email = [
            'greeting'    => $request->greeting,
            'body'        => $request->body,
            'action_text' => $request->action_text,
            'url'         => $request->url,
            'end_part'    => $request->end_part
        ];

        Notification::send($order,new SendEmailNotification($email));

        return redirect()->back()->with('message','Email send has been Successfully');
    }



    //  ----  Order search  ------ //
    public function searchOrder(Request $request){
//        Order::newSearchOrder($request);
        $searchText = $request->search;
        return view('admin.order.manage_order',[
            'orders'=> Order::where('customer_name','LIKE',"%$searchText%")
                ->orWhere('email','LIKE',"%$searchText%")
                ->orWhere('product_name','LIKE',"%$searchText%")
                ->get()
        ]);
    }
}
