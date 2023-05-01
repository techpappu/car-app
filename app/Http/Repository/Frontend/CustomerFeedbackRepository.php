<?php

namespace App\Http\Repository\Frontend;

use App\Models\CustomerFeedback;
use App\Models\FeedbackFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
class CustomerFeedbackRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        $customerFeedback = CustomerFeedback::select([
            'customer_feedback.id as customer_feedback_id','cars.id', 'cars.title', 'cars.model_year', 'customer_feedback.description', 'customer_feedback.rating', 'customer_feedback.type', 'users.name as userName', 'users.image as userImage'
        ])
            ->join('cars', 'cars.id', '=', 'customer_feedback.car_id')
            ->join('users', 'users.id', '=', 'customer_feedback.user_id')
            ->orderBy('customer_feedback_id', 'desc')
           /*  ->with([
                'feedbackFile' => function($q) {
                    $q->select([
                        'id', 'customer_feedback_id','file_name'
                    ]);
                }
                ]) */
            ->get();
           

        return $customerFeedback;
    }

    public static function getFileById($id)
    {
        return FeedbackFile::orderBy('id', 'desc')
        ->where('customer_feedback_id', $id)
            ->get();
    }

    public static function store($request)
    {

      
            $customerFeedback = new CustomerFeedback();
            $customerFeedback->user_id = Auth::user()->id;
            $customerFeedback->car_id = $request->car_id;
            $customerFeedback->description = $request->description;
            $customerFeedback->rating = $request->rating;        
            $customerFeedback->save();

            if ($request->hasfile('images')) {
          
                foreach ($request->file('images') as $imgFile) {
                    $uniqueName = md5($imgFile->getClientOriginalName() . time()) . '.' . $imgFile->extension();
                $file = config('constant.image_file_path_review') . $uniqueName;

                if (!file_exists(config('constant.image_file_path_review'))) {
                    // path does not exist
                    mkdir(config('constant.image_file_path_review'), 0777, true);
                }
                $contents = file_get_contents($imgFile);
                file_put_contents($file, $contents);
                $uploaded_file = new UploadedFile($file, $uniqueName);

                $feedbackFile = new FeedbackFile();
                $feedbackFile->file_name = $uniqueName;
                $feedbackFile->customer_feedback_id = $customerFeedback->id;
                $feedbackFile->save();
                }
                
            }

        return $customerFeedback;
    }
}
