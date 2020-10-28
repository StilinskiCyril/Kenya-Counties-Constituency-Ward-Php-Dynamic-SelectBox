<?php
//database connection file
require_once 'connect.php';

//check if form was submitted
if (isset($_POST['submit'])){

    //retrieve the values from the post request
    $county_id = $_POST['county_id'];
    $constituency_name = $_POST['constituency_name'];
    $ward_name = $_POST['ward_name'];

    //check if the values are empty
    if (empty($county_id) OR empty($constituency_name) OR empty($ward_name)){
        echo '<p class="text-danger text-center font-weight-bold">All fields are required</p>';
    } else {



        $query = "select county_name from counties where id ='$county_id'";
        $data = $conn->query($query);
        while ($row = $data->fetch()) {
            echo '<p class="text-success text-center font-weight-bold">You selected '
                .$ward_name. ' ward of ' .$constituency_name. ' constituency of '. $row['county_name']. ' county '.
                '</p>';
        }
    }
}
?>
<html lang="en">
    <title >Php Ajax Dynamic Select Box</title >
    <head>
        <!--Bootstrap4 css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous">
        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"
                integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                crossorigin="anonymous"></script>
        <!--Send the AJAX request-->
        <script type="text/javascript">
            function fetch_constituency(val)
            {
                $.ajax({
                    type: 'POST',
                    url: 'getConstituency.php',
                    data: {
                        county_id:val
                    },
                    success: function (response) {
                        document.getElementById("constituency_name").innerHTML=response;
                    }
                });
            }

        </script>
        <script type="text/javascript">
            function fetch_ward(val)
            {
                $.ajax({
                    type: 'POST',
                    url: 'getWard.php',
                    data: {
                        constituency_name:val
                    },
                    success: function (response) {
                        document.getElementById("ward").innerHTML=response;
                    }
                });
            }

        </script>
    </head>
    <body>
        <div class="container">
            <div class="card m-5">
                <div class="card-header">
                    <p class="text-center">Dynamic Select Option Menu Using Ajax and PHP</p>
                </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group">
                            <label for="county">COUNTY:</label >
                            <select name="county_id" onchange="fetch_constituency(this.value);" class="form-control" required>
                                <option value="">Select County</option>
                                <?php
                                $query = $conn->query("SELECT * FROM counties order by county_name asc");
                                while ($row = $query->fetch()){
                                    echo 'echo "<option value="'.$row['id'].'">'.$row['county_name'].'</option>";';
                                }
                                ?>
                            </select >
                        </div>
                        <div class="form-group">
                            <label for="constituency">CONSTITUENCY:</label >
                            <select name="constituency_name" onchange="fetch_ward(this.value);" id="constituency_name" class="form-control">
                                <option value="">Select Constituency</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward">Ward:</label >
                            <select name="ward_name" id="ward" class="form-control">
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">DO SOMETHING</button>
                    </form >
                </div>
            </div>
        </div>
    </body>
</html>

