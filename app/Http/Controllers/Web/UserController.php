<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 * @package App\Http\Controllers\Web
 * @author mr.sirichai janpan (13_oy@hotmail.co.th)
 */
class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $id = Auth::user()->_id;
        $response = $this->userRepository->find($id);

        $response['status_name'] = $this->setStatus($response['status_id']);

        return view('pages.users.info')->with(['users' => $response]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request)
    {
        $params = collect($request->all())->filter(function ($value, $key) {
            return $value != null;
        });

        $response = $this->userRepository->update($params->all(), $request->_id);

        return back()->with(['alert-success' => 'Update Member Successfully.', 'members' => $response]);
    }

    /**
     * @param $statusId
     * @return string
     */
    private function setStatus($statusId)
    {
        return match ($statusId) {
            0 => 'Not verify',
            1 => 'Member',
            2 => 'Admin',
            99 => 'Ban',
            default => '-',
        };
    }
}
