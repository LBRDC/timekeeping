<?php
$query = "SELECT * FROM `field_signatories` order by id desc";
$stmt = $conn->prepare($query);
$stmt->execute();
$signatories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- &&& FIELDS DEPARTMENT &&& -->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item">Management</li>
            <li class="breadcrumb-item">Fields</li>
            <li class="breadcrumb-item active" aria-current="page">Signatories</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Add Department -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlSignatoryHoliday">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Signatory</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-plus-circle fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Row -->
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Signatory List</h6>
                </div>

                <!-- TABLE -->
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Signatory No.</th>
                                <th>Name</th>
                                <!--<th>Payroll Grouping</th>-->
                                <th>Position</th>
                                <th>Default</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tfoot>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Payroll Grouping</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>-->
                        <tbody>
                            <?php foreach ($signatories as $signatory): ?>
                                <tr>
                                    <td><?= $signatory['sign_no'] ?></td>
                                    <td><?= $signatory['name'] ?></td>
                                    <td> <?= $signatory['position'] ?></td>
                                    <td>

                                        <?php if ($signatory['isDefault'] == 0): ?>
                                            <a href="#" class="btn setDefaultBtn" data-toggle="tooltip" data-placement="bottom" title="Set Default" data-id="<?= $signatory['id'] ?>">
                                                <i class="fas fa-square"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="#" class="btn setDefaultBtn" data-toggle="tooltip" data-placement="bottom" title="Set Default" data-id="<?= $signatory['id'] ?>">
                                                <i class="fas fa-check-square"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger delete_signatory_btn" data-toggle="modal" data-target="#mdldeletHoliday" data-placement="bottom" title="Disable" data-id="<?= $signatory['id'] ?>" data-name="<?= $signatory['name'] ?>">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- <tr>
                <td>01/01/2025</td>
                <td>New Year</td>
                <td>Legal</td>
                <td>
                  <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#mdlEditDepartment" data-toggle="tooltip" data-placement="bottom" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Disable">
                    <i class="fas fa-times-circle"></i>
                  </a>
                </td>
              </tr> -->
                        </tbody>
                    </table>
                </div> <!-- #END# TABLE -->
            </div>
        </div>
    </div> <!-- END Row -->
    <!-- ### END FIELDS DEPARTMENT ### -->