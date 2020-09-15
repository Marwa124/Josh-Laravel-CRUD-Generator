<?php

namespace App\Http\Controllers\Admin\Models;

use App\Http\Requests;
use App\Http\Requests\Models\CreateHolidayRequest;
use App\Http\Requests\Models\UpdateHolidayRequest;
use App\Repositories\Models\HolidayRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Models\Holiday;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HolidayController extends InfyOmBaseController
{
    /** @var  HolidayRepository */
    private $holidayRepository;

    public function __construct(HolidayRepository $holidayRepo)
    {
        $this->holidayRepository = $holidayRepo;
    }

    /**
     * Display a listing of the Holiday.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->holidayRepository->pushCriteria(new RequestCriteria($request));
        $holidays = $this->holidayRepository->all();
        return view('admin.models.holidays.index')
            ->with('holidays', $holidays);
    }

    /**
     * Show the form for creating a new Holiday.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.models.holidays.create');
    }

    /**
     * Store a newly created Holiday in storage.
     *
     * @param CreateHolidayRequest $request
     *
     * @return Response
     */
    public function store(CreateHolidayRequest $request)
    {
        $input = $request->all();

        $holiday = $this->holidayRepository->create($input);

        Flash::success('Holiday saved successfully.');

        return redirect(route('admin.models.holidays.index'));
    }

    /**
     * Display the specified Holiday.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $holiday = $this->holidayRepository->findWithoutFail($id);

        if (empty($holiday)) {
            Flash::error('Holiday not found');

            return redirect(route('holidays.index'));
        }

        return view('admin.models.holidays.show')->with('holiday', $holiday);
    }

    /**
     * Show the form for editing the specified Holiday.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $holiday = $this->holidayRepository->findWithoutFail($id);

        if (empty($holiday)) {
            Flash::error('Holiday not found');

            return redirect(route('holidays.index'));
        }

        return view('admin.models.holidays.edit')->with('holiday', $holiday);
    }

    /**
     * Update the specified Holiday in storage.
     *
     * @param  int              $id
     * @param UpdateHolidayRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHolidayRequest $request)
    {
        $holiday = $this->holidayRepository->findWithoutFail($id);

        

        if (empty($holiday)) {
            Flash::error('Holiday not found');

            return redirect(route('holidays.index'));
        }

        $holiday = $this->holidayRepository->update($request->all(), $id);

        Flash::success('Holiday updated successfully.');

        return redirect(route('admin.models.holidays.index'));
    }

    /**
     * Remove the specified Holiday from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.models.holidays.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Holiday::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.models.holidays.index'))->with('success', Lang::get('message.success.delete'));

       }

}
