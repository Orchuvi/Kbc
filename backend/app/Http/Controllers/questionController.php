<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class questionController extends Controller
{
    function getQuestions(){
        // $questions = DB::table('questions')->get();
        // return response()->json(["questions"=>$questions]);

        // $result = DB::select(Db::raw('select category,GROUP_CONCAT(question,\':[\',option1,\',\',option2,\',\',option3,\',\',option4,\',\',correct,\']\') AS questions from questions group by category'));
        $results = DB::table('questions')
    ->select('category', 'question', 'option1', 'option2', 'option3', 'option4', 'correct','id')
    ->where('visible','=',0)
    ->orderBy('category')
    ->get();

    
    return response()->json($results);
    }

    function updateQuestionStatus(Request $request){
        
        $question_id = $request->input('id');
        DB::table('questions')
        ->where('id','=',$question_id)
        ->update(['visible'=>1]);

    }
    function upload(Request $request){
        $json_data = $request->input('data');
        // $data = json_decode($json_data, true);

        foreach ($json_data as $record) {
            $id = $record['Primary VC Id'];
            $ques = $record['Merged Vc Id'];
            $opt1 = $record['Merged Vendor Name'];
            $opt2 = $record['VMP Vendor Id'];
            $opt3 = $record['Parent Vendor Id'];
            $opt4 = $record['Vendor Number'];
            $crt = $record['Business Name'];
            $cat = $record['Dba Name'];
            $vis = $record['Tax Name'];
            $que = $record['Description'];
            $opt5 = $record['Business Code'];
            $opt6 = $record['Tax Id Old'];
            $opt7= $record['Industry Id'];
            $opt8 = $record['Is Ssn'];
            $crt9 = $record['Regd State'];
            $cat10= $record['Is Public Traded'];
            $vis11 = $record['Is National'];
            $opt12 = $record['Is Credential Key'];
            $opt13 = $record['Is Tax Name Valid'];
            $opt14 = $record['Is Migrated'];
            $opt15 = $record['Is Offline'];
            $crt16 = $record['Minority Types'];
            $cat17 = $record['Status Id'];
            $vis18 = $record['Logo Image'];
            $que19 = $record['Url'];
            $opt20 = $record['Social Links'];
            $opt21 = $record['Office Hours'];
            $opt22= $record['Service Areas'];
            $opt23 = $record['Primary Contact'];
            $crt24 = $record['Created By'];
            $cat25= $record['Updated By'];
            $vis26 = $record['Created At'];


            $opt27 = $record['Updated At'];
            $opt28 = $record['Deleted At'];
            $opt29 = $record['Cd Vendor Id'];
            $opt30 = $record['Ops Vendor Id'];
            $opt31 = $record['Master Org Id'];
            $opt32 = $record['Profile Strength'];
            $opt33 = $record['Profile Strength Detail'];
            $opt34 = $record['Registered At'];

            $opt35 = $record['Matches'];
            $opt36 = $record['Visible Matches'];
            $opt37 = $record['Profile Views'];
            $opt38 = $record['Tax Id'];
            $opt39 = $record['Tax Id Hash'];
            $opt40 = $record['Validity Score'];
            $opt41 = $record['Is Ops Online'];
            // Insert record into the database
            DB::table('excel_data')->insert([
                'Primary VC Id' => $id,
                'Merged Vc Id' => $ques,
                'Merged Vendor Name' => $opt1,
                'VMP Vendor Id' => $opt2,
                'Parent Vendor Id' => $opt3,
                'Vendor Number' => $opt4,
                'Business Name' => $crt,
                'cateDba Namegory'=> $cat,
                'Tax Name' => $vis,
                'Description' => $que,
                'Business Code' => $opt5,
                'Tax Id Old' => $opt6,
                'Industry Id' => $opt7,
                'Is Ssn' => $opt8,
                'Regd State' => $crt9,
                'Is Public Traded'=> $cat10,
                'Is National' => $vis11,
                'Is Credential Key' => $opt12,
                'Is Tax Name Valid' => $opt13,
                'Is Migrated' => $opt14,
                'Is Offline' => $opt15,
                'Minority Types' => $crt16,
                'Status Id' => $cat17,
                'Logo Image'=> $vis18,
                'Url' => $que19,
                'Social Links' =>$opt20,
                'Office Hours' =>  $opt21,
                'Service Areas' => $opt22,
                'Primary Contact' => $opt23,
                'Created By' => $crt24,
                'Updated By' => $cat25,
                'Created At'=> $vis26,

                'Updated At' => $opt27,
                'Deleted At' => $opt28,
                'Cd Vendor Id' => $opt29,
                'Ops Vendor Id' => $opt30,
                'Master Org Id' => $opt31,
                'Profile Strength' => $opt32,
                'Profile Strength Detail' => $opt33,
                'Registered At' => $opt34,

                'Matches' => $opt35,
                'Visible Matches' => $opt36,
                'Profile Views' => $opt37,
                'Tax Id' => $opt38,
                'Tax Id Hash' => $opt39,
                'Validity Score' => $opt40,
                'Is Ops Online' => $opt41,
        
            ]);
        }
        return response()->json(['message' => 'Sucessfully uploaded into database']);
    }
    function upload1(Request $request){
        $json_data = $request->input('data');
        // $data = json_decode($json_data, true);

        foreach ($json_data as $record) {
            $id = $record['id'];
            $ques = $record['question'];
            $opt1 = $record['option1'];
            $opt2 = $record['option2'];
            $opt3 = $record['option3'];
            $opt4 = $record['option4'];
            $crt = $record['correct'];
            $cat = $record['category'];
            $vis = $record['visible'];
            // Insert record into the database
            DB::table('questions')->insert([
                'id' => $id,
                'question' => $ques,
                'option1' => $opt1,
                'option2' => $opt2,
                'option3' => $opt3,
                'option4' => $opt4,
                'correct' => $crt,
                'category'=> $cat,
                'visible' => $vis
            ]);
        }
        return response()->json(['message' => 'Sucessfully uploaded into database']);
    }

    
}
