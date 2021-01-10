<?php

namespace App\Http\Middleware;

use Closure;

class SortMiddleware
{
    public function handle($request, Closure $next)
    {
        if (is_null($request->sort)) {
        	if ($request->session()->has('sort')) {
        		#リクエストがnull
        		#セッションはnullでない場合（ログイン後並べ替え機能を使った場合）
        		$sort = $request->session()->get('sort');
        		$request->merge(['sort' => $sort]);
        	} else {
        		#リクエストがnull
        		#セッションもnullの場合（ログインしたが並び替え機能を使っていない場合）
        		$sort = 'priority';
        		$request->merge(['sort' => $sort]);
        	}   
        } else {
        	#リクエストがnullでない場合（並べ替え機能を使った場合）
        	$sort = $request->sort;
        	$request->session()->put('sort', $sort); #並べ替え設定をセッションに保存
        	$request->merge(['sort' => $sort]); #選択した並べ替え設定を返す
        }

        return $next($request);
    }
}
