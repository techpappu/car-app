<?php

namespace App\Http\Repository;

use App\Models\FAQ;

class FAQRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return FAQ::orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function store($request)
    {
        $faq = new FAQ();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->position = $request->position;
        $faq->save();
        return $faq;
    }

    public static function findById($id)
    {
        return FAQ::find($id);
    }

    public static function update($faq, $request)
    {
        if ($request->has('question')) {
            $faq->question = $request->question;
        }

        if ($request->has('answer')) {
            $faq->answer = $request->answer;
        }
        if ($request->has('position')) {
            $faq->position = $request->position;
        }
       
        $faq->update();

        return true;
    }

    public static function delete($faq)
    {
        return $faq->delete();
    }
}
