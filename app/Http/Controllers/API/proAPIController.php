<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproAPIRequest;
use App\Http\Requests\API\UpdateproAPIRequest;
use App\Models\pro;
use App\Repositories\proRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\proResource;
use Response;

/**
 * Class proController
 * @package App\Http\Controllers\API
 */

class proAPIController extends AppBaseController
{
    /** @var  proRepository */
    private $proRepository;

    public function __construct(proRepository $proRepo)
    {
        $this->proRepository = $proRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pros",
     *      summary="Get a listing of the pros.",
     *      tags={"pro"},
     *      description="Get all pros",
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
     *                  @SWG\Items(ref="#/definitions/pro")
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
        $pros = $this->proRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(proResource::collection($pros), 'Pros retrieved successfully');
    }

    /**
     * @param CreateproAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pros",
     *      summary="Store a newly created pro in storage",
     *      tags={"pro"},
     *      description="Store pro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pro that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pro")
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
     *                  ref="#/definitions/pro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateproAPIRequest $request)
    {
        $input = $request->all();

        $pro = $this->proRepository->create($input);

        return $this->sendResponse(new proResource($pro), 'Pro saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pros/{id}",
     *      summary="Display the specified pro",
     *      tags={"pro"},
     *      description="Get pro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pro",
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
     *                  ref="#/definitions/pro"
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
        /** @var pro $pro */
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            return $this->sendError('Pro not found');
        }

        return $this->sendResponse(new proResource($pro), 'Pro retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateproAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pros/{id}",
     *      summary="Update the specified pro in storage",
     *      tags={"pro"},
     *      description="Update pro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pro",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pro that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pro")
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
     *                  ref="#/definitions/pro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateproAPIRequest $request)
    {
        $input = $request->all();

        /** @var pro $pro */
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            return $this->sendError('Pro not found');
        }

        $pro = $this->proRepository->update($input, $id);

        return $this->sendResponse(new proResource($pro), 'pro updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pros/{id}",
     *      summary="Remove the specified pro from storage",
     *      tags={"pro"},
     *      description="Delete pro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pro",
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
        /** @var pro $pro */
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            return $this->sendError('Pro not found');
        }

        $pro->delete();

        return $this->sendSuccess('Pro deleted successfully');
    }
}
