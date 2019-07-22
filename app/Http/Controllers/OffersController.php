<?php

namespace App\Http\Controllers;
use App\Offer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class OffersController extends Controller
{


    public function index(Request $request)
    {
        $Offers = Offer::orderBy('id', 'desc')->paginate(5);

        return view('Offers')->with('Offers',$Offers);
    }
    public function login()
    {
      return view('partials.login');
    }
    public function login2(Request $request)
    {
        $name=$request->input('name');
        $password=$request->input('password');

        $data=User::where('name','=',$name);


        if ($data)
        {
          $data2=User::where('password','=',$password);
          if($data2)
          {
            $Offers = Offer::orderBy('id', 'desc')->paginate(5);

            return view('Offers')->with('Offers',$Offers);
          }
        }
  

    }
    public function chart()
    {
        $roz=['26/05/2018','27/08//2018','29/08/2018','30/08/2018','01/09/2018'];
        $count=[500,2000,8900,1600,400];
        return view('partials.charts',compact('roz','count'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->input(), array(
            'Offer' => 'required',
            'description' => 'required',
            'code' => 'required',

        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $Offer = Offer::create($request->all());

        return response()->json([
            'error' => false,
            'Offer'  => $Offer,
        ], 200);

    }

    public function show($id)
    {
        $Offer = Offer::find($id);

        return response()->json([
            'error' => false,
            'Offer'  => $Offer,
        ], 200);
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {

                $data = Offer::where('Offer','like', "%$query%")
                    ->orWhere('code', $query)
                    ->Where('description', 'like', "%$query%")
                    ->get();



            } else {
                $data = Offer::all()
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
            foreach ($data as $row) {
                $output .=
                    '<tr>' .
                    '<td>' . $row->id . '</td>' .
                    '<td>' . $row->Offer . '</td>' .
                    '<td>' . $row->created_at . '</td>' .
                    '<td>' . $row->description . '</td>' .
                    '<td>' . $row->code . '</td>' .
                    '</tr>
                     ';
                }
            }
            else
            {
                $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                 ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row,
                'error' =>false
            );
            echo json_encode($data,200);

        }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'Offer' => 'required',
            'description' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $Offer = Offer::find($id);

        $Offer->Offer        =  $request->input('Offer');
        $Offer->description = $request->input('description');

        $Offer->save();

        return response()->json([
            'error' => false,
            'Offer'  => $Offer,
        ], 200);
    }

    public function destroy($id)
    {
        $Offer = Offer::destroy($id);

        return response()->json([
            'error' => false,
            'Offer'  => $Offer,
        ], 200);
    }



}
