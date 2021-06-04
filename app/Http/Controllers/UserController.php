<?php

namespace App\Http\Controllers;

use App\Models\AuthenticatedUser;
use App\Models\Post;
use App\Models\Tag;
use App\Policies\PostPolicy;
use App\Rules\MatchOldPassword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Hash;
use App\Policies\UserPolicy;
use function MongoDB\BSON\toJSON;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the User profile
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        //Verify if user is authenticated and if user is owner of post
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            return redirect('/');
        }

        //verifica se é o dono do perfil se sim -> my profile, se nao userprofile
        $posts = Post::where('user_id', $id)->get();
        $nLikes = 0;
        foreach($posts as $post){
            $post->author = AuthenticatedUser::find($post->user_id)->name;
            $post->likes = DB::table("vote_post")->where("post_id",$post->id)->where("like",true)->get()->count();
            $post->thumbnail = "/images/posts/".$post->thumbnail;
            $nLikes += $post->likes;
        }

        $nFollowers = DB::table("follow_user")->where("followed_user", $id)->get()->count();
        $nFollowing = DB::table("follow_user")->where("following_user", $id)->get()->count();

        $user = AuthenticatedUser::find($id);

        $photo = 'storage/images/users/'.Auth::user()->profile_photo;

        if($user_id == $id){
            return view('pages.myprofile', ['user' => 'visitor', 'needsFilter' => 0, 'user_id'=>$user_id, 'photo'=>$photo, 'nFollowers'=>$nFollowers, 'nFollowing'=>$nFollowing, 'nLikes'=>$nLikes, 'user'=>$user, 'posts' => $posts] );
        }
        else {
            return view('pages.userprofile', ['needsFilter' => 0, 'photo'=>$photo, 'nFollowers'=>$nFollowers, 'nFollowing'=>$nFollowing, 'nLikes'=>$nLikes, 'user'=>$user, 'posts' => $posts] );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        if(!UserPolicy::edit($id)) return view('pages.nopermission', ['needsFilter' => 0]);


        $tag_ids = DB::table('follow_tag')->where('user_id', $id)->pluck('tag_id');
        if(empty($tag_ids)) $tags = null;
        else if(is_object($tag_ids)) $tags = Tag::whereIn('id', $tag_ids)->get();
        else $tags = Tag::where('id', $tag_ids)->get();

        return view('pages.settings', ['needsFilter' => 0, 'user'=>Auth::user(), 'tags'=>$tags]);

    }

    /**
     * Search users by username
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchRoles(Request $request): JsonResponse
    {
        $search = $request->input("query");

        if (!empty($search))
            $roles = AuthenticatedUser::query()->select("id", "name", "username", "birthdate", "authenticated_user_type")->where('username', 'LIKE', $search.'%')->orderBy("authenticated_user_type")->paginate(20);
        else
            $roles = AuthenticatedUser::query()->select("id", "name", "username", "birthdate", "authenticated_user_type")->orderBy("authenticated_user_type")->paginate(20);

        $view = view('partials.roles_list', ['roles' => $roles])->render();
        return response()->json($view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AuthenticatedUser $authenticatedUser
     * @return Response
     */
    public function update(Request $request, AuthenticatedUser $authenticatedUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer $id
     * @return
     */
    public function destroy($id){
        if(!UserPolicy::edit($id))  return response()->json( 'user/'.$id.'/settings#delete-account', 400);

        $user = AuthenticatedUser::find($id);
        if($user != null){
            if ($user->delete())
                return response()->json( '/');
        }

        return response()->json( 'user/'.$id.'/settings#delete-account', 400);
    }

    public function roles()
    {
        $roles = DB::table("authenticated_user")->select("id", "name", "username", "birthdate", "authenticated_user_type")->orderBy("authenticated_user_type")->paginate(20);

        return view('pages.manage_roles', ['needsFilter' => 0, 'roles' => $roles]);
    }

    public function editRole(Request $request, $user_id)
    {
        $validatedData = Validator::make($request->all(), [
            'new_role' => 'required'
        ]);

        if (!$validatedData->fails()) {
            $type = $request["new_role"];
            DB::table("authenticated_user")->where("id", $user_id)->update(["authenticated_user_type" => $type]);
            $view = view('partials.roles_types', ['type' => $type])->render();
            return response()->json($view);
        }
    }

    /**
     * Follow a user
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return Response
     */
    public function follow($id)
    {
        $user = Auth::user();
        if (!Auth::check()) return; //mandar para login ou sem permissoes

        $followed_user = AuthenticatedUser::find($id);
        if ($followed_user != null)
            $user->follow_user()->create(['followed_user' => $id, 'following_user' => $user->id]);
    }


    /**
     * Unfollow a user
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return Response
     */
    public function unfollow($id)
    {
        $user = Auth::user();
        if (!Auth::check()) return; //mandar para login ou sem permissoes

        $followed_user = AuthenticatedUser::find($id);
        if ($followed_user != null)
            $user->follow_user()->delete(['followed_user' => $id, 'following_user' => $user->id]);

    }

    /**
     * Block a user
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return Response
     */
    public function block($id)
    {
        $user = Auth::user();
        if (!Auth::check()) return; //mandar para login ou sem permissoes

        $blocked_user = AuthenticatedUser::find($id);
        if ($blocked_user != null)
            $user->block_user()->create(['blocked_user' => $id, 'blocking_user' => $user->id]);
    }

    /**
     * Unblock a user
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return Response
     */
    public function unblock($id)
    {
        $user = Auth::user();
        if (!Auth::check()) return; //mandar para login ou sem permissoes

        $blocked_user = AuthenticatedUser::find($id);
        if ($blocked_user != null)
            $user->block_user()->delete(['blocked_user' => $id, 'blocking_user' => $user->id]);
            $user->block_user()->delete(['blocked_user' => $id, 'blocking_user' => $user->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AuthenticatedUser $authenticatedUser
     * @return Response
     */
    //public function update_photo(Request $request, AuthenticatedUser $authenticatedUser)
    public function update_photo(Request $request)
    {
        if(!Auth::check()){
            return response('No permission', 403);
        }

        $validator = Validator::make($request->all(),
        [
            'avatar' => ['required', 'image', 'mimes:jpeg,jpg,png,gif']
        ]);
        if ($validator->fails()) {
            return response('Invalid file', 415);
        }

        $authenticatedUser = AuthenticatedUser::find(Auth::user()->id);
        Storage::delete('public/images/users/'. $authenticatedUser->profile_photo);
        $imageName = $request->file('avatar')->store('public/images/users');
        $imageName = basename($imageName, "");

        if(AuthenticatedUser::where('id', $authenticatedUser->id)->update(['profile_photo' => $imageName]) != 1){
            return response('Photo update error', 500);
        };

        $photo = 'storage/images/users/' . $imageName;
        return response()->json(array('profilephoto' => view('partials.profilephoto', ['photo' => $photo])->render()));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuthenticatedUser  $authenticatedUser
     * @return \Illuminate\Http\Response
     */
    public function edit_bio(Request $request)
    {
        if(!Auth::check()){
            return response('No permission', 403);
        }
        $validator = Validator::make($request->all(),
        [
            'bio' => ['required', 'string', 'max:120']
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        if(AuthenticatedUser::where('id', Auth::user()->id)->update(['bio'=>$request->input('bio')]) != 1){
            return response('Bio update error', 500);
        }

        $authenticatedUser = AuthenticatedUser::find(Auth::user()->id);
        return response()->json(array('profilebio'=>view('partials.profilebio', ['user'=> $authenticatedUser])->render()));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Integer $id
     * @return
     */
    public function edit_account(Request $request, $id)
    {
        if(!UserPolicy::edit($id)) return view('pages.nopermission', ['needsFilter' => 0]);
        $user = Auth::user();

        $validator = Validator::make($request->all(),
            [
                "name" => ["max:20", "filled"],
                "username" => ["filled", "max:20",  Rule::unique('authenticated_user')->ignore($user->id)],
                "email" => ["filled", "email", "max:50", Rule::unique('authenticated_user')->ignore($user->id)],
            ]);

        if ($validator->fails()) return redirect('user/'.$id.'/settings#edit-account')->withErrors($validator)->withInput();

       if($request->has('name') &&  trim($request->input('name')) !== $user->name)
           $user->name = trim($request->input('name'));
        if($request->has('username') &&  trim($request->input('username')) !== $user->username)
            $user->username = trim($request->input('username'));
        if($request->has('email') &&  trim($request->input('email')) !== $user->email)
            $user->email = trim($request->input('email'));

        $user->save();

        return redirect('user/'.$id.'/settings#edit-account')->with('success-account', 'Account updated successfully!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Integer $id
     * @return
     */
    public function edit_social_networks(Request $request, $id)
    {
        if(!UserPolicy::edit($id)) return view('pages.nopermission', ['needsFilter' => 0]);
        $user = Auth::user();

        $validator = Validator::make($request->all(),
            [
                "twitter" => ["max:100", "present"],
                "facebook" => ["present", "max:100"],
                "instagram" => ["present", "max:100"],
                "linkedin" => ["present ", "max:100"]
            ]);

        if ($validator->fails()) return redirect('user/'.$id.'/settings#edit-social-networks')->withErrors($validator)->withInput();

        if($request->has('twitter') &&  trim($request->input('twitter')) !== $user->twitter)
            $user->twitter = trim($request->input('twitter'));
        if($request->has('facebook') &&  trim($request->input('facebook')) !== $user->facebook)
            $user->facebook = trim($request->input('facebook'));
        if($request->has('instagram') &&  trim($request->input('instagram')) !== $user->instagram)
            $user->instagram = trim($request->input('instagram'));
        if($request->has('linkedin') &&  trim($request->input('linkedin')) !== $user->linkedin)
            $user->linkedin = trim($request->input('linkedin'));

        $user->save();
        return redirect('user/'.$id.'/settings#edit-social-networks')->with('success-social-networks', 'Social networks updated successfully!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Integer $id
     * @return
     */
    public function edit_preferences(Request $request, $id)
    {
        if(!UserPolicy::edit($id)) return view('pages.nopermission', ['needsFilter' => 0]);
        $user = Auth::user();

        $validator = Validator::make($request->all(),
            [
                "show_people_i_follow" => ["boolean"],
                "show_tags_i_follow" => ["boolean"]
            ]);

        if ($validator->fails()) return redirect('user/'.$id.'/settings#edit-preferences')->withErrors($validator)->withInput();


        if($request->has('peopleFollow')) $user->show_people_i_follow = true;
        else $user->show_people_i_follow = false;
        if($request->has('tagsFollow')) $user->show_tags_i_follow = true;
        else $user->show_tags_i_follow = false;

        $user->save();

        $tags = [];
        if($request->has('tags')){
            foreach ($request->input('tags') as $a){
                array_push($tags, $a);
            }
        }

        $to_delete = DB::table('follow_tag')->where('user_id',$user->id)->whereNotIn('tag_id', $tags)->pluck('tag_id');
        if(!is_object($to_delete))  DB::table('follow_tag')->where('tag_id', $to_delete)->delete();
        else{
            foreach ($to_delete as $t){
                DB::table('follow_tag')->where('tag_id', $t)->delete();
            }
        }

        $existing = DB::table('follow_tag')->where('user_id',$user->id)->whereIn('tag_id', $tags)->pluck('tag_id');

        if(($existing != null) && is_array($existing->all())) $to_add = array_diff($tags, $existing->all());
        else if ($existing){
            if (($key = array_search($existing, $tags)) !== false) {
                unset($tags[$key]);
            }
            $to_add = $tags;
        }
        else $to_add = $tags;

        foreach($to_add as $t){
            DB::table('follow_tag')->insert(['user_id' => $user->id, 'tag_id' => $t]);
        }

        return redirect('user/'.$id.'/settings#edit-preferences')->with('success-preferences', 'Preferences updated successfully!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Integer $id
     * @return
     */
    public function change_password(Request $request, $id)
    {
        if(!UserPolicy::edit($id)) return view('pages.nopermission', ['needsFilter' => 0]);
        $user = Auth::user();

        $validator = Validator::make($request->all(),
            [
                'currentPassword' => ['required', 'min:5', new MatchOldPassword],
                'newPassword' => 'required|min:5',
                'confirmPassword' => 'required|same:newPassword',
            ]);

        if ($validator->fails()) return redirect('user/'.$id.'/settings#change-password')->withErrors($validator);

        AuthenticatedUser::find($user->id)->update(['password'=> Hash::make($request->newPassword)]);

        return redirect('user/'.$id.'/settings#change-password')->with('success-password', 'Password changed successfully!');
    }


}
