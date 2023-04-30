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

    public function getsearchValue(Request $request){
        if($request->has('keyword')){
            $data= RehabCenter::wherestatus(1)->where('zip_code','LIKE','%%%'.urldecode($request->keyword).'%%%')->select('zip_code','rehab_name','state_name','country_name')->take(10)->get();
            $results=array();
            foreach ($data as $v) {
                $results[]=['value'=>$v->zip_code.'-'. $v->state_name.'-'. $v->country_name.' - '.$v->rehab_name];
      
            }
            return response()->json($results);

        }else{
            $data= RehabCenter::wherestatus(1)->select('zip_code','rehab_name','state_name','country_name')->inRandomOrder()->take(10)->get();
            $results=array();
            foreach ($data as $v) {
                $results[]=['value'=>$v->zip_code.'-'. $v->state_name.'-'. $v->country_name.' - '.$v->rehab_name];
      
            }
            return response()->json($results);
        }
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
        $id= explode('-',@$request->keyword);
       $data= RehabCenter::wherestatus(1)->where('zip_code','LIKE','%%%'.urldecode(@$id[0]).'%%%')->select('slug','rehab_name','image','id','zip_code','short_description','country_name','state_name','phone_number','address')->latest()->paginate(10);
     return view('frontend.rehab_centers.search_result')->with('searchresult',$data);
     
     
    }





   
}
