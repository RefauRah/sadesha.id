<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Faq;

class FaqController extends Controller
{
    public function all()
    {
        $faq = Faq::all();
        $data = [
            'title' => 'Frequently Asked Questions ',
            'route' => route('faq.create'),
            'faq' => $faq,
            'breadcrumb' => 'FAQ'
        ];
                  
        return view('admin.faq.index', $data);        
    }

    public function create()
    {
        $data = [
            'title' => 'Frequently Asked Questions ',                        
            'breadcrumb' => 'FAQ / Create'
        ];
        return view('admin.faq.create',$data);
    }

    public function store(Request $request)
    {
        try{
            $faq = new Faq();
            $faq->question = $request['question'];
            $faq->answer = $request['answer'];
            $faq->save();
        }catch(\Exception $e){
            return redirect('/kelola/faq');
        }

        return redirect(route('faq.all'));
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $data = [
            'title' => 'Frequently Asked Questions ', 
            'faq' => $faq,                       
            'breadcrumb' => 'FAQ / Edit'
        ];
        
        return view('admin/faq/edit', $data);
    }

    public function update(Request $request)
    {
        try{
            $faq = Faq::findOrFail($request['id']);
            $faq->question = $request['question'];
            $faq->answer = $request['answer'];
            $faq->save();
        }catch(\Exception $e){
            // die('gagal'.$e);
        }
        return redirect(route('faq.all'));
    }

    public function delete(Request $request)
    {
        try{
            $id = $request['id'];
            $faq = Faq::findOrFail($id);
            $faq->delete();
        }catch(\Exception $e){
            //
        }

        return redirect(route('faq.all'));
    }
}
