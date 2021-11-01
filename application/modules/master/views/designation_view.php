<?php $theme_path = $this->config->item('theme_locations') . 'vnrpolice';?>
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Designation
            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?php echo base_url();?>user/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-dark">Lists</li>
            </ul>
        </div>
        <div class="d-flex align-items-center py-1">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">Add User</button>
        </div>
    </div>
</div>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th     >S.No</th>
                            <th class="min-w-125px">Designation</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                    <!--begin::Table row-->
                    <?php  
                    $sno = 1;
                    foreach ($designation->result() as $row)  
                    {  
                        ?><tr>  
                        <td><?php echo $sno; ?></td>  
                        <td><?php echo $row->vDesignationName;?></td>  
                        <td><?php 
                        if ($row->tStatus == 0) {
                        echo ("<div class=\"badge badge-light-success fw-bolder\">Active</div>");
                        }else{
                        echo ("<div class=\"badge badge-light-danger fw-bolder\">Inactive</div>");
                        }
                    $sno++; 
                        ?></td>  
                        <td>
                        <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user" href="<?php echo base_url('master/designation/edit/'.$row->iDesignationId)?>"><span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path></svg></span></a>
                        <a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('master/designation/delete/'.$row->iDesignationId) ?>"><span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path></svg></span></a>
                        <div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">Edit User</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->

                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y">
                                        <!--begin::Form-->
                                        <form id="kt_modal_edit_user_form" method="post" class="form" action="<?php echo base_url('master/designation/update/'.$row->iDesignationId)?>">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Designation</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="designation_name" class="form-control form-control-solid mb-3 mb-lg-0"  value="<?php echo $row->vDesignationName ?>"/>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-5">Status</label>
                                                    <!--end::Label-->
                                                    <!--begin::Roles-->
                                                    <!--begin::Input row-->
                                                    <div class="d-flex fv-row">
                                                        <!--begin::Radio-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="status" type="radio" value="0" id="kt_modal_update_role_option_0" 
                                                            <?php
                                                                if($row->tStatus=='0')
                                                            {
                                                            echo "checked";
                                                            }
                                                            ?>>Active
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <!-- <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                                <div class="fw-bolder text-gray-800">Active</div>
                                                            </label> -->
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input row-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Input row-->
                                                    <div class="d-flex fv-row">
                                                        <!--begin::Radio-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" name="status" type="radio" value="1" id="kt_modal_update_role_option_1"
                                                            <?php
                                                                if($row->tStatus =='1')
                                                            {
                                                            echo "checked";
                                                            }
                                                            ?>>Inactive
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <!-- <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                                <div class="fw-bolder text-gray-800">Inactive</div>
                                                            </label> -->
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Radio-->
                                                    </div>
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                            </div>
                            <!--end::Modal content-->
                        </div>
                        
                    </td>
                        </tr>  
                        
                    <?php 
                    }  
                    ?>  
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Add User</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y">
                <form id="kt_modal_add_user_form" method="post" class="form" action="<?php echo base_url();?>master/designation/save_data/">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">Designation</label>
                            <input type="text" name="designation_name" class="form-control form-control-solid mb-3 mb-lg-0"/>
                        </div>
                        <div class="mb-7">
                            <label class="required fw-bold fs-6 mb-5">Status</label>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="status" type="radio" value="0" id="kt_modal_update_role_option_0" />
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">Active</div>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="status" type="radio" value="1" id="kt_modal_update_role_option_1" />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="fw-bolder text-gray-800">Inactive</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form validation -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script>
$(document).ready(function () {
$("#submit1").on('click',function () {
var error = 0;
$('#form').find('.required').each(function(){
var _val = $(this).val();
var type = $(this).attr('type');
if(type == 'radio'){
    var gender = $('input[name="status"]:checked').length;
    
    if(gender == 0){
        $(this).closest('div.form-group').find('span.val').text("Required Field");
    }else{
        $(this).closest('div.form-group').find('span.val').text("");
        $('input[name="gender"]').removeClass('required');
    }
}else{
    if(_val == ''){
        error++;  
        $(this).closest('div').find('span.val').text("Required Field");
    }else{
        $(this).closest('div').find('span.val').text("");
    }    
}

});//alert(error);
if(error > 0){
    return false;
}else{
$("form").submit();
}
});
var form_validation = false;
$(".group_name").on('blur', function() {
    var name = $(".group_name").val();
    var filter = /^[a-zA-Z.\s]+[\S]{3,30}$/;
    if (name == "" || name == null || name.trim().length == 0) {
        form_validation = false;
        $("#input1").html("Required Field");
        // return false;
    } else if (!filter.test(name)) {
        form_validation = false;
        $("#input1").html("Alphabets and Min 3 to Max 30 without space ");
        // return false;
    } else {
        $("#input1").html("");
        form_validation = true;
        // return true;
    }
});
$(".status").on('blur', function() {
var status = $("#status").val();
if (status == "") {
    form_validation = false;
    $("#input2").html("Required Field");
}else {
    form_validation = true;
    $("#input2").html("");
}
});
});
</script> -->