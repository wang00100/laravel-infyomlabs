<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatRequest;
use App\Http\Requests\UpdatecatRequest;
use App\Repositories\catRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class catController extends AppBaseController
{
    /** @var catRepository $catRepository*/
    private $catRepository;

    public function __construct(catRepository $catRepo)
    {
        $this->catRepository = $catRepo;
    }

    /**
     * Display a listing of the cat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cats = $this->catRepository->paginate(60,$request->except(['page']));

        return view('cats.index')
            ->with('cats', $cats);
    }

    /**
     * Show the form for creating a new cat.
     *
     * @return Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created cat in storage.
     *
     * @param CreatecatRequest $request
     *
     * @return Response
     */
    public function store(CreatecatRequest $request)
    {
        $input = $request->all();

        $cat = $this->catRepository->create($input);

        Flash::success('Cat saved successfully.');

        return redirect(route('cats.index'));
    }

    /**
     * Display the specified cat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        return view('cats.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified cat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified cat in storage.
     *
     * @param int $id
     * @param UpdatecatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatRequest $request)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        $cat = $this->catRepository->update($request->all(), $id);

        Flash::success('Cat updated successfully.');

        return redirect(route('cats.index'));
    }

    /**
     * Remove the specified cat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        $this->catRepository->delete($id);

        Flash::success('Cat deleted successfully.');

        return redirect(route('cats.index'));
    }
}
