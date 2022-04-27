<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestaffAPIRequest;
use App\Http\Requests\API\UpdatestaffAPIRequest;
use App\Models\staff;
use App\Repositories\staffRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\staffResource;
use Response;

/**
 * Class staffController
 * @package App\Http\Controllers\API
 */

class staffAPIController extends AppBaseController
{
    /** @var  staffRepository */
    private $staffRepository;

    public function __construct(staffRepository $staffRepo)
    {
        $this->staffRepository = $staffRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/staff",
     *      summary="Get a listing of the staff.",
     *      tags={"staff"},
     *      description="Get all staff",
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
     *                  @SWG\Items(ref="#/definitions/staff")
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
        $staff = $this->staffRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(staffResource::collection($staff), 'Staff retrieved successfully');
    }

    /**
     * @param CreatestaffAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/staff",
     *      summary="Store a newly created staff in storage",
     *      tags={"staff"},
     *      description="Store staff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="staff that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/staff")
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
     *                  ref="#/definitions/staff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatestaffAPIRequest $request)
    {
        $input = $request->all();

        $staff = $this->staffRepository->create($input);

        return $this->sendResponse(new staffResource($staff), 'Staff saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/staff/{id}",
     *      summary="Display the specified staff",
     *      tags={"staff"},
     *      description="Get staff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of staff",
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
     *                  ref="#/definitions/staff"
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
        /** @var staff $staff */
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return $this->sendError('Staff not found');
        }

        return $this->sendResponse(new staffResource($staff), 'Staff retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatestaffAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/staff/{id}",
     *      summary="Update the specified staff in storage",
     *      tags={"staff"},
     *      description="Update staff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of staff",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="staff that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/staff")
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
     *                  ref="#/definitions/staff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatestaffAPIRequest $request)
    {
        $input = $request->all();

        /** @var staff $staff */
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return $this->sendError('Staff not found');
        }

        $staff = $this->staffRepository->update($input, $id);

        return $this->sendResponse(new staffResource($staff), 'staff updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/staff/{id}",
     *      summary="Remove the specified staff from storage",
     *      tags={"staff"},
     *      description="Delete staff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of staff",
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
        /** @var staff $staff */
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return $this->sendError('Staff not found');
        }

        $staff->delete();

        return $this->sendSuccess('Staff deleted successfully');
    }
}
