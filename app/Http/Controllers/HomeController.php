<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Audiencepoll;
use App\Models\Breakingnews;
use App\Models\Videostories;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countarticle=Article::count();
        $countbanner=Banner::count();
        $countaudiencepoll=Audiencepoll::count();
        $countbreakingnews=Breakingnews::count();
        $countVideostories=Videostories::count();
        $countusers=User::count();

        if(Auth::user()->role==1){
            $userdata=User::get();
            $rolechange='admin/rolechange';
            $deleteuser='admin/deleteuser';
            $edituser='admin/edituser';
            $statususer='admin/statususer';

            $userslist='admin/userslist';
            $usersedit='admin/usersedit';
            $usersdelete='admin/usersdelete';
            $usersstatus='admin/usersstatus';

            $articlelist='admin/articlelist';
            $articleedit='admin/articleedit';
            $articledelete='admin/articledelete';
            $articlestatus='admin/articlestatus';

            $bannerlist='admin/bannerlist';
            $bannerlistedit='admin/bannerlistedit';
            $bannerlistdelete='admin/bannerlistdelete';
            $bannerliststatus='admin/bannerliststatus';

            $breakingnewslist='admin/breakingnewslist';
            $breakingnewslistedit='admin/breakingnewslistedit';
            $breakingnewslistdelete='admin/breakingnewslistdelete';
            $breakingnewsliststatus='admin/breakingnewsliststatus';

            $audiencequestionlist='admin/audiencequestionlist';
            $audiencequestionlistedit='admin/audiencequestionlistedit';
            $audiencequestionlistdelete='admin/audiencequestionlistdelete';
            $audiencequestionliststatus='admin/audiencequestionliststatus';

           

            $videostorieslist='admin/videostorieslist';
            $videostorieslistedit='admin/videostorieslistedit';
            $videostorieslistdelete='admin/videostorieslistdelete';
            $videostoriesliststatus='admin/videostoriesliststatus';


        }else{
            $userdata=User::where('id',Auth::user()->id)->get();
            $rolechange='user/rolechange';
            $deleteuser='user/deleteuser';
            $edituser='user/edituser';
            $statususer='user/statususer';

            $userslist='user/userslist';
            $usersedit='user/usersedit';
            $usersdelete='user/usersdelete';
            $usersstatus='user/usersstatus';

            $articlelist='user/articlelist';
            $articleedit='user/articleedit';
            $articledelete='user/articledelete';
            $articlestatus='user/articlestatus';

            $bannerlist='user/bannerlist';
            $bannerlistedit='user/bannerlistedit';
            $bannerlistdelete='user/bannerlistdelete';
            $bannerliststatus='user/bannerliststatus';

            $breakingnewslist='user/breakingnewslist';
            $breakingnewslistedit='user/breakingnewslistedit';
            $breakingnewslistdelete='user/breakingnewslistdelete';
            $breakingnewsliststatus='user/breakingnewsliststatus';

            $audiencequestionlist='user/audiencequestionlist';
            $audiencequestionlistedit='user/audiencequestionlistedit';
            $audiencequestionlistdelete='user/audiencequestionlistdelete';
            $audiencequestionliststatus='user/audiencequestionliststatus';

           

            $videostorieslist='user/videostorieslist';
            $videostorieslistedit='user/videostorieslistedit';
            $videostorieslistdelete='user/videostorieslistdelete';
            $videostoriesliststatus='user/videostoriesliststatus';

        }
        return view('home',compact('userdata','rolechange',
        'deleteuser',
        'edituser',
        'statususer',
        'countarticle',
        'countbanner',
        'countaudiencepoll',
        'countbreakingnews',
        'countVideostories',
        'articlelist',
        'bannerlist',
        'breakingnewslist',
        'audiencequestionlist',
        'userslist',
        'videostorieslist',
        'countusers'
    ));
    }
    public function userview(Request $request){
        if(Auth::user()->role==1){
            $userdata=User::get();
            $rolechange='admin.rolechange';
            $deleteuser='admin.deleteuser';
            $edituser='admin.edituser';
            $statususer='admin.statususer';
        }else{
            $userdata=User::where('id',Auth::user()->id)->get();
            $rolechange='user.rolechange';
            $deleteuser='user.deleteuser';
            $edituser='user.edituser';
            $statususer='user.statususer';
        }
        return view('users.usersview',compact(
            'userdata',
            'rolechange',
            'deleteuser',
            'edituser',
            'statususer',
        ));
    }
    public function statususer(Request $request,$encid){

        $id=\Crypt::decrypt($encid);
        $oldstat=User::find($id);
        if($oldstat->status==1){
            $msg='Active to Inactive';
            $status=array('status'=>2);
        }else{
             $msg='Inactive to Active';
            $status=array('status'=>1);
        }
        $res=User::where('id',$id)->update($status);
        if($res){
            return back()->withSuccess('status changed '.$msg);
        }
    }
    public function rolechange(Request $request,$encid){

        $id=\Crypt::decrypt($encid);
        $oldstat=User::find($id);
        if($oldstat->role==1){
            $msg='Admin to User';
            $role=array('role'=>2);
        }else{
             $msg='User to admin';
            $role=array('role'=>1);
        }
        $res=User::where('id',$id)->update($role);
        if($res){
            return back()->withSuccess('Role changed '.$msg);
        }
    }
}
