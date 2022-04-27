<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetagRequest;
use App\Http\Requests\UpdatetagRequest;
use App\Repositories\tagRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tagController extends AppBaseController
{
    /** @var tagRepository $tagRepository*/
    private $tagRepository;

    public function __construct(tagRepository $tagRepo)
    {
        $this->tagRepository = $tagRepo;
    }

    /**
     * Display a listing of the tag.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $this->tagRepository->paginate(60,$request->except(['page']));

        return view('tags.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param CreatetagRequest $request
     *
     * @return Response
     */
    public function store(CreatetagRequest $request)
    {
        $input = $request->all();

        $tag = $this->tagRepository->create($input);

        Flash::success('Tag saved successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified tag.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('tags.index'));
        }

        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('tags.index'));
        }

        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified tag in storage.
     *
     * @param int $id
     * @param UpdatetagRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetagRequest $request)
    {
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('tags.index'));
        }

        $tag = $this->tagRepository->update($request->all(), $id);

        Flash::success('Tag updated successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('tags.index'));
        }

        $this->tagRepository->delete($id);

        Flash::success('Tag deleted successfully.');

        return redirect(route('tags.index'));
    }
}
