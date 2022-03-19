<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageType;
use Illuminate\Support\Str;

use App\Models\LandingPages;
use App\Models\LandingPageSocialMedias;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller
{
    public function index()
    {
       
        $params = array('btn_name' => 'CMS Pages', 'btn_fn_param' => '', 'btn_href' => route('pages.add') );
        $result = LandingPages::where('status', '=', 1)->get();

        return view('crm.cms.index', $params, compact('result'));
    }

    public function add(Request $request, $id = '' ) {
        $params['id'] = $id;
        $params['pagetype'] = PageType::where('status', 1)->get();
        return view('crm.cms.add', $params);
    }

    public function edit(Request $equest, $id=null)
    {
        $params['id'] = $id;
        $params['pagetype'] = PageType::where('status', 1)->get();
        $result = LandingPages::where('id', $id)->firstOrFail();
        return view('crm.cms.edit', $params, compact('result'));
    }

    public function save(Request $request, $type=null)
    {  
       
        $page_validator = [
            'page_type'     =>  [ 'required', 'string', 'max:255'],
            'page_title'    =>  [ 'required', 'string','max:255'],
        ];
         
        $validator  =   Validator::make( $request->all(), $page_validator );
        
        if($validator->passes()) {
  
            $result = LandingPages::create([
                'page_title'    => $request->page_title,
                'page_type'     => $request->page_type,
                'page_logo'     => Image::make($request->file('page_logo'))->encode('data-url'), 
                'permalink'     => Str::slug($request->page_type),
                'mail_us'       => $request->mail_us,
                'call_us'       => $request->call_us,
                'contact_us'    => $request->contact_us,
                'iframe_tags'   => $request->iframe_tags,
                'other_tags'    => $request->other_tags,
                'about_title'   => $request->about_title,
                'file_about'    => Image::make($request->file('about_image'))->encode('data-url'),
                'about_content' => $request->about_content,
                'primary_color' => $request->primary_color,
                'secondary_color' => $request->secondary_color,
            ]);
             
            foreach($request->media_type as $i => $media){
                $result->LandingPageSocialMedias()->create([
                    'name'      => $request->media_type[$i] ,
                    'link'      => $request->link[$i],
                    'icon'      =>  "-",
                ]); 
            }
            foreach($request->form_input_type as $i => $form){
                $result->LandingPageFormInputs()->create([
                    'input_type'        =>  $request->form_input_type[$i] ,
                    'input_required'    =>  $request->form_input_required[$i],
                ]); 
            }

            foreach($request->banner_title as $i => $banner){
                $result->LandingPageBannerSliders()->create([
                    'title'     =>  $request->banner_title[$i] ,
                    'sub_title' =>  $request->sub_banner_title[$i],
                    'image'     =>  Image::make($request->file('banner_image')[$i])->encode('data-url'),
                    'content'   =>  $request->banner_content[$i],
                ]); 
            }

            foreach ($request->feature_icon as $i => $row) {
                $result->LandingPageFeatures()->create([
                    'title'     =>  $request->feature_title[$i],
                    'icon'      =>  Image::make($request->file('feature_icon')[$i])->encode('data-url'),
                    'content'   =>  $request->feature_content[$i],
                ]);
            }
            return response()->json(['success'=>"Landing page to be created successfully !"]);
        }
        return response()->json(['error'=>$validator->errors()->all(), 'status' => '1']);
    }
    public function update(Request $request, $id)
    {
         
        $update = LandingPages::find($id);
        
        $data = LandingPages::find($id)->update([
            'page_title'    => $request->page_title,
            'page_type'     => $request->page_type,
            'permalink'     => Str::slug($request->page_type),
            'mail_us'       => $request->mail_us,
            'call_us'       => $request->call_us,
            'contact_us'    => $request->contact_us,
            'iframe_tags'   => $request->iframe_tags,
            'other_tags'   => $request->other_tags,
        ]);

        
        $update->LandingPageSocialMedias()->delete();
        foreach ($request->media_type as $i => $value) {
            $update->LandingPageSocialMedias()->create([
                'name'      => $request->media_type[$i] ,
                'link'      => $request->link[$i],
                'icon'      =>  "-",
            ]);
        }


        $update->LandingPageFormInputs()->delete();

        foreach($request->form_input_type as $i => $form){
            $update->LandingPageFormInputs()->create([
                'input_type'        =>  $request->form_input_type[$i] ,
                'input_required'    =>  $request->form_input_required[$i],
            ]); 
        }
 
        $update->LandingPageBannerSliders()->delete();
        foreach($request->banner_title as $i => $banner){
            $image  =   $request->file('banner_image')[$i];
            $file   =   $image->store( 'LandingPages/Banners', 'public' );
            $update->LandingPageBannerSliders()->create([
                'title'     =>  $request->banner_title[$i] ,
                'sub_title' =>  $request->sub_banner_title[$i],
                'image'    =>  $file,
                'content'   =>  $request->banner_content[$i],
            ]); 
        }

        
        return response()->json(['success'=>"Landing page to be Updated successfully !"]);
        
        if($validator->passes()) {
            if( $request->hasFile( 'page_logo' ) ) {
                $file               =   $request->file('page_logo')->store( 'LandingPages/Logos', 'public' );
            }
            $result = LandingPages::create([
                'page_title'    => $request->page_title,
                'page_type'     => $request->page_type,
                'page_logo'     => $file, 
                'permalink'     => Str::slug($request->page_type),
                'mail_us'       => $request->mail_us,
                'call_us'       => $request->call_us,
                'contact_us'    => $request->contact_us,
            ]);
             
            foreach($request->media_type as $i => $media){
                $result->LandingPageSocialMedias()->create([
                    'name'      => $request->media_type[$i] ,
                    'link'      => $request->link[$i],
                    'icon'      =>  "-",
                ]); 
            }
            foreach($request->form_input_type as $i => $form){
                $result->LandingPageFormInputs()->create([
                    'input_type'        =>  $request->form_input_type[$i] ,
                    'input_required'    =>  $request->form_input_required[$i],
                ]); 
            }

            foreach($request->banner_title as $i => $banner){
                $image  = $request->file('banner_image')[$i];
                $file   =    $image->store( 'LandingPages/Banners', 'public' );
                $result->LandingPageBannerSliders()->create([
                    'title'     =>  $request->banner_title[$i] ,
                    'sub_title' =>  $request->sub_banner_title[$i],
                    'image'    =>  $file,
                    'content'   =>  $request->banner_content[$i],
                ]); 
            }
            return response()->json(['success'=>"Landing page to be created successfully !"]);
        }
        return response()->json(['error'=>$validator->errors()->all(), 'status' => '1']);
    }
}