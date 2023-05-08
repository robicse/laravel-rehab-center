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
    public function index(Request $request){
        SEOMeta::setRobots('index, follow');
        OpenGraph::addProperty('type', 'website');
        JsonLd::setType('website');
        SEOTools::setTitle('Rehab List');
        SEOTools::setDescription('Rehab List');
        SEOMeta::addKeyword('SohiBD');
       SEOTools::opengraph()->setUrl(url('/'));
       $recentBlogs=Blog::wherestatus(1)->take(12)->get();
       $id=$request->q;
       if($id){
       $data=RehabCenter::wherestatus(1)->where('rehab_name','LIKE','%'.urldecode($id).'%')->paginate(18);
       }else{
        $data=RehabCenter::wherestatus(1)->latest()->paginate(18);
       }
  return view("frontend.rehab_centers.index",compact('recentBlogs'))->with('rehabListing',$data);
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
