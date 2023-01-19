<div class="row">
    <div class="col-lg-12">
        <div class="panel registration-form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback">
                                    <label>ชื่อผู้ใช้งาน :</label> <span style="color:red;">*</span>
                                    <input type="text" data-name="member_login" class="form-control"
                                           placeholder="กรอกชื่อผู้ใช้งาน" name="username" id="username" readonly>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>รหัสผ่าน :</label>
                                    <input type="password" pattern=".{5,10}" class="form-control"
                                           placeholder="กรอกรหัสผ่าน" name="password"
                                           id="password" data-name="member_login" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>ยืนยันรหัสผ่าน :</label>
                                    <input type="password" pattern=".{5,10}" class="form-control"
                                           placeholder="กรอกรหัสผ่านอีกครั้ง" name="confirm" id="confirm"
                                           data-name="member_login" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
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
