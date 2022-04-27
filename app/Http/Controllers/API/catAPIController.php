<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecatAPIRequest;
use App\Http\Requests\API\UpdatecatAPIRequest;
use App\Models\cat;
use App\Repositories\catRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\catResource;
use Response;

/**
 * Class catController
 * @package App\Http\Controllers\API
 */

class catAPIController extends AppBaseController
{
    /** @var  catRepository */
    private $catRepository;

    public function __construct(catRepository $catRepo)
    {
        $this->catRepository = $catRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cats",
     *      summary="Get a listing of the cats.",
     *      tags={"cat"},
     *      description="Get all cats",
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
     *                  @SWG\Items(ref="#/definitions/cat")
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
        $cats = $this->catRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(catResource::collection($cats), 'Cats retrieved successfully');
    }

    /**
     * @param CreatecatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cats",
     *      summary="Store a newly created cat in storage",
     *      tags={"cat"},
     *      description="Store cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="cat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/cat")
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
     *                  ref="#/definitions/cat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatecatAPIRequest $request)
    {
        $input = $request->all();

        $cat = $this->catRepository->create($input);

        return $this->sendResponse(new catResource($cat), 'Cat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cats/{id}",
     *      summary="Display the specified cat",
     *      tags={"cat"},
     *      description="Get cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of cat",
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
     *                  ref="#/definitions/cat"
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
        /** @var cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat not found');
        }

        return $this->sendResponse(new catResource($cat), 'Cat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatecatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cats/{id}",
     *      summary="Update the specified cat in storage",
     *      tags={"cat"},
     *      description="Update cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of cat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="cat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/cat")
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
     *                  ref="#/definitions/cat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatecatAPIRequest $request)
    {
        $input = $request->all();

        /** @var cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat not found');
        }

        $cat = $this->catRepository->update($input, $id);

        return $this->sendResponse(new catResource($cat), 'cat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cats/{id}",
     *      summary="Remove the specified cat from storage",
     *      tags={"cat"},
     *      description="Delete cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of cat",
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
        /** @var cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat not found');
        }

        $cat->delete();

        return $this->sendSuccess('Cat deleted successfully');
    }
}
