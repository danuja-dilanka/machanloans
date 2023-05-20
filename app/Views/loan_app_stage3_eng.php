<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/media/file_1677691710.png">

        <title>Machan Loans</title>

        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&amp;display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/plugins/bootstrap/css/bootstrap.min.css">
        <link href="<?= base_url() ?>public/auth/css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="text-center">
                                        <img width="100" src="<?= base_url() ?>public/uploads/media/logo.png">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-center mb-5">
                                            <h3>Machan Project Loan ( මචං ව්‍යාපෘති ණය යෝජනා ක්‍රමය)</h3>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <p>
                                            Thank you for joining the low-interest, 
                                            short-term loan system under the project loan scheme. 
                                            We hope that you have read and understood the terms and 
                                            conditions before joining. Any time you violate the terms, 
                                            disclose your identity and take legal action. Let us inform 
                                            you that you will enter. Only if you agree with the conditions, 
                                            give the following information and get the loan facility. 
                                            Please note that the following information is essential to avail the loan.
                                        </p>
                                    </div>
                                    <img alt="plans" src="https://machan.quicksoft.lk/public/uploads/media/plans.png" width="100%" style="width:100%">
                                    <form method="post" class="validate" autocomplete="off" action="https://machan.quicksoft.lk/loan-application" enctype="multipart/form-data" novalidate="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Loan plan to be availed. < />
                                                        <span>(Sleep- If you are getting Rs. 20,000/= to be paid weekly for two months then you should write D 4 as the loan plan. *</span>
                                                        <span class="required"> *</span></label>
                                                    <select class="form-control" name="loan_type" required="">
                                                        <option value="6">A-1</option>
                                                        <option value="7">B-2</option>
                                                        <option value="8">C-2</option>
                                                        <option value="9">D-3</option>
                                                        <option value="10">D-4</option>
                                                        <option value="11">E-3</option>
                                                        <option value="12">E-4</option>
                                                        <option value="13">E-5</option>
                                                        <option value="14">F-3</option>
                                                        <option value="15">F-4</option>
                                                        <option value="16">F-5</option>
                                                        <option value="17">F-6</option>
                                                        <option value="18">G-3</option>
                                                        <option value="19">G-4</option>
                                                        <option value="20">G-5</option>
                                                        <option value="21">G-6</option>
                                                        <option value="23">H-4</option>
                                                        <option value="24">H-3</option>
                                                        <option value="25">H-6</option>
                                                        <option value="26">H-5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Loan Repayment Method *<span class="required"> *</span></label>
                                                    <select class="form-control" name="payment_method" required="">
                                                        <option value="0" selected="">Months</option>
                                                        <option value="1">Week</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Name <span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="name" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Name with Surname<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="full_name" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="birthday" value="" placeholder="YYYY-MM-DD" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email <span class="required"> *</span></label>
                                                    <input type="email" class="form-control" name="email" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Address on ID<span class="required"> *</span></label>
                                                    <textarea class="form-control" name="residential_address" rows="4" required=""></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Current Residential Address<span class="required"> *</span></label>
                                                    <textarea class="form-control" name="current_address" rows="4" required=""></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Job or business<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="employment" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Address of place of employment or business<span class="required"> *</span></label>
                                                    <textarea class="form-control" name="employment_address" rows="4" required=""></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Phone number<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="phone" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Whatsapp Number<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="whatsapp" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">National Identity Card Number<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="nic" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Married Unmarried<span class="required"> *</span></label>
                                                    <select class="form-control" name="marital_status" required="">
                                                        <option value="0" selected="">Unmarried</option>
                                                        <option value="1">Married</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Time to sit up and wait/label>
                                                        <input type="text" class="form-control" name="membership_age" value="">
                                                        </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Names of the crowd</label>
                                                                <input type="text" class="form-control" name="memberships" value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Bank account details to which the money should be credited 
                                                                    (must be an account in the name of the ID card provided) 
                                                                    Name Account Number Bank Branch<span class="required"> *</span></label>
                                                                <textarea class="form-control" name="bank_details" rows="4" required=""></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">A photograph of the National Identity Card (2MB) (2MB)<span class="required"> *</span></label>
                                                                <input type="file" class="dropify" name="uploads[nic_front]" multiple="false" required="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">A photograph of the National Identity Card (2MB)<span class="required"> *</span></label>
                                                                <input type="file" class="dropify" name="uploads[nic_front]" multiple="false" required="">
                                                            </div>
                                                        </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </main>
                    </div>
                    </body>
                    </html>