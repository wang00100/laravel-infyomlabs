<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatechapterAPIRequest;
use App\Http\Requests\API\UpdatechapterAPIRequest;
use App\Models\chapter;
use App\Repositories\chapterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\chapterResource;
use Response;

/**
 * Class chapterController
 * @package App\Http\Controllers\API
 */

class chapterAPIController extends AppBaseController
{
    /** @var  chapterRepository */
    private $chapterRepository;

    public function __construct(chapterRepository $chapterRepo)
    {
        $this->chapterRepository = $chapterRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/chapters",
     *      summary="Get a listing of the chapters.",
     *      tags={"chapter"},
     *      description="Get all chapters",
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
     *                  @SWG\Items(ref="#/definitions/chapter")
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
        $chapters = $this->chapterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(chapterResource::collection($chapters), 'Chapters retrieved successfully');
    }

    /**
     * @param CreatechapterAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/chapters",
     *      summary="Store a newly created chapter in storage",
     *      tags={"chapter"},
     *      description="Store chapter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="chapter that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/chapter")
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
     *                  ref="#/definitions/chapter"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatechapterAPIRequest $request)
    {
        $input = $request->all();

        $chapter = $this->chapterRepository->create($input);

        return $this->sendResponse(new chapterResource($chapter), 'Chapter saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/chapters/{id}",
     *      summary="Display the specified chapter",
     *      tags={"chapter"},
     *      description="Get chapter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of chapter",
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
     *                  ref="#/definitions/chapter"
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
        /** @var chapter $chapter */
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            return $this->sendError('Chapter not found');
        }

        return $this->sendResponse(new chapterResource($chapter), 'Chapter retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatechapterAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/chapters/{id}",
     *      summary="Update the specified chapter in storage",
     *      tags={"chapter"},
     *      description="Update chapter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of chapter",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="chapter that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/chapter")
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
     *                  ref="#/definitions/chapter"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatechapterAPIRequest $request)
    {
        $input = $request->all();

        /** @var chapter $chapter */
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            return $this->sendError('Chapter not found');
        }

        $chapter = $this->chapterRepository->update($input, $id);

        return $this->sendResponse(new chapterResource($chapter), 'chapter updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/chapters/{id}",
     *      summary="Remove the specified chapter from storage",
     *      tags={"chapter"},
     *      description="Delete chapter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of chapter",
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
        /** @var chapter $chapter */
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            return $this->sendError('Chapter not found');
        }

        $chapter->delete();

        return $this->sendSuccess('Chapter deleted successfully');
    }
}
