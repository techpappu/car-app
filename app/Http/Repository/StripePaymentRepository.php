<?php

namespace App\Http\Repository;

use App\Models\Car;
use App\Models\CertificationFile;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\UploadedFile;
use App\Models\File;

class StripePaymentRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function userOrderList()
    {
        $orders = Order::select([
            'id', 'order_number', 'item_total_price', 'delivery_charge', 'total_quantity', 'total_price',
            'user_name', 'user_email', 'phone', 'address', 'status', 'isPaid', 'order_date',
        ])
            ->with([
                'orderItems' => function ($q) {
                    $q->select([
                        'id', 'order_id', 'car_id', 'quantity', 'unit_price', 'total_price',
                    ]);
                },
                'orderItems.car' => function ($q) {
                    $q->select('id', 'title');
                },
            ])
            ->orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));

        return $orders;
    }

    public static function findById($id)
    {
        return Order::find($id);
    }

    public static function update($order, $request)
    {
        $order->status = $request->status;
        if ($request->status == 2 || $request->status == 6) {
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            foreach ($orderItems as $item) {
                $car = Car::find($item->car_id);
                if ($request->status == 2) {
                    $car->car_sold_status = 3;
                } else if ($request->status == 6) {
                    $car->car_sold_status = 1;
                }

                $car->update();
            }
        }
        return $order->update();
    }

    public static function getOrderById($id)
    {
        $orders = Order::select([
            'id', 'order_number', 'item_total_price', 'delivery_charge', 'total_quantity', 'total_price', 'payment_type',
            'user_name', 'user_email', 'phone', 'address', 'status', 'isPaid', 'order_date', 'user_message',
        ])
            ->with([
                'orderItems' => function ($q) {
                    $q->select([
                        'id', 'order_id', 'car_id', 'quantity', 'unit_price', 'total_price',
                    ]);
                },
                'orderItems.car' => function ($q) {
                    $q->select('id', 'title');
                },
            ])
            ->whereId($id)
            ->first();

        return $orders;
    }

    public static function orderAdminInfo($id)
    {
        $orders = Order::select([
            'id', 'ship_name', 'voyage_no', 'ship_date', 'est_arrival_date', 'discount', 'invoice_no',
            'invoice_date', 'inspec_request_date', 'tracking_no', 'shipping_date', 'cons_name', 'cons_address', 'cons_phone', 'cons_country',
            'cons_city', 'cons_shipper', 'cons_email'
        ])
           
            ->whereId($id)
            ->first();

        return $orders;
    }

    public static function orderInfoUpdate($order, $request)
    {
        if ($request->has('ship_name')) {
            $order->ship_name = $request->ship_name;
        }
       
        if ($request->has('voyage_no')) {
            $order->voyage_no = $request->voyage_no;
        }

        if ($request->has('ship_date')) {
            $ship_date = $request->ship_date != null ? strtotime($request->ship_date) : null;
            if ($ship_date != null) {
                $date = date('Y-m-d', $ship_date);
                $order->ship_date = $date;
            }
        }
        if ($request->has('est_arrival_date')) {
            $est_arrival_date = $request->est_arrival_date != null ? strtotime($request->est_arrival_date) : null;
            if ($est_arrival_date != null) {
                $date = date('Y-m-d', $est_arrival_date);
                $order->est_arrival_date = $date;
            }
        }

        if ($request->has('discount') && !is_null($request->discount)) {
            $order->discount = $request->discount;
        }
        if ($request->has('invoice_no')) {
            $order->invoice_no = $request->invoice_no;
        }
        
        if ($request->has('invoice_date')) {
            $invoice_date = $request->invoice_date != null ? strtotime($request->invoice_date) : null;
            if ($invoice_date != null) {
                $date = date('Y-m-d', $invoice_date);
                $order->invoice_date = $date;
            }
        }
        
        if ($request->has('inspec_request_date')) {
            $inspec_request_date = $request->inspec_request_date != null ? strtotime($request->inspec_request_date) : null;
            if ($inspec_request_date != null) {
                $date = date('Y-m-d', $inspec_request_date);
                $order->inspec_request_date = $date;
            }
        }

        if ($request->has('tracking_no')) {
            $order->tracking_no = $request->tracking_no;
        }

        if ($request->has('shipping_date')) {
            $shipping_date = $request->shipping_date != null ? strtotime($request->shipping_date) : null;
            if ($shipping_date != null) {
                $date = date('Y-m-d', $shipping_date);
                $order->shipping_date = $date;
            }
        }

        if ($request->has('cons_name')) {
            $order->cons_name = $request->cons_name;
        }

        if ($request->has('cons_address')) {
            $order->cons_address = $request->cons_address;
        }

        if ($request->has('cons_phone')) {
            $order->cons_phone = $request->cons_phone;
        }
        if ($request->has('cons_country')) {
            $order->cons_country = $request->cons_country;
        }

        if ($request->has('cons_city')) {
            $order->cons_city = $request->cons_city;
        }
        if ($request->has('cons_shipper')) {
            $order->cons_shipper = $request->cons_shipper;
        }

        if ($request->has('cons_email')) {
            $order->cons_email = $request->cons_email;
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $imgFile) {
                $original_file_name = $imgFile->getClientOriginalName();
                $uniqueName = md5($imgFile->getClientOriginalName() . time()) . '.' . $imgFile->extension();
                $file = config('constant.image_order_doc') . $uniqueName;

                if (!file_exists(config('constant.image_order_doc'))) {
                    // path does not exist
                    mkdir(config('constant.image_order_doc'), 0777, true);
                }
                $contents = file_get_contents($imgFile);
                file_put_contents($file, $contents);
                $uploaded_file = new UploadedFile($file, $uniqueName);
                //create FIle model
                $file = new File([
                    'file_name' => $uniqueName,
                    'original_file_name' => $original_file_name,
                    'extension' => $uploaded_file->extension(),
                    'path' => config('constant.image_order_doc') .
                        $uniqueName
                ]);
                $order->files()->create($file->toArray());
            }
        }
        $order->update();

        return true;
    }

    public static function orderAttachedCertificate($order, $request)
    {
       
        if ($request->hasfile('english_file')) {
            $imgFile = $request->file('english_file');
          
            $original_file_name = $imgFile->getClientOriginalName();
            $uniqueName = md5($imgFile->getClientOriginalName() . time()) . '.' . $imgFile->extension();
            $file = config('constant.image_order_doc') . $uniqueName;

            if (!file_exists(config('constant.image_order_doc'))) {
                // path does not exist
                mkdir(config('constant.image_order_doc'), 0777, true);
            }
            $contents = file_get_contents($imgFile);
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $uniqueName);
            //create FIle model
            $file = new CertificationFile([
                'file_name' => $uniqueName,
                'original_file_name' => $original_file_name,
                'extension' => $uploaded_file->extension(),
                'certificate_type' => 1,
                'path' => config('constant.image_order_doc') .
                    $uniqueName
            ]);
            
            $certificateEng = CertificationFile::where('fileable_id', $order->id)
            ->where('certificate_type', 1)
            ->get()->first();
            if($certificateEng){
                $certificateEng->delete();
                unlink(config('constant.image_order_doc') . $certificateEng->file_name);
            }
            
            $order->filesCertificate()->create($file->toArray());
            
        }

        if ($request->hasfile('japanese_file')) {
            $imgFile = $request->file('japanese_file');
            $original_file_name = $imgFile->getClientOriginalName();
            $uniqueName = md5($imgFile->getClientOriginalName() . time()) . '.' . $imgFile->extension();
            $file = config('constant.image_order_doc') . $uniqueName;

            if (!file_exists(config('constant.image_order_doc'))) {
                // path does not exist
                mkdir(config('constant.image_order_doc'), 0777, true);
            }
            $contents = file_get_contents($imgFile);
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $uniqueName);
            //create FIle model
            $file = new CertificationFile([
                'file_name' => $uniqueName,
                'original_file_name' => $original_file_name,
                'extension' => $uploaded_file->extension(),
                'certificate_type' => 2,
                'path' => config('constant.image_order_doc') .
                    $uniqueName
            ]);
            
              $certificateJP = CertificationFile::where('fileable_id', $order->id)
            ->where('certificate_type', 2)
            ->get()->first();
            if($certificateJP){
                $certificateJP->delete();
                unlink(config('constant.image_order_doc') . $certificateJP->file_name);
            }
            $order->filesCertificate()->create($file->toArray());
          
        }
        return true;
    }
}
