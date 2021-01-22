<?php

namespace App\Http\Controllers;

use App\qlsv_vaitro;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $user;
    private $qlsv_vaitro;
    public function __construct(User $user, qlsv_vaitro $qlsv_vaitro)
    {
        $this->user = $user;
        $this->qlsv_vaitro = $qlsv_vaitro;
    }

    public function index(Request $request)
    {
        $title = "Danh sách user";
        $users = $this->user->all();
        return view('admin.dsuser', compact(['users', 'title']));
    }

    public function edit($id)
    {
        $title = "Danh sách user";
        $users = User::find($id);
        $listRowOfUser = DB::table('qlsv_uservavaitros')->where('id_user',  $id)->pluck('id_vaitro');
        // dd($listRowOfUser);
        $qlsv_vaitros = $this->qlsv_vaitro->all();
        return view('admin.edituser', compact(['qlsv_vaitros', 'users', 'listRowOfUser','title']));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            DB::table('qlsv_uservavaitros')->where('id_user', $id)->delete();
            $userCreate = $this->user->find($id);
            
            // $userCreate->vaitros()->attach($request->vaitros);

             $qlsv_vaitros = $request->vaitros;
            foreach($qlsv_vaitros as $vaitroId){
                DB::table('qlsv_uservavaitros')->insert([
                    'id_user' => $userCreate->id,
                    'id_vaitro' => $vaitroId
                ]);
            }
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Loi:'.$exception->getMessage() . $exception->getLine());
        }
    }
}
