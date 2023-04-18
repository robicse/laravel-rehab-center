<?php
namespace App\Http\Controllers;

use App\Models\RehabCenter;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
class HomeController extends Controller
{
    public function index(){
        SEOMeta::setRobots('index, follow');
        OpenGraph::addProperty('type', 'website');
        JsonLd::setType('website');
        SEOTools::setTitle('Rehab List');
        SEOTools::setDescription('Rehab List');
        SEOMeta::addKeyword('SohiBD');
       SEOTools::opengraph()->setUrl(url('/'));
       
  return view("frontend.welcome");
    }
    public function main()
    {
          SEOMeta::setRobots('index, follow');
              OpenGraph::addProperty('type', 'website');
              JsonLd::setType('website');
              SEOTools::setTitle('Rehab List');
              SEOTools::setDescription('Rehab List');
              SEOMeta::addKeyword('Rehab');
             SEOTools::opengraph()->setUrl(url('/'));
             
        return view("frontend.index");
    }

    public function aboutUs(){
        return view("frontend.pages.about_us");
    }


// for home page search
    public function search(Request $request){
        SEOMeta::setRobots('index, follow');
              OpenGraph::addProperty('type', 'website');
              JsonLd::setType('website');
              SEOTools::setTitle('Rehab Center Search');
              SEOTools::setDescription('Rehab Center Search List');
              SEOMeta::addKeyword('Rehab');
             SEOTools::opengraph()->setUrl(url('/search'));
        $id=$request->keyword;
      if(!empty($id)){
      $data= RehabCenter::wherestatus(1)->where('zip_code','LIKE','%'.urldecode($id).'%')->select('slug','rehab_name','image','id','zip_code','short_description')->latest()->limit(6)->get();
      if($data){
         return view('frontend.rehab_centers.search_result')->with('searchresult',$data);
      }
     else{
        return view('frontend.rehab_centers.search_result');
        //   return back();
     }
      }
       else{
        return view('frontend.rehab_centers.search_result');
        //   return back();
     }


    }

   
}
