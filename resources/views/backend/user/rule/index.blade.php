@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Permission
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row"> 
       <div class="col-md-6">
          <ul class="list-group">
            @foreach(\App\Libraries\Acl\Models\Role::all() as $data)
              <li class="list-group-item  @if($selected_role == $data->id) list-active  @endif "><a href="{{url('acl/rule?role_id='.$data->id)}}"> {{$data->name}} </a></li>

            @endforeach
          </ul>              
        </div>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
              <?php 
                function get_access($role_id = null, $url_id = null, $current_rules = []){
                  $access = 'deny';
                  if($role_id && $url_id && !empty($current_rules)){
                    foreach ($current_rules as $item) {
                      if($item->role_id == $role_id && $item->url_id == $url_id && $item->access == 'allow'){
                        $access = 'allow';
                      }
                    }
                  }
                  // var_dump($access);
                  return $access;
                }
              ?>
              @if($role_id)
                <table width="100%" class="table table-bordered ">
                  <thead>
                   
                    <tr>
                      <th rowspan="2" class="text-center" style="justify-content: center;
  align-items: center;">URL</th>
                      <th colspan="2" class="text-center">Acces</th>
                    </tr>
                    <tr>
                      <th class="text-center">ALlow</th>
                      <th class="text-center">Deny</th>
                    </tr>

                  </thead>
                  <tbody>
                    <form action="{{url('acl/rule/update/'.$role_id)}}" method="post">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      @foreach($urls as $data)
                      <tr>
                        <td>
                         {{ $data->url }}
                        </td> 
                        <td><input type="radio" name="rules[{{$data->id}}]"  value="allow" class="check-allow" @if(get_access($role_id,$data->id,$current_rules) == 'allow') checked @endif>Allow</td>
                        <td><input type="radio" name="rules[{{$data->id}}]" value="deny" class="check-deny" @if(get_access($role_id,$data->id,$current_rules) == 'deny') checked @endif>Deny</td> 
                      </tr>
                      @endforeach
                      <div class="demo-button">
                        <button class="btn btn-primary pull-right" type="submit">Save</button>
                        <button type="button" class="btn btn-primary" id="all_allow" >All Allow</button>
                        <button type="button" class="btn btn-primary" id="all_deny">All Deny</button>
                      </div>
                                   
                    </form>
                  </tbody>
                 
                </table>
              @endif
            </div>
          </div> 
        </div>
      </div>
    </section>
  </div>
 @endsection 