<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\RehabCenter;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
class RehabController extends Controller
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
   
    public function show(Request $request, $id)
    { 
     $data =  RehabCenter::with('rehabslider','user','rehabreview')->whereslug(urldecode($id))->first();
    
      if($data){
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle(@$data->meta_title);
        SEOTools::setDescription(@$data->meta_description);
        JsonLd::addValues([json_decode(@$data->json_screma)]);
        SEOTools::opengraph()->setUrl(url('rehab-center',@$data->slug));
        OpenGraph::addImage(url($data->image), ['height' => 315, 'width' => 600]);
       $recentBlogs=Blog::wherestatus(1)->take(12)->get();
       $otherRehab=RehabCenter::wherestatus(1)->whereNot('id', $data->id)->inRandomOrder()->take(4)->get();
        return view('frontend.rehab_centers.show',compact('recentBlogs','otherRehab'))->with('rehabDetails',$data);
     }
     else{
       abort(404);
       }
}
   
}
