<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }
        $input = $request->only('user_id', 'product_id', 'content');

        try {
            $comment = new Comment;
            $comment->user_id = $input['user_id'];
            $comment->product_id = $input['product_id'];
            $comment->content = $input['content'];
            $comment->save();
            $result = [
                'success' => true,
                'content' => $input['content'],
            ];
            return response()->json($result);
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => trans('label.comment_fail'),
            ];
        }

        return response()->json($result);
    }

    public function postReply(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }
        $input = $request->only('user_id', 'product_id', 'content', 'parent_id');

        try {
            $comment = new Comment;
            $comment->user_id = $input['user_id'];
            $comment->product_id = $input['product_id'];
            $comment->content = $input['content'];
            $comment->parent_id = $input['parent_id'];
            $comment->save();
            $result = [
                'success' => true,
                'content' => $input['content'],
                'user' => auth::user()->id,
            ];
             return response()->json($result);
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => trans('label.comment_fail'),
            ];
        }

        return response()->json($result);
    }
    public function updateComment(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }
        $input = $request->only('id', 'content');

        try {
            $comment = Comment::findOrFail($input['id']);
            $comment->content = $input['content'];
            $comment->save();
            $result = [
                'success' => true,
                'content' => $input['content'],
                'user' => auth::user()->id,
            ];
             return response()->json($result);
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => trans('label.comment_fail'),
            ];
        }

        return response()->json($result);
    }

    public function updateReply(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }
        $input = $request->only('id', 'content');

        try {
            $comment = Comment::findOrFail($input['id']);
            $comment->content = $input['content'];
            $comment->save();
            $result = [
                'success' => true,
                'content' => $input['content'],
                'user' => auth::user()->id,
            ];
             return response()->json($result);
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => trans('label.comment_fail'),
            ];
        }

        return response()->json($result);
    }


    public function destroy($id)
    {
        try {
            Comment::findOrFail($id)->delete();

            return redirect()->back()
                ->with('success', trans('frontend.delete-comment-successfully'));
        } catch (Exception $e) {
            return redirect()->back()
                ->with('errors', trans('frontend.delete-comment-fail'));
        }
    }
}
