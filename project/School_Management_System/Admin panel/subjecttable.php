<?php
include_once("header.php");
?>
<style>
    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 16px;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
</style>
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 text-white">Subject List</h5>
                  <a href="subjectform" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add Subject
                    </a>
            </div>

            <div class="card-body">
                <!-- Search Filters -->
                <div class="row g-2 mb-3">
                    <div class="col-md-3">
                        <input type="text" id="searchID" class="form-control" placeholder="Search by ID">
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="searchsubject" class="form-control" placeholder="Search by Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="searchClass" class="form-control" placeholder="Search by Class">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="subjectTable">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Subject Name</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy Static Data -->
                            <tr>
                                <td>1</td>
                                <td>Mathematics</td>
                                <td>Class 1 - A</td>
                                <td>
                                    <a href="edit_subject.php?id=1" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Science</td>
                                <td>Class 2 - B</td>
                                <td>
                                    <a href="edit_subject.php?id=2" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>