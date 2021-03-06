<?php

namespace App\Repository\Ideas;

use App\Comment;
use App\Idea;
use App\Vote;
use Exception;
use Illuminate\Http\Request;

/**
 * This class implements Idea interface to
 * offer the functionalities necessary to
 * manage Ideas
 *
 * @author Samuel Olaegbe <olaegbesamuel@gmail.com>
 */
class IdeaRepository implements IdeaInterface
{
    protected $model;

    /**
     * Typehint the Idea model to the repository
     *
     * @param $model object of App\Idea
     *
     * @return App\Model
     */
    public function __construct(Idea $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function create($data, $organizationId)
    {
        $tags = $this->filterHashTag($data['body']);
        $idea = $this->model::create(
            [
                'title' => $data['title'],
                'project_id' => $data['project_id'] ?? null,
                'user_id' => auth()->id(),
                'organization_id' => $organizationId,
                'body' => $data['body'],
            ]
        );
        $idea->tag($tags);
        return $idea;
    }

    /**
     * @inheritDoc
     */
    public function update($data, $id)
    {
        $idea = $this->model->where(['id' => $id])
            ->update(
                [
                    'title' => $data['title'],
                    'body' => $data['body'],
                ]
            );

        if (!$idea) {
            throw new Exception("Failed to update idea");
        }

        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {

    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findByAuthor($author, $organizationId)
    {
        return $this->model->where('user_id', $author)
            ->where('organization_id', $organizationId)
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function search($query, $organizationId)
    {

    }

    /**
     * @inheritDoc
     *
    */
    public function implement($idea)
    {
        $idea = $this->model->where('id', $idea)
            ->update(['status' => 'Implemented']);

        if (!$idea) {
            throw new Exception("Failed to mark idea as implemented");
        }

        return true;
    }

    /**
     * @inheritDoc
     *
    */
    public function archive($id)
    {
        if (!is_array($id['ideas'])) {
            $idea = $this->model->where(['id' => $id])
                ->update(['status' => 'Archived']);

            if (!$idea) {
                throw new Exception("Failed to archive idea");
            }

            return true;
        } else {
            try {
                foreach ($id['ideas'] as $key => $value) {
                    $this->model->where(['id' => $value])
                        ->update(['status' => 'Archived']);
                }
            } catch (\Throwable $th) {
                throw $th;
            }

            return true;
        }
    }

    /**
     * @inheritDoc
     */
    public function comment(Request $request, $id)
    {
        try{
            $idea = $this->model->whereId($id)->first();
            if($idea){
                $create = Comment::create(
                    [
                        'user_id' => auth()->id(),
                        'commentable_type' => Idea::class,
                        'commentable_id' => $idea->id,
                        'content' => $request->body
                    ]
                );
                if($create){
                    return response()->json(['status' => 'success' ,'message'=> 'comment created'],200);
                }else{
                    return response()->json(['status' => 'error' ,'message'=> 'comment not created'],404);
                }
            } else {
              return response()->json(['status' => 'error' ,'message'=> 'idea not found'],404);
            }
        }catch (Exception $exception){
            return response()->json(['status' => 'error' ,'message'=> 'internal sever error'],500);
        }
    }
    private function filterHashTag(string $idea)
    {
        $tags = array();
        $re = '/\B(#)([_]*[a-zA-Z0-9]+[^#-@\/\s][a-zA-Z0-9]*)(?|(\s)|($)|(\b[^#]))/mi';
        preg_match_all($re, $idea, $matches, PREG_SET_ORDER, 0);
        foreach ($matches as $match){
            array_push($tags, $match[2]);
        }
        return $tags;

    }

    /**
     * @inheritDoc
     */
    public function toggleVote($id)
    {
        $idea = Idea::whereId($id)->first();
        if($idea){
            $voted = Vote::where(['user_id' => auth()->id(),'votable_type' => Idea::class,'votable_id'=> $idea->id])->first();
            if($voted) {
                return $this->downVote($id);
            }
            $oldVote = Vote::onlyTrashed()->where(['user_id' => auth()->id(),'votable_type' => Idea::class,'votable_id'=> $idea->id])->first();
            if($oldVote){
                $oldVote->restore();
                return response()->json(['status' => 'success','message' => 'voted'],200);
            }
            $vote  = Vote::create(['user_id' => auth()->id(),'votable_type' => Idea::class,'votable_id'=> $idea->id]);
            return response()->json(['status' => 'success','message' => 'voted'],200);
        }else{
            return response()->json(['status' => 'error','message' => 'idea not found'],404);
        }
    }

    /**
     * @inheritDoc
     */

    public function downVote($id){
            $voted = Vote::where(['user_id' => auth()->id(),'votable_type' => Idea::class,'votable_id'=> $id])->first();
            if($voted) {
                $voted->delete();
                return response()->json(['status' => 'success', 'message' => 'vote deleted'], 200);
            }
            return response()->json(['status' => 'error','message' => 'you haven\'t voted this idea yet'],404);
    }
}
