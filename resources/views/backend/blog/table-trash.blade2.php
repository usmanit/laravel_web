<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if ( ! check_user_permissions($request)) {
           abort(403, "Forbidden access!");
       }
        return $next($request);
    }
}



cadangan untu perbaikan 





<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //get current users
        $currentUser = $request->user();

        // get current action name
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);
        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

        $crudPermissionsMap  = [
          //'create'  =>  ['create', 'store'],
          //'update'  =>  ['edit', 'update'],
          //'delete'  =>  ['destroy', 'store', 'forceDestroy'],
          //'read'    =>  ['index', 'view']

          'crud'  =>  ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']

        ];

        $classesMap =[
          'Blog'  => 'post',
          'Categories'  =>  'category',
          'Users' =>  'user'
        ];


        foreach ($crudPermissionsMap as $permission => $methods)
        {
          // if the current method exits in method list
          // we'll check the permissions
          if (in_array($method, $methods) && isset($classesMap[$controller]))
          {
            $className  = $classesMap[$controller];

            if($className == 'post' && in_array($method, ['edit','update','destroy','restore','forceDestroy']))
            {
              //jika pengguna saat ini tidak memperbarui / menghapus-izin posting lain
              //pastikan dia hanya memodifikasi posnya sendiri
              if ( ($id = $request->route("blog")) && !$currentUser->can("update-others-post") ||  !$currentUser->can("delete-others-post"))  {
                  $post  =  \App\Post::find($id);
                  if ($post->author_id !== $currentUser->id) {
                    abort(403, "Forbidden access!");
                  }
              }
            }
            // if the user has not dom/t follow nexr Request
            elseif ( ! $currentUser->can("{$permission}-{$className}")) {
               abort(403, "Forbidden access!");
             }
             break;
             
          }
        }

        return $next($request);
    }
}

