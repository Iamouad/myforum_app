@extends('layouts.app')

@section('content')
<div>
    @csrf
    <h2 class="mb-3">Users waiting for admission </h2>
    @if ($pendedUsers->count() > 0)
    @foreach ($pendedUsers as $user)
         <div id="{{'div'.$user->id}}" class="row">
            <div class="col p-2"> {{$user->username}}</div>
            <div class="col p-2">{{$user->created_at->diffForHumans()}}</div>
            <div class="col p-2"><button  onclick="approve(this.value)" value="{{$user->id}}" class="btn btn-success">Approve</button></div>
            <div class="col p-2"><button  onclick="reject(this.value)" value="{{$user->id}}" class="btn btn-danger">Reject</button></div>
            
        </div>
    @endforeach

    @else
        <p>There are no pended Users</p>
    @endif
</div>
<script>
  
    function approve(userId){
            //var userId = $('#approveUser').val();
            var CSRF_TOKEN =$('[name="_token"]').val();
            $.ajax({
                url:'/approve-user',
                type:'post',
                dataType: 'json',
                 data: {'userId': userId, _token: CSRF_TOKEN},
                success: function (result, status) {

                    console.log(result)
                    $('#div'+userId).remove();
                    //location.reload()
                },
                error : function(result, status, error){
                    console.log(error)
                    console.log(CSRF_TOKEN)

                }
            
            })
           
        }

        function reject(userId){
           // var userId = $('#rejectUser').val();
            var CSRF_TOKEN =$('[name="_token"]').val();
            $.ajax({
                url:'/reject-user',
                type:'post',
                dataType: 'json',
                 data: {'userId': userId, _token: CSRF_TOKEN},
                success: function (result, status) {
                    $('#div'+userId).remove();
                    console.log(result)
                    //location.reload()
                },
                error : function(result, status, error){
                    console.log(error)
                    console.log(CSRF_TOKEN)

                }
            
            })
           
        }

</script>
@endsection

