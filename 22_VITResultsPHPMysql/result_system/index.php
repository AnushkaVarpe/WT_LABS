<!-- index.php -->


<div class="container">
    <h2>Enter Student Marks for One Semester</h2>
    <form action="submit_result.php" method="POST">
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <!-- Subject 1 -->
        <h4>Subject 1</h4>
        <div class="form-group">
            <label for="subject1_mse">MSE Marks</label>
            <input type="number" id="subject1_mse" name="subject1_mse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject1_ese">ESE Marks</label>
            <input type="number" id="subject1_ese" name="subject1_ese" class="form-control" required>
        </div>

        <!-- Subject 2 -->
        <h4>Subject 2</h4>
        <div class="form-group">
            <label for="subject2_mse">MSE Marks</label>
            <input type="number" id="subject2_mse" name="subject2_mse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject2_ese">ESE Marks</label>
            <input type="number" id="subject2_ese" name="subject2_ese" class="form-control" required>
        </div>

        <!-- Subject 3 -->
        <h4>Subject 3</h4>
        <div class="form-group">
            <label for="subject3_mse">MSE Marks</label>
            <input type="number" id="subject3_mse" name="subject3_mse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject3_ese">ESE Marks</label>
            <input type="number" id="subject3_ese" name="subject3_ese" class="form-control" required>
        </div>

        <!-- Subject 4 -->
        <h4>Subject 4</h4>
        <div class="form-group">
            <label for="subject4_mse">MSE Marks</label>
            <input type="number" id="subject4_mse" name="subject4_mse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject4_ese">ESE Marks</label>
            <input type="number" id="subject4_ese" name="subject4_ese" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Marks</button>
    </form>
</div>


