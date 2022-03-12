<!--begin::Status--->
@php
if($model->status && $model->JobPlacement){
    $result = 'قيد العمل & مسكن';
    $class = 'badge-light-success';
}
else if($model->status && (!$model->JobPlacement)){
    $result ='غير مسكن';
    $class = 'badge-light-info';
}
else if(!$model->status && (!$model->JobPlacement)){
    $result ='متوقف & غير مسكن';
    $class = 'badge-light-danger';
}
else{
    $result ='لا يعمل';
    $class = 'badge-light-danger';
}



@endphp
<div class="badge {{$class}}">{{$result}}</div>
<!--end::Status--->
