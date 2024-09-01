<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $degree = htmlspecialchars($_POST['degree']);
    $institution = htmlspecialchars($_POST['institution']);
    $gradYear = htmlspecialchars($_POST['gradYear']);
    $company = htmlspecialchars($_POST['company']);
    $position = htmlspecialchars($_POST['position']);
    $startDate = htmlspecialchars($_POST['startDate']);
    $endDate = htmlspecialchars($_POST['endDate']);
    $skills = htmlspecialchars($_POST['skills']);
    $certifications = htmlspecialchars($_POST['certifications']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family:Verdana, Geneva, Tahoma, sans-serif ;
            background-color: #f0f0f0;
            color: #444;
            margin: 0;
            padding: 0;
        }

        .resume-container {
            max-width: 900px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 30px;
        }

        h2, h3 {
            margin-bottom: 15px;
            color: #2980b9;
            border-bottom: 2px solid #bdc3c7;
            padding-bottom: 10px;
        }

        p {
            margin: 10px 0;
            line-height: 1.6;
        }

        p span {
            font-weight: bold;
        }

        .section {
            margin-bottom: 30px;
        }

        .skills, .certifications {
            list-style-type: circle;
            margin: 10px 0 20px 20px;
        }

        .footer {
            background-color: #34495e;
            color: #ecf0f1;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="resume-container">
        <div class="header">
            <h2><?php echo $fullName; ?></h2>
        </div>

        <div class="content">
            <div class="section">
                <p><span>Email:</span> <?php echo $email; ?></p>
                <p><span>Phone:</span> <?php echo $phone; ?></p>
                <p><span>Address:</span> <?php echo $address; ?></p>
            </div>

            <div class="section">
                <h3>Education</h3>
                <p><span>Degree:</span> <?php echo $degree; ?></p>
                <p><span>Institution:</span> <?php echo $institution; ?></p>
                <p><span>Year of Graduation:</span> <?php echo $gradYear; ?></p>
            </div>

            <div class="section">
                <h3>Work Experience</h3>
                <p><span>Company:</span> <?php echo $company; ?></p>
                <p><span>Position:</span> <?php echo $position; ?></p>
                <p><span>Start Date:</span> <?php echo $startDate; ?></p>
                <p><span>End Date:</span> <?php echo $endDate ? $endDate : 'Present'; ?></p>
            </div>

            <div class="section">
                <h3>Skills</h3>
                <p><?php echo nl2br($skills); ?></p>
            </div>

            <div class="section">
                <h3>Certifications</h3>
                <p><?php echo nl2br($certifications); ?></p>
            </div>
        </div>

        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Resume</p>
        </div>
    </div>
</body>
</html>
