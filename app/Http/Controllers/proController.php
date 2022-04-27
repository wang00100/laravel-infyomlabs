<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproRequest;
use App\Http\Requests\UpdateproRequest;
use App\Repositories\proRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class proController extends AppBaseController
{
    /** @var proRepository $proRepository*/
    private $proRepository;

    public function __construct(proRepository $proRepo)
    {
        $this->proRepository = $proRepo;
    }

    /**
     * Display a listing of the pro.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pros = $this->proRepository->paginate(60,$request->except(['page']));

        return view('pros.index')
            ->with('pros', $pros);
    }

    /**
     * Show the form for creating a new pro.
     *
     * @return Response
     */
    public function create()
    {
        return view('pros.create');
    }

    /**
     * Store a newly created pro in storage.
     *
     * @param CreateproRequest $request
     *
     * @return Response
     */
    public function store(CreateproRequest $request)
    {
        $input = $request->all();

        $pro = $this->proRepository->create($input);

        Flash::success('Pro saved successfully.');

        return redirect(route('pros.index'));
    }

    /**
     * Display the specified pro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            Flash::error('Pro not found');

            return redirect(route('pros.index'));
        }

        return view('pros.show')->with('pro', $pro);
    }

    /**
     * Show the form for editing the specified pro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            Flash::error('Pro not found');

            return redirect(route('pros.index'));
        }

        return view('pros.edit')->with('pro', $pro);
    }

    /**
     * Update the specified pro in storage.
     *
     * @param int $id
     * @param UpdateproRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproRequest $request)
    {
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            Flash::error('Pro not found');

            return redirect(route('pros.index'));
        }

        $pro = $this->proRepository->update($request->all(), $id);

        Flash::success('Pro updated successfully.');

        return redirect(route('pros.index'));
    }

    /**
     * Remove the specified pro from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pro = $this->proRepository->find($id);

        if (empty($pro)) {
            Flash::error('Pro not found');

            return redirect(route('pros.index'));
        }

        $this->proRepository->delete($id);

        Flash::success('Pro deleted successfully.');

        return redirect(route('pros.index'));
    }
}
