



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
</head>
<body>
    <h2>Post a New Job</h2>
    <form action="../controllers/job_controller.php" method="post" enctype="multipart/form-data">
        <label>Company Logo:</label>
        <input type="file" name="company_logo" required><br><br>

        <label>Company Name:</label>
        <input type="text" name="company_name" required><br><br>

        <label for="">Company Description</label>
        <input type="text" name="company_description" required id="">

        <label>Job Title:</label>
        <input type="text" name="job_title" required><br><br>

        <label>Job Description:</label><br>
        <textarea name="job_description" rows="4" required></textarea><br><br>

        <label>Salary:</label>
        <input type="text" name="salary"><br><br>

        <label>Job Type:</label>
        <select name="job_type" required>
            <option value="Remote">Remote</option>
            <option value="On-site">On-site</option>
            <option value="Hybrid">Hybrid</option>
        </select><br><br>

        <button type="submit" name="submit">Post Job</button>
    </form>
</body>
</html>
