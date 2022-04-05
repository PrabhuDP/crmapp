<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use CommonHelper;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index(Type $var = null)
    {
        $params = array('btn_name' => 'Tasks', 'btn_fn_param' => 'tasks');
        return view('crm.tasks.index', $params);
    }

    public function ajax_list( Request $request ) {
        
        if (! $request->ajax()) {
            return response('Forbidden.', 403);
        }

        $columns            = [ 'id', 'task_name',  'assigned_to', 'created_at', 'status', 'id' ];

        $limit              = $request->input( 'length' );
        $start              = $request->input( 'start' );
        $order              = $columns[ intval( $request->input( 'order' )[0][ 'column' ] ) ];        
        $dir                = $request->input( 'order' )[0][ 'dir' ];
        $search             = $request->input( 'search.value' );
       
        $total_list         = Task::roledata()->count();
        // DB::enableQueryLog();
        
        if( $order != 'id') {
            $list               = Task::roledata()->skip($start)->take($limit)->orderBy($order, $dir)
                                ->search( $search )
                                ->get();
        } else {
            $list               = Task::roledata()->skip($start)->take($limit)->Latests()
                                ->search( $search )
                                ->get();
        }
        // $query = DB::getQueryLog();
        if( empty( $request->input( 'search.value' ) ) ) {
            $total_filtered = Task::roledata()->count();
        } else {
            $total_filtered = Task::roledata()->search( $search )
                                ->count();
        }
        
        $data           = array();
        if( $list ) {
            $i=1;
            foreach( $list as $tasks ) {
                $comp = '&emsp;<span class="badge bg-warning" role="button" onclick="return complete_task('.$tasks->id.')"> Click To Complete</span>';

                $tasks_status                         = '<div class="badge bg-danger" role="button" onclick="change_status(\'tasks\','.$tasks->id.', 1)"> Inactive </div>';
                if( $tasks->status == 1 ) {
                    $tasks_status                     = '<div class="badge bg-success" role="button" onclick="change_status(\'tasks\','.$tasks->id.', 0)"> Active </div>';
                } else if( $tasks->status == 2) {
                    $tasks_status                     = '<div class="badge bg-primary" role="button" > Completed </div>';
                    $comp = '';
                }
                $action = '';
                if(Auth::user()->hasAccess('tasks', 'is_view')) {
                    $action .= '<a href="javascript:void(0);" class="action-icon" onclick="return view_modal(\'tasks\', '.$tasks->id.')"> <i class="mdi mdi-eye"></i></a>';
                }
                if(Auth::user()->hasAccess('tasks', 'is_edit')) {
                    $action .= '<a href="javascript:void(0);" class="action-icon" onclick="return get_add_modal(\'tasks\', '.$tasks->id.')"> <i class="mdi mdi-square-edit-outline"></i></a>';
                }
                if(Auth::user()->hasAccess('tasks', 'is_delete')) {
                    $action .= '<a href="javascript:void(0);" class="action-icon" onclick="return common_soft_delete(\'tasks\', '.$tasks->id.')"> <i class="mdi mdi-delete"></i></a>';
                }

                $nested_data[ 'id' ]                = '<div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck2" value="'.$tasks->id.'">
                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                </div>';


                $nested_data[ 'task_name' ]         = $tasks->task_name;
                $nested_data[ 'assigned_to' ]       = $tasks->assigned->name ?? '';
                $nested_data[ 'assigned_by' ]       = $tasks->added->name ?? '';
                $nested_data[ 'assigned_date' ]     = (date('d-m-Y H:i A', strtotime($tasks->created_at ) ) ?? '' ).' '.$comp;
                $nested_data[ 'status' ]            = $tasks_status;
                $nested_data[ 'action' ]            = $action;
                $data[]                             = $nested_data;
            }
        }

        return response()->json( [ 
            'draw'              => intval( $request->input( 'draw' ) ),
            'recordsTotal'      => intval( $total_list ),
            'data'              => $data,
            'recordsFiltered'   => intval( $total_filtered )
        ] );

    }

    public function add_edit(Request $request) {
        if (! $request->ajax()) {
            return response('Forbidden.', 403);
        }
        $id = $request->id;
        $from = $request->from;
        $modal_title = 'Add Tasks';
        $users = User::whereNotNull('role_id')->get();
        if( isset( $id ) && !empty($id) ) {
            $info = Task::find($id);
            $modal_title = 'Update Tasks';
        }
        $params = ['modal_title' => $modal_title, 'id' => $id ?? '', 'info' => $info ?? '', 'users' => $users, 'from' => $from];
        return view('crm.tasks.add_edit', $params);
        echo json_encode(['view' => $view]);
        return true;
    }

    public function view(Request $request) {
        if (! $request->ajax()) {
            return response('Forbidden.', 403);
        }
        $id = $request->id;
        $modal_title = 'Task Info';
        $info = Task::find($id);
        $params = ['modal_title' => $modal_title, 'id' => $id ?? '', 'info' => $info ?? ''];
        return view('crm.tasks.view', $params);
    }

    public function save(Request $request)
    {
        $id = $request->id;
        $role_validator   = [
            'task_name'      => [ 'required', 'string', 'max:255'],
            'assigned_to'      => [ 'required', 'string', 'max:255'],
        ];
        
        //Validate the task
        $validator                     = Validator::make( $request->all(), $role_validator );
        
        if ($validator->passes()) {
            $ins['status']          = isset($request->status) ? 1 : 0;
            $ins['task_name']       = $request->task_name;
            $ins['assigned_to']     = $request->assigned_to;
            $ins['description']     = $request->description;
            
            if( isset($id) && !empty($id) ) {
                $page = Task::find($id);
                $page->status = isset($request->status) ? 1 : 0;
                $page->task_name = $request->task_name;
                $page->assigned_to = $request->assigned_to;
                $page->updated_by = Auth::id();
                $page->description = $request->description;
                $page->update();
                $success = 'Updated Task';
            } else {
                $ins['added_by'] = Auth::id();
                Task::create($ins);
                $success = 'Added new Task';
            }
            return response()->json(['error'=>[$success], 'status' => '0']);
        }
        return response()->json(['error'=>$validator->errors()->all(), 'status' => '1']);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $role = Task::find($id);
        $role->delete();
        $delete_msg = 'Deleted successfully';
        return response()->json(['error'=>[$delete_msg], 'status' => '0']);
    }

    public function change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        if(Auth::user()->hasAccess('tasks', 'is_edit')) {

            $page = Task::find($id);
            $page->status = $status;
            $page->update();
            $update_msg = 'Updated successfully';
            $status = '0';
        } else {
            $update_msg = 'You Do not have access to change status';
            $status = '1';
        }
        return response()->json(['error'=> $update_msg, 'status' => $status]);
    }

    public function complete_task(Request $request) {
        $id = $request->id;
        $status = 2;
        if(Auth::user()->hasAccess('tasks', 'is_edit')) {

            $page = Task::find($id);
            $page->status = $status;
            $page->update();
            $update_msg = 'Updated successfully';
            $status = '0';
        } else {
            $update_msg = 'You Do not have access to change status';
            $status = '1';
        }
        return response()->json(['error'=> $update_msg, 'status' => $status]);
    }
}
