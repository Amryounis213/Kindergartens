<!--begin::Status--->
<?php

if($model->status){
    $result = 'قيد العمل';
    $class = 'badge-light-success';

}
else{
    $result ='متوقف الان';
    $class = 'badge-light-danger';

}

if ($model->cancel == 1) {
    $result = 'ملغي';
    $class = 'badge-light-danger';
} else
if ($model->status == 2) {
    $result = __('Check done');
    $class = 'badge-light-info';
} else if ($model->status == 3) {
    if (auth()->user()->role_id == 10 && $model->pharmacy_payment == 0) {
        $result = __('Ready to pay');
        $class = 'badge-light-danger';
    } else if (auth()->user()->role_id == 12 && $model->lab_payment == 0) {
        $result = __('Ready to pay');
        $class = 'badge-light-danger';
    } else if (auth()->user()->role_id == 13 && $model->xray_payment == 0) {
        $result = __('Ready to pay');
        $class = 'badge-light-danger';
    } else {
        $result = __('Check done');
        $class = 'badge-light-info';
    }
} else if ($model->status > 3) {
    if (auth()->user()->role_id == 10 && $model->pharmacy_payment > 0) {
        $result = __('paid');
        $class = 'badge-light-success';
    } else if (auth()->user()->role_id == 12 && $model->lab_payment > 0) {
        $result = __('paid');
        $class = 'badge-light-success';
    } else if (auth()->user()->role_id == 13 && $model->xray_payment > 0) {
        $result = __('paid');
        $class = 'badge-light-success';
    } else {
        $result = __('Check done');
        $class = 'badge-light-info';
    }
}
?>
<div class="badge {{$class}}">{{$result}}</div>
<!--end::Status--->
