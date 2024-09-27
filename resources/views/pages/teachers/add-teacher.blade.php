<!-- addteacher.blade.php -->
<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTeacherLabel">Add New Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addTeacherForm">
          @csrf
          <div class="mb-3">
            <label for="teacherName" class="form-label">Name</label>
            <input type="text" class="form-control" id="teacherName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="teacherEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="teacherEmail" name="email" required>
          </div>
          <div class="mb-3">
            <label for="teacherGender" class="form-label">Gender</label>
            <select class="form-control" id="teacherGender" name="gender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="teacherContact" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="teacherContact" name="contact_number" required>
          </div>
          <div class="mb-3">
            <label for="teacherDesignation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="teacherDesignation" name="designation" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Teacher</button>
        </form>
      </div>
    </div>
  </div>
</div>
