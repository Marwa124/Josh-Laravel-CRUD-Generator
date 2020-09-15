<?php

namespace App\Http\Controllers\Admin\Models;

use App\Http\Requests;
use App\Http\Requests\Models\CreateVacationRequest;
use App\Http\Requests\Models\UpdateVacationRequest;
use App\Repositories\Models\VacationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Models\Vacation;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VacationController extends InfyOmBaseController
{
    /** @var  VacationRepository */
    private $vacationRepository;

    public function __construct(VacationRepository $vacationRepo)
    {
        $this->vacationRepository = $vacationRepo;
    }

    /**
     * Display a listing of the Vacation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->vacationRepository->pushCriteria(new RequestCriteria($request));
        $vacations = $this->vacationRepository->all();
        return view('admin.models.vacations.index')
            ->with('vacations', $vacations);
    }

    /**
     * Show the form for creating a new Vacation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.models.vacations.create');
    }

    /**
     * Store a newly created Vacation in storage.
     *
     * @param CreateVacationRequest $request
     *
     * @return Response
     */
    public function store(CreateVacationRequest $request)
    {
        $input = $request->all();

        $vacation = $this->vacationRepository->create($input);

        Flash::success('Vacation saved successfully.');

        return redirect(route('admin.models.vacations.index'));
    }

    /**
     * Display the specified Vacation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vacation = $this->vacationRepository->findWithoutFail($id);

        if (empty($vacation)) {
            Flash::error('Vacation not found');

            return redirect(route('vacations.index'));
        }

        return view('admin.models.vacations.show')->with('vacation', $vacation);
    }

    /**
     * Show the form for editing the specified Vacation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vacation = $this->vacationRepository->findWithoutFail($id);

        if (empty($vacation)) {
            Flash::error('Vacation not found');

            return redirect(route('vacations.index'));
        }

        return view('admin.models.vacations.edit')->with('vacation', $vacation);
    }

    /**
     * Update the specified Vacation in storage.
     *
     * @param  int              $id
     * @param UpdateVacationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVacationRequest $request)
    {
        $vacation = $this->vacationRepository->findWithoutFail($id);

        

        if (empty($vacation)) {
            Flash::error('Vacation not found');

            return redirect(route('vacations.index'));
        }

        $vacation = $this->vacationRepository->update($request->all(), $id);

        Flash::success('Vacation updated successfully.');

        return redirect(route('admin.models.vacations.index'));
    }

    /**
     * Remove the specified Vacation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.models.vacations.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Vacation::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.models.vacations.index'))->with('success', Lang::get('message.success.delete'));

       }

}
