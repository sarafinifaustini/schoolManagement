<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use App\Services\AttendanceService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AttendanceResource;
use Symfony\Component\HttpFoundation\Request;



class AttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $attendanceService;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

       public function index()
    {
        // abort_if(Gate::denies('attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $selectedYear  = Route::current()->parameters()['year'];
        $selectedMonth = Route::current()->parameters()['month'];

        //don't let to navigate to future attendances
        if ($this->attendanceService->isProvidedMonthGreaterThanCurrentMonth($selectedYear, $selectedMonth)) {
            return redirect()->route('home.redirect');
        }

        $daysInMonth     = $this->attendanceService->daysInMonth($selectedYear, $selectedMonth);
        $students        = User::all();
        $attendances     = $this->attendanceService->getAttendances();
        $paginationLinks = $this->attendanceService->getAttendancePaginationLinks($selectedYear, $selectedMonth);

        return view('dashboard.teacher.home', compact(
            'attendances', 'students', 'paginationLinks', 'daysInMonth', 'selectedYear', 'selectedMonth'
        ));
    }

    /**
     * @return RedirectResponse
     */
    public function store()
    {
        $year  = request()->segment(3);
        $month = request()->segment(4);

        $attendances = array_filter(request()->all(), function ($key) {
            return strpos($key, 'student_') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $this->attendanceService->storeAttendances($year, $month, $attendances);

        return redirect()->route('teacher.home', [
            'year'  => $year,
            'month' => $month,
        ])->with('success', 'Attendances updated successfully.');
    }
}
