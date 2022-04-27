<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatechapterRequest;
use App\Http\Requests\UpdatechapterRequest;
use App\Repositories\chapterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class chapterController extends AppBaseController
{
    /** @var chapterRepository $chapterRepository*/
    private $chapterRepository;

    public function __construct(chapterRepository $chapterRepo)
    {
        $this->chapterRepository = $chapterRepo;
    }

    /**
     * Display a listing of the chapter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $chapters = $this->chapterRepository->paginate(60,$request->except(['page']));

        return view('chapters.index')
            ->with('chapters', $chapters);
    }

    /**
     * Show the form for creating a new chapter.
     *
     * @return Response
     */
    public function create()
    {
        return view('chapters.create');
    }

    /**
     * Store a newly created chapter in storage.
     *
     * @param CreatechapterRequest $request
     *
     * @return Response
     */
    public function store(CreatechapterRequest $request)
    {
        $input = $request->all();

        $chapter = $this->chapterRepository->create($input);

        Flash::success('Chapter saved successfully.');

        return redirect(route('chapters.index'));
    }

    /**
     * Display the specified chapter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        return view('chapters.show')->with('chapter', $chapter);
    }

    /**
     * Show the form for editing the specified chapter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        return view('chapters.edit')->with('chapter', $chapter);
    }

    /**
     * Update the specified chapter in storage.
     *
     * @param int $id
     * @param UpdatechapterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatechapterRequest $request)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        $chapter = $this->chapterRepository->update($request->all(), $id);

        Flash::success('Chapter updated successfully.');

        return redirect(route('chapters.index'));
    }

    /**
     * Remove the specified chapter from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        $this->chapterRepository->delete($id);

        Flash::success('Chapter deleted successfully.');

        return redirect(route('chapters.index'));
    }
}
