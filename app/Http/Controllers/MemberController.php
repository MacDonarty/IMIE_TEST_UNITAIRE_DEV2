<?php
/**
 * Created by IntelliJ IDEA.
 * User: Valentin
 * Date: 20/04/2018
 * Time: 10:24
 */

namespace App\Http\Controllers;


class MemberController
{
    private $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    /**
     * Il faut retourner à la vue un liste tâches
     */
    public function index(Request $request)
    {
        $members = $this->memberService->lists();

        return view('members.index', [
            'members' => $members,
            'alert' => $request->session()->get('alert')
        ]);
    }

    public function create(Request $request)
    {
        $values = $request->only([
            Member::EMAIL
        ]);

        if($this->validForm($values, [
            Member::EMAIL => 'required'
        ])) {
            return redirect()->action('MemberController@index')
                ->with('alert', [
                    'message' => 'required_fields',
                    'type' => 'warning'
                ]);
        }

        try {
            $this->memberService->create($values[Member::EMAIL]);
        } catch (EmailAlreadyExistException $e) {
            return redirect()->action('MemberController@index')
                ->with('alert', [
                    'message' => 'already_exist',
                    'type' => 'warning'
                ]);
        }

        return redirect()->action('MemberController@index')
            ->with('alert', [
                'message' => 'success_message',
                'type' => 'success'
            ]);
    }

    /*private function validForm(array $values, array $rules): bool
    {
        $validator = Validator::make($values, $rules);

        if($validator->fails()) {
            return true;
        }

        return false;
    }*/
}