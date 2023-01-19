<div class="row">
    <div class="col-md-4 form-group has-feedback">
        <label>ชื่อ :</label> <span style="color:red;">*</span>
        <input type="text" data-name="member_info" class="form-control"
               placeholder="กรอกชื่อ" value="{{ old('firstname', '') }}"
               name="firstname" id="firstname" required>
    </div>
    <div class="col-md-4 form-group has-feedback">
        <label>นามสกุล :</label> <span style="color:red;">*</span>
        <input type="text" data-name="member_info" class="form-control"
               placeholder="กรอกนามสกุล" value="{{ old('lastname', '') }}"
               name="lastname" id="lastname" required>
    </div>
    <div class="col-md-4 form-group has-feedback">
        <label>เลขประจำตัวประชาชน :</label> <span style="color:red;">*</span>
        <input type="text" class="form-control"
               placeholder="กรอกเลขประจำตัวประชาชน"
               value="{{ old('identity_number', '') }}" name="identity_number" id="identity_number" required
               data-name="member_info" maxlength="13">
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label>เพศ :</label>
            <select class="form-control" name="gender" required data-name="member_info">
                <option value="0">กรุณาเลือกเพศ</option>
                <option value="1">ชาย</option>
                <option value="2">หญิง</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label>อีเมล :</label> <span style="color:red;">*</span>
            <input type="email" class="form-control" name="email" id="email"
                   placeholder="กรอกอีเมล" value="{{ old('email', '') }}" required
                   data-name="member_info">
            <span id="error_email"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label>เบอร์ติดต่อ :</label><span style="color:red;">*</span>
            <input type="text" class="form-control numeric" name="telephone" id="telephone"
                   value="{{ old('telephone', '') }}" placeholder="กรอกเบอร์ติดต่อ"
                   data-name="member_info" maxlength="10" required>
        </div>
    </div>
</div>
