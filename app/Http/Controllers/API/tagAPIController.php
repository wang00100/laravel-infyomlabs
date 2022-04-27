<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetagAPIRequest;
use App\Http\Requests\API\UpdatetagAPIRequest;
use App\Models\tag;
use App\Repositories\tagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\tagResource;
use Response;

/**
 * Class tagController
 * @package App\Http\Controllers\API
 */

class tagAPIController extends AppBaseController
{
    /** @var  tagRepository */
    private $tagRepository;

    public function __construct(tagRepository $tagRepo)
    {
        $this->tagRepository = $tagRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tags",
     *      summary="Get a listing of the tags.",
     *      tags={"tag"},
     *      description="Get all tags",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/tag")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $tags = $this->tagRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(tagResource::collection($tags), 'Tags retrieved successfully');
    }

    /**
     * @param CreatetagAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tags",
     *      summary="Store a newly created tag in storage",
     *      tags={"tag"},
     *      description="Store tag",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tag that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tag")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/tag"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatetagAPIRequest $request)
    {
        $input = $request->all();

        $tag = $this->tagRepository->create($input);

        return $this->sendResponse(new tagResource($tag), 'Tag saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tags/{id}",
     *      summary="Display the specified tag",
     *      tags={"tag"},
     *      description="Get tag",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tag",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/tag"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var tag $tag */
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }

        return $this->sendResponse(new tagResource($tag), 'Tag retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatetagAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tags/{id}",
     *      summary="Update the specified tag in storage",
     *      tags={"tag"},
     *      description="Update tag",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tag",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tag that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tag")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/tag"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatetagAPIRequest $request)
    {
        $input = $request->all();

        /** @var tag $tag */
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }

        $tag = $this->tagRepository->update($input, $id);

        return $this->sendResponse(new tagResource($tag), 'tag updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tags/{id}",
     *      summary="Remove the specified tag from storage",
     *      tags={"tag"},
     *      description="Delete tag",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tag",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var tag $tag */
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }

        $tag->delete();

        return $this->sendSuccess('Tag deleted successfully');
    }
}
