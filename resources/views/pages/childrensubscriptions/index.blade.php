<x-base-layout>
    @include('layout.error')
<<<<<<< HEAD

 
=======
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812
    <!--begin::Container-->
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">

        <div class="card card-custom mb-3">

            <div class="card-body">
                <!--begin: Search Form-->
                <form class="mb-5">
                    <div class="row mb-6">
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>اسم الطالب:</label>
                            <select id="children_id" name="children_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر طالب</option>
                                @foreach ($childrens as $children)
                                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>االشعبة:</label>
                            <input id="division_id" type="text" disabled class="form-control datatable-input"
                                placeholder="" data-col-index="1">
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>المستوى:</label>
                            <input id="level_id" type="text" disabled class="form-control datatable-input"
                                placeholder="" data-col-index="4">
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>العام الدراسي:</label>
                            <select id="year" name="year" class="form-control datatable-input" data-col-index="2">
                                <option value="">اختر السنة الدراسية</option>

                                @foreach ($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
<<<<<<< HEAD
=======

>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>نوع الاشتراك:</label>
                            <select id="subscription_id" name="subscription_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر اشتراك</option>
                                @foreach ($subs as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>القيمة الافتراضية:</label>
                            <input id="required_amount" name="required_amount" type="text" disabled
                                class="form-control datatable-input" placeholder="" data-col-index="1">
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>نوع الخصم:</label>
                            <select disabled id="discount_id" name="discount_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر خصم</option>
                                @foreach ($dicsounts as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>نسبة الخصم:</label>
                            <input id="discount" name="discount" disabled type="text"
                                class="form-control datatable-input" placeholder="" data-col-index="4">
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>المبلغ المخصوم:</label>
                            <input id="discount_amount" disabled type="text" class="form-control datatable-input"
                                placeholder="مثال : 40" data-col-index="4">
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label> الاجمالي (المطلوب دفعه) :</label>
                            <input name="total" id="total" type="text" disabled class="form-control datatable-input"
                                placeholder="مثال : 40" data-col-index="4">
                        </div>
                    </div>
                    <div class="row mt-8">
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-primary--icon" id="sub">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>تسجيل بالاشتراك </span>
                                </span>
                            </button>&nbsp;&nbsp;
                            <button class="btn btn-secondary btn-secondary--icon" type="reset" id="kt_reset">
                                <span>
                                    <i class="la la-close"></i>
                                    <span>افراغ</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                <!--begin: Datatable-->
                <!--begin: Datatable-->

                <!--end: Datatable-->
            </div>
        </div>


        <!--begin::Card-->
        <div class="card">


            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                اجمالي ما تم الاشتراك به :
                <!--begin::Card title-->


            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                @include('pages.childrensubscriptions.parts._table')
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-base-layout>
