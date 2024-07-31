@extends('metronic.layouts.app')
@section('title', 'Show ' . ucfirst(config('settings.document_label_singular')))

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
                    style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('{{ asset('metronic_8.2.6/media/illustrations/sketchy-1/4.png') }}')">
                    <div class="card-header pt-10">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">File Manager</h2>
                                <div class="text-muted fw-bold">
                                    <a href="#">docsys</a>
                                    <span class="mx-3">|</span>
                                    <a href="#">File Manager</a>
                                    <span class="mx-3">|</span>2.6 GB
                                    <span class="mx-3">|</span>758 items
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <div class="d-flex overflow-auto h-20px">
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-header pt-8">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-filemanager-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-15"
                                    placeholder="Search Files & Folders" />
                            </div>
                        </div>

                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                @if (empty($document->lock_status) || $document->lock_status == 0)
                                    <button data-bs-toggle="modal" data-bs-target="#kt_modal_lock" type="button"
                                        class="btn btn-sm btn-primary me-3">
                                        <i class="fas fa-lock fs-2"></i>Lock File
                                    </button>
                                @else
                                    <a href="{{ route('documents.unlock', ['id' => $document->id]) }}"
                                        class="btn btn-sm btn-primary me-3">
                                        <i class="fas fa-unlock fs-2"></i>Unlock File
                                    </a>
                                @endif
                            </div>
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                <button type="button" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upload_new_version">
                                    <i class="ki-solid ki-file fs-2">
                                    </i>Upload new version</button>
                            </div>
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                <a href="{{ route('files.downloadZip', ['dir' => 'original', 'id' => $document->id]) }}"
                                    type="button" class="btn btn-sm btn-primary me-3">
                                    <i class="ki-solid ki-archive fs-2">
                                    </i>Download Zip</a>
                            </div>

                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                <button type="button" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#">
                                    <i class="ki-solid ki-gear fs-2">
                                    </i>Modify</button>
                            </div>

                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-filemanager-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-filemanager-table-select="delete_selected">Delete
                                    Selected</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Breadcumbs --}}
                        <div class="d-flex flex-stack mb-8">
                            <div class="badge badge-lg badge-light-primary">
                                <div class="d-flex align-items-center flex-wrap">
                                    <i class="ki-duotone ki-home fs-2 text-primary me-3">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <a href="{!! route('documents.index') !!}">Home </a>

                                    {{-- <i class="ki-duotone ki-right fs-2 text-primary mx-1"></i>
                                    <a href="#">themes</a>

                                    <i class="ki-duotone ki-right fs-2 text-primary mx-1"></i>
                                    <a href="#">html</a> --}}

                                    <i class="ki-duotone ki-right fs-2 text-primary mx-1"></i>
                                    {{ $document->name }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h1>{{ $document->name }}</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                        <tbody class="fw-semibold text-gray-600">
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="ki-solid ki-calendar fs-2 me-2">
                                                                        </i>Created
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    {{ formatDateTime($document->created_at) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="ki-solid ki-wallet fs-2 me-2">
                                                                        </i>Document ID
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    9c986e2e-44e4-4e74-938d-ba79d187e08a</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                        <tbody class="fw-semibold text-gray-600">
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="ki-solid ki-calendar fs-2 me-2">
                                                                        </i>Last Updated
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    {{ formatDateTime($document->updated_at) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                        <tbody class="fw-semibold text-gray-600">
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        Share to
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    <div class="d-flex justify-content-end"
                                                                        data-kt-filemanager-table-toolbar="base">
                                                                        <button data-bs-toggle="modal"
                                                                            data-bs-target="#kt_modal_share_file"
                                                                            type="button"
                                                                            class="btn btn-sm btn-primary me-3">
                                                                            {{-- <i class="ki-solid ki-share fs-2"></i> --}}
                                                                            Click to share</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        Approval
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    <div class="d-flex justify-content-end"
                                                                        data-kt-filemanager-table-toolbar="base">
                                                                        <button data-bs-toggle="modal"
                                                                            data-bs-target="#kt_modal_approval"
                                                                            type="button"
                                                                            class="btn btn-sm btn-primary me-3">
                                                                            {{-- <i class="ki-solid ki-share fs-2"></i> --}}
                                                                            Start approval</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        E-Sign
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    <div class="d-flex justify-content-end"
                                                                        data-kt-filemanager-table-toolbar="base">
                                                                        <a href="{{ route('files.downloadZip', ['dir' => 'original', 'id' => $document->id]) }}"
                                                                            type="button"
                                                                            class="btn btn-sm btn-primary me-3">
                                                                            {{-- <i class="ki-solid ki-check fs-2"> --}}
                                                                            </i>Click to edit</a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Audit Log</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-5 gy-0 mb-0">
                                                <thead>
                                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                        {{-- <th class="min-w-100px">Time</th> --}}
                                                        <th class="min-w-175px">User</th>
                                                        <th class="min-w-70px">Activity</th>
                                                        {{-- <th class="min-w-100px">Customer Notifed</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    @foreach ($document->activities as $activity)
                                                        {{-- <li>
                                                            <i class="fa fa-user bg-aqua" data-toggle="tooltip"
                                                                title="{{ $activity->createdBy->name }}"></i>

                                                            <div class="timeline-item">
                                                                <span class="time" data-toggle="tooltip"
                                                                    title="{{ formatDateTime($activity->created_at) }}"><i
                                                                        class="fa fa-clock-o"></i>
                                                                    {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>

                                                                <h4 class="timeline-header no-border">
                                                                    {!! $activity->activity !!}</h4>
                                                            </div>
                                                        </li> --}}

                                                        <tr>
                                                            <td>{{ $activity->createdBy->name }}</td>
                                                            <td>
                                                                <div class="timeline-item">
                                                                    <span class="time" data-toggle="tooltip"
                                                                        title="{{ formatDateTime($activity->created_at) }}"><i
                                                                            class="fa fa-clock-o"></i>
                                                                        {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>

                                                                    <h4 class="timeline-header no-border">
                                                                        {!! $activity->activity !!}</h4>
                                                                </div>
                                                            </td>
                                                            {{-- <td>No</td> --}}
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_lock" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="none" id="kt_modal_lock_form">
                    <div class="modal-header">
                        <h2 class="fw-bold">Lock files</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div class="modal-body pt-10 pb-15 px-lg-17">
                        <div class="form-group">
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">Are you
                                            sure you want to lock the file?</a>
                                        <div class="fs-6 fw-semibold text-gray-500">Other editors will not be able to
                                            change the metadata or add new versions until the file is unlocked. The file
                                            unlocks automatically after 6 hours if you don't unlock it first.</div>
                                    </div>
                                </div>
                                {{-- <div class="d-flex justify-content-end">
                                    <div class="form-check form-check-solid form-check-custom form-switch">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="lockswitch">
                                        <label class="form-check-label" for="lockswitch"></label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> --}}
                        <a href="{{ route('documents.lock', ['id' => $document->id]) }}" type="button"
                            class="btn btn-primary">Lock</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="kt_modal_share_file" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-800px">

            <div class="modal-content">
                {!! Form::open(['route' => ['documents.mail.share', $document->id], 'method' => 'post']) !!}

                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body pt-10 pb-15 px-lg-17">
                    {!! Form::hidden('curent_link', Request::url()) !!}

                    <div class="mw-lg-600px mx-auto">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Share file "{{ $document->name }}"</h1>
                            {{-- <div class="text-muted fw-semibold fs-5">If you need more info, please check
                                <a href="#" class="link-primary fw-bold">Author Commision</a>.
                            </div> --}}
                        </div>
                        <div class="mb-10">
                            <h4 class="fs-5 fw-semibold text-gray-800">Share by link</h4>
                            <div class="d-flex">
                                <input id="kt_share_earn_link_input" type="text"
                                    class="form-control form-control-solid me-3 flex-grow-1" name="search"
                                    value="https://docsys.com/?ref=skitechnology" />
                                <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bold flex-shrink-0"
                                    data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                            </div>
                        </div>

                        <div class="mb-10">
                            <h4 class="fs-5 fw-semibold text-gray-800">Or share by email</h4>
                            <div class="d-flex flex-column mb-10 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">Email</label>
                                <select name="email" id="share_to_email" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select a email..."
                                    class="form-select form-select-solid">
                                    <option value="">Select a Email...</option>
                                    <option value="hubungi.yogi@gmail.com">hubungi.yogi@gmail.com</option>
                                    <option value="noreply.dev.std@gmail.com">noreply.dev.std@gmail.com</option>
                                    <option value="1">a@company.com</option>
                                    <option value="2">b@company.com</option>
                                    <option value="3">c@company.com</option>
                                    <option value="4">d@company.com</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="d-flex">
                            <a href="#" class="btn btn-light w-100">
                                <img alt="Logo" src="assets/media/svg/social-logos/google.svg"
                                    class="h-15px me-3" />Import Contacts</a>
                            <a href="#" class="btn btn-light w-100 mx-6">
                                <img alt="Logo" src="assets/media/svg/social-logos/facebook.svg"
                                    class="h-20px me-3" />Facebook</a>
                            <a href="#" class="btn btn-light w-100">
                                <img alt="Logo" src="assets/media/svg/social-logos/twitter.svg"
                                    class="h-20px me-3" />Twitter</a>
                        </div> --}}
                        <div class="d-flex align-items-center mt-10">
                            <div class="flex-grow-1">
                                <span class="fs-6 fw-semibold text-gray-800 d-block">Adding Users by Team Members</span>
                                <span class="fs-7 fw-semibold text-muted">If you need more info, please check budget
                                    planning</span>
                            </div>
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                <span class="form-check-label">Allowed</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_share_file_cancel" data-bs-dismiss="modal"
                        class="btn btn-light me-3">Cancel</button>
                    <button type="submit" id="kt_modal_share_file_submit" class="btn btn-primary">
                        <span class="indicator-label">Share</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    {{-- <a class="btn btn-primary"
                    href="{{ route('documents.mail.share', ['id' => $document->id, 'curent_link' => Request::url()]) }}">Share</a> --}}
                    <!--end::Button-->
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>


    <div class="modal fade" id="kt_modal_approval" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_approval_header">
                    <h2>Approval workflow for "{{ $document->name }}"</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>

                {!! Form::open(['route' => ['documents.mail.approval', $document->id], 'method' => 'post']) !!}
                <div class="modal-body py-10 px-lg-17">
                    {!! Form::hidden('curent_link', Request::url()) !!}

                    <div class="scroll-y me-n7 pe-7" id="kt_modal_approval_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_approval_header"
                        data-kt-scroll-wrappers="#kt_modal_approval_scroll" data-kt-scroll-offset="300px">
                        {{-- <div
                                class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                                <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <div class="d-flex flex-stack flex-grow-1">
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Please Note!</h4>
                                        <div class="fs-6 text-gray-700">note
                                            <a href="#">a</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Resolution</label>
                            <textarea class="form-control form-control-solid" rows="3" name="resolution" placeholder=""></textarea>
                        </div>
                        {{-- <div class="mb-5 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">API Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Your API Name"
                                    name="name" />
                            </div>
                            <div class="d-flex flex-column mb-5 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">Short Description</label>
                                <textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Describe your API"></textarea>
                            </div>
                            <div class="d-flex flex-column mb-10 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">Category</label>
                                <select name="category" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a Category..." class="form-select form-select-solid">
                                    <option value="">Select a Category...</option>
                                    <option value="1">CRM</option>
                                    <option value="2">Project Alice</option>
                                    <option value="3">docsys</option>
                                    <option value="4">General</option>
                                </select>
                            </div> --}}


                        <div class="d-flex flex-column mb-10 fv-row">
                            <h4 class="fs-5 fw-semibold text-gray-800">Email</h4>
                            <div class="d-flex flex-column mb-10 fv-row">
                                {{-- <label class="required fs-5 fw-semibold mb-2">Email</label> --}}
                                <select name="email" id="share_to_email" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select a email..."
                                    class="form-select form-select-solid">
                                    <option value="">Select a Email...</option>
                                    <option value="hubungi.yogi@gmail.com">hubungi.yogi@gmail.com</option>
                                    <option value="noreply.dev.std@gmail.com">noreply.dev.std@gmail.com</option>
                                    <option value="1">a@company.com</option>
                                    <option value="2">b@company.com</option>
                                    <option value="3">c@company.com</option>
                                    <option value="4">d@company.com</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-10">
                            <div class="mb-3">
                                <label class="d-flex align-items-center fs-5 fw-semibold">
                                    <span class="required">After successfull workflow</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        title="Your billing numbers will be calculated based on your API method">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <div class="fs-7 fw-semibold text-muted">If you need more info, please check workflow
                                    documentation</div>
                            </div>
                            <div class="fv-row">
                                <div class="btn-group w-100" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]">
                                    <label class="btn btn-outline btn-active-success btn-color-muted"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="method" value="1" />
                                        Move</label>
                                    <label class="btn btn-outline btn-active-success btn-color-muted active"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="method" checked="checked"
                                            value="2" />
                                        Do nothing</label>
                                    {{-- <label class="btn btn-outline btn-active-success btn-color-muted"
                                            data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="3" />
                                            UI/UX</label>
                                        <label class="btn btn-outline btn-active-success btn-color-muted"
                                            data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="4" />
                                            Docs</label> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_approval_cancel" class="btn btn-light me-3">Cancel</button>
                    <button type="submit" id="kt_modal_approval_submit" class="btn btn-primary">
                        <span class="indicator-label">Start</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>


    <div class="modal fade" id="kt_modal_upload_new_version" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_upload_new_version_header">
                    <h2>Upload a new version of "{{ $document->name }}"</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>

                {!! Form::open(['route' => ['documents.mail.approval', $document->id], 'method' => 'post']) !!}
                <div class="modal-body py-10 px-lg-17">
                    {!! Form::hidden('curent_link', Request::url()) !!}

                    <div class="scroll-y me-n7 pe-7" id="kt_modal_upload_new_version_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_upload_new_version_header"
                        data-kt-scroll-wrappers="#kt_modal_upload_new_version_scroll" data-kt-scroll-offset="300px">
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                            <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Please Note!</h4>
                                    <div class="fs-6 text-gray-700">New version document will update your main document
                                        attached...
                                        {{-- <a href="#">a</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">

                            <div class="fv-row mb-2">
                                <!--begin::Dropzone-->
                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                    <!--begin::Message-->
                                    <div class="dz-message needsclick">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="ms-4">
                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to
                                                upload.</h3>
                                            <span class="fs-7 fw-semibold text-gray-500">Upload up to 10
                                                files</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Dropzone-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the product media gallery.</div>

                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="submit" id="kt_modal_upload_new_version_submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    @endsection
