<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    //
    private $deliveryAddress;
    private $order;
    private $orderItems;
    private $customer;
    public function __construct(DeliveryAddress $deliveryAddress, Order $order, OrderItem $orderItems,Customer $customer)
    {
        $this->deliveryAddress = $deliveryAddress;
        $this->order = $order;
        $this->orderItems = $orderItems;
        $this->customer = $customer;
    }
    public function index()
    {
        //Setting icon
        $settings  = Setting::all();
        //Menu
        $menuParent = Menu::where('parent_id', 0)->get();

        //Encrypt Cookie App\Http\Encryptcookie

        $productsOfCartFromLocal = json_decode(Cookie::get('productsOfCart'));
        if (!empty($productsOfCartFromLocal)) {
            $products = [];
            foreach ($productsOfCartFromLocal as $item) {
                $product = Product::find($item->id);
                array_push($products, $product);
            }
            return view('checkout.checkout', compact('settings', 'menuParent', 'products', 'productsOfCartFromLocal'));
        }
        return view('checkout.checkout', compact('settings', 'menuParent'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderSuccess(Request $request)
    {

        DB::beginTransaction();
        try {
            //check middle name
            if (!empty($request->input('middlename'))) {
                $fullname = $request->input('firstname') . ' ' . $request->input('middlename') . ' ' . $request->input('lastname');
            } else {
                $fullname = $request->input('firstname') . ' ' . $request->input('lastname');
            }
            //custome address
            $address = $request->input('address') . ', ' . $request->ward . ', ' . $request->district . ', ' . $request->province;
            //create dia chi nhan hang delivery address
            // dd($request->input('phone'));
            $deliveryAddress = $this->deliveryAddress->create([
                "fullname" => $fullname,
                "phone" => $request->input('phone'),
                "address" => $address
            ]);
            //create customer
            $dataCustomer = [];
            if(auth()->check()){
                $dataCustomer["user_id"]=auth()->id();
                $dataCustomer["username"]=auth()->user()->email;
            }
            $customer = $this->customer->create($dataCustomer);
            //create don hang order
            $dataOrder = [
                "delivery_address_id" => $deliveryAddress->id,
                "customer_id" => $customer->id,
                "total"=>$request->input('total')
            ];
            //check kháchh hàng có để lại ghi chú không
            if(!empty($request->input('notes'))){
                $dataOrder["notes"] = $request->input('notes');
            }
            $order = $this->order->create($dataOrder);

            //list order item (san pham trong don hang)
            $products = Product::all();
            $productsOfCartFromLocal = json_decode(Cookie::get('productsOfCart'));

            foreach ($productsOfCartFromLocal as $productOfCart) {
                foreach ($products as $product) {
                    if($product->id==$productOfCart->id){
                        $this->orderItems->create([
                            "order_id"=>$order->id,
                            "product_id"=>$product->id,
                            "quantity"=>$productOfCart->quan,
                            //price sau nay co the customize allow voucher,coupon,sale
                            "price"=>$product->price
                        ]);
                        break;
                    }
                }
            }
            DB::commit();
            return redirect(route('home'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Message ' . $th->getMessage() . ' Line ' . $th->getLine());
        }
    }
}
