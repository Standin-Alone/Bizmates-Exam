<?php

namespace App\Modules\OrderReport\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;

class OrderReportController
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("OrderReport::index");
    }



    public function generate_report()
    {

        $order_date = request('order_date');
        $report_type = request('report_type');
        $limit = request('limit_condition');
        $result = [];

        $headers =  ['X-Shopify-Access-Token' => env('SHOPIFY_TOKEN')];


        $order_year_month = date('Y-m', strtotime($order_date));

        
        $fields = '';

        if ($report_type === 'Addresses') {
            $fields = 'name,customer,line_items,shipping_lines,current_total_price,current_total_tax,note,note_attributes,tags';
        } else if ("report_type" == "Packing") {
            $fields = 'name,customer,line_items,shipping_lines,current_total_price,current_total_tax,tags';
        } else {
            $fields = 'name,line_items,tags';
        }


        try {

            $client = new \GuzzleHttp\Client();

            $api_url = "https://cultivated-test-store.myshopify.com/admin/api/$order_year_month/orders.json?limit=$limit&fields=$fields&status=open";
            
            $response = $client->get($api_url, ['headers' => $headers]);
            


            $clean_response = json_decode($response->getBody(), true);

            $orders = $clean_response['orders'];
            $final_result = [];
            $headers = [];

            if ($report_type === 'Addresses') {

                foreach ($orders as $value) {
                    
                    $clean_tag = date('Y-m-d',strtotime($value["tags"]));
          
                    if ($clean_tag == $order_date) {
                        
                      


                        $customer =  $value['customer'];
                        $items =  $value['line_items'];
                        $shipping =  $value['shipping_lines'];
                        $gift_note  =  $value['note_attributes'] ?  $value['note_attributes'][1]['value']  : '';

                        $total_quantity = 0;
                        $total_shipping = 0;

                        foreach ($items as $item_value) {
                            $total_quantity += $item_value['quantity'];
                        }

                        foreach ($shipping as $shipping_value) {
                            $total_shipping += $shipping_value['price'];
                        }

                        $total_amount = $value['current_total_price'] + $value['current_total_tax'] + $total_shipping;


                        $addresses_array = [
                            "order_name" => $value['name'],
                            "first_name" => $customer['first_name'],
                            "last_name" => $customer['first_name'],
                            "email" => $customer['email'],
                            "address" => $customer['default_address']['address1'] . ' ' . $customer['default_address']['address2'],
                            "city" => $customer['default_address']['city'],
                            "province" => $customer['default_address']['province'],
                            "country" => $customer['default_address']['country'],
                            "quantity" => $total_quantity,
                            "total_order_amount" =>  $total_amount,
                            "gift_notes" => $gift_note,
                            "order_notes" => $value['note']
                        ];

                        $headers = [
                            "Order Name",
                            "First Name",
                            "Last Name",
                            "Email",
                            "Address",
                            "City",
                            "Province",
                            "Country",
                            "Quantity",
                            "Total Amount of Order",
                            "Order Notes",
                            "Gift Notes"
                        ];
                        array_push($final_result, $addresses_array);
                    }
                }
            } else if ($report_type == "Packing") {

                foreach ($orders as $value) {
                    $clean_tag = date('Y-m-d',strtotime($value["tags"]));
        
                    if ($clean_tag == $order_date) {

                        $items =  $value['line_items'];
                        foreach ($items as $item_value) {
                            $packing_array = [
                                "order_name" => $value['name'],
                                "SKU"  => $item_value['sku'] != '' ? $item_value['sku'] : $item_value['name'],
                                "quantity" => $item_value['quantity'],
                                "price" => $item_value['price'],
                                "total_price" => $item_value['price'] * $item_value['quantity'],
                            ];

                            $headers = [
                                "Order Name",
                                "SKU",
                                "quantity",
                                "price",
                                "total_price"
                            ];

                            array_push($final_result, $packing_array);
                        }
                    }
                }
            } else {

                $temp_items = [] ;
                foreach ($orders as $value) {
                    $clean_tag = date('Y-m-d',strtotime($value["tags"]));
           
                    if ($clean_tag == $order_date) {

                        $items =  $value['line_items'];
                     
                        foreach ($items as $item_value) {
                            $daily_array = [
                                "sku"  => $item_value['sku'] != '' ? $item_value['sku'] : $item_value['name'],
                                "quantity" => $item_value['quantity'],
                                "total_price" => $item_value['price'] * $item_value['quantity'],
                            ];

                            $headers = [                                
                                "SKU",
                                "Total Quantity for the Day",
                                "Total Amount for the Day"
                            ];

                            array_push($temp_items, $daily_array);                            
                        }


                    }
                }

                
                $sku = array_unique(array_column($temp_items, 'sku'));
                        
             

                $new_sku = [];

                foreach($sku as $sku_val){
                    array_push($new_sku,[
                        "sku" => $sku_val,
                        "total_quantity" =>0,
                        "total_amount" =>0
                    ]);

                }
         

                foreach($temp_items as $value){                    
                    foreach($new_sku as &$item_sku){
                        if($value['sku'] == $item_sku["sku"]){                          
                            $item_sku["total_quantity"] += $value['quantity'];
                            $item_sku["total_amount"] += $value['total_price'];
                        }
                    }
                    
                }                
                
                $final_result = $new_sku;

            }



            if(count($final_result) == 0){
                return redirect()->back()->with('alert','No records found.');
            }else{
                $filename = ($report_type == 'Addresses' ? 'Addresses' : ($report_type == "Packing" ? "Packing Summary" : ($report_type == "Daily" ? "Daily Order Summary" : 'Test'))) . " (" . $order_date . ")";
                $download = Excel::store(new OrderExport($final_result, $headers), "$filename.csv", 'local');                
                return response()->download(storage_path('app/' . "$filename.csv"), "$filename.csv");    
            }           
            
        } catch (\Exception $error) {

            // return response()->json([
            //     "status" => false,
            //     "message" => $error->getMessage()
            // ]);
            return redirect()->back()->with('alert','No records found.');
        }
    }
}
