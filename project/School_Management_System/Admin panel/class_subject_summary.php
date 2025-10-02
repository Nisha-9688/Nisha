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
                  <a href="add_subject.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add Subject
                    </a>
            </div>
     
    <h3 class="text-center mb-4">Class-wise Subject Summary</h3>
    <div class="row g-4">
        <!-- Class 1 -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Class 1 - A</h5>
                    <p class="display-6 text-primary fw-bold">3</p>
                    <p class="text-muted">Subjects Assigned</p>
                    <hr>
                    <p><strong>Subjects:</strong></p>
                    <ul class="list-unstyled">
                        <li>Mathematics</li>
                        <li>English</li>
                        <li>Science</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Class 2 -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Class 2 - B</h5>
                    <p class="display-6 text-primary fw-bold">2</p>
                    <p class="text-muted">Subjects Assigned</p>
                    <hr>
                    <p><strong>Subjects:</strong></p>
                    <ul class="list-unstyled">
                        <li>Mathematics</li>
                        <li>Social Studies</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Class 3 -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Class 3 - C</h5>
                    <p class="display-6 text-primary fw-bold">4</p>
                    <p class="text-muted">Subjects Assigned</p>
                    <hr>
                    <p><strong>Subjects:</strong></p>
                    <ul class="list-unstyled">
                        <li>English</li>
                        <li>Science</li>
                        <li>History</li>
                        <li>Geography</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Class 4 -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Class 4 - A</h5>
                    <p class="display-6 text-primary fw-bold">1</p>
                    <p class="text-muted">Subjects Assigned</p>
                    <hr>
                    <p><strong>Subjects:</strong></p>
                    <ul class="list-unstyled">
                        <li>Computer Science</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>