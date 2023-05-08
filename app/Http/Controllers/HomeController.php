<?php
namespace App\Http\Controllers;

use App\Models\RehabCenter;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Session;
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

 
    public function contactUs()
    {
          SEOMeta::setRobots('index, follow');
              OpenGraph::addProperty('type', 'website');
              JsonLd::setType('website');
              SEOTools::setTitle('Contact');
              SEOTools::setDescription('Rehab Contact Us');
              SEOMeta::addKeyword('Rehab contact');
             SEOTools::opengraph()->setUrl(url('/contact'));
             
        return view("frontend.contact");
    }
    public function contactStore(Request $request)
    {
       
          SEOMeta::setRobots('index, follow');
              OpenGraph::addProperty('type', 'website');
              JsonLd::setType('website');
              SEOTools::setTitle('Contact');
              SEOTools::setDescription('Rehab Contact Us');
              SEOMeta::addKeyword('Rehab contact');
             SEOTools::opengraph()->setUrl(url('/contact'));
             $this->validate($request, [
                'name' => 'required|min:1|max:80',
                'email' => 'required|email|min:5|max:60',
                'message' => 'required|min:1|max:5000',
                
          
              ]);
              $name = $request->name;
              $email = $request->email;
             $message = $request->message;
          
              $msg = '
          <html>
          <head>
            <title>Mail from ' . $name . '</title>
          </head>
          <body>
            <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
             <tr style="height: 32px;">
               <th align="right" style="width:150px; padding-right:5px;">Name:</th>
               <td align="left" style="padding-left:5px; line-height: 20px;">' . $name . '</td>
             </tr>
             
             <tr style="height: 32px;">
               <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
               <td align="left" style="padding-left:5px; line-height: 20px;">' . $email . '</td>
             </tr>
             <tr style="height: 32px;">
               <th align="right" style="width:150px; padding-right:5px;">Message:</th>
               <td align="left" style="padding-left:5px; line-height: 20px;">' . $message . '</td>
             </tr>
            </table>
          </body>
          </html>
          ';
          
              $headers = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
              $headers .= 'From: ' . $email . "\r\n";
          
              if (mail(Helper::setting()->email, 'Contact Mail', $msg, $headers)) {
                Session::flash('message', 'Message Sent Successfully!');
                return redirect()->back();
              } else {
                Session::flash('message', 'Something went wrong! Please try again !');
                return redirect()->back();
              }
              return redirect()->back();
        return view("frontend.contact");
    }


    public function aboutUs()
    {
          SEOMeta::setRobots('index, follow');
              OpenGraph::addProperty('type', 'website');
              JsonLd::setType('website');
              SEOTools::setTitle('Contact');
              SEOTools::setDescription(' About Us');
              SEOMeta::addKeyword('About Us');
             SEOTools::opengraph()->setUrl(url('/about'));
             
        return view("frontend.about");
    }
   
}
