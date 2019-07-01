<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgentsRequest;
use App\Http\Requests\UpdateAgentsRequest;
use App\Repositories\AgentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AgentsController extends AppBaseController
{
    /** @var  AgentsRepository */
    private $agentsRepository;

    public function __construct(AgentsRepository $agentsRepo)
    {
        $this->agentsRepository = $agentsRepo;
    }

    /**
     * Display a listing of the Agents.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $agents = $this->agentsRepository->all();

        return view('agents.index')
            ->with('agents', $agents);
    }

    /**
     * Show the form for creating a new Agents.
     *
     * @return Response
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created Agents in storage.
     *
     * @param CreateAgentsRequest $request
     *
     * @return Response
     */
    public function store(CreateAgentsRequest $request)
    {
        $input = $request->all();

        $agents = $this->agentsRepository->create($input);

        Flash::success('Agents saved successfully.');

        return redirect(route('agents.index'));
    }

    /**
     * Display the specified Agents.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agents = $this->agentsRepository->find($id);

        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        return view('agents.show')->with('agents', $agents);
    }

    /**
     * Show the form for editing the specified Agents.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agents = $this->agentsRepository->find($id);

        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        return view('agents.edit')->with('agents', $agents);
    }

    /**
     * Update the specified Agents in storage.
     *
     * @param int $id
     * @param UpdateAgentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgentsRequest $request)
    {
        $agents = $this->agentsRepository->find($id);

        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        $agents = $this->agentsRepository->update($request->all(), $id);

        Flash::success('Agents updated successfully.');

        return redirect(route('agents.index'));
    }

    /**
     * Remove the specified Agents from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agents = $this->agentsRepository->find($id);

        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        $this->agentsRepository->delete($id);

        Flash::success('Agents deleted successfully.');

        return redirect(route('agents.index'));
    }
}
