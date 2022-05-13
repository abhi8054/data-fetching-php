<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
$conn = mysqli_connect("localhost","root",null,"assignment");
if(!$conn) echo mysqli_connect_errno() or die();
    $sql_membership="SELECT * FROM membership";
    $sql_class = "SELECT * FROM master AS m INNER JOIN membership AS mb ON m.membership_id = mb.id INNER JOIN classes AS c ON m.key_id = c.id WHERE m.type = 'class';";
    $sql_plans = "SELECT * FROM master AS m INNER JOIN membership AS mb ON m.membership_id = mb.id INNER JOIN plans AS p ON m.key_id = p.id WHERE m.type = 'plan';";
    $exe = mysqli_query($conn,$sql_membership);
    $exe1 = mysqli_query($conn,$sql_plans);
    $exe2 = mysqli_query($conn,$sql_class);
    $classCount=mysqli_num_rows($exe2);
?>
    <div class="container">
        <h1>BASIC</h1>
        <div class="tab-container">
            <div class="buttons">
                <button class="btn" onclick="showTab(0,'#C8C7C7')">Details</button>
                <button class="btn" onclick="showTab(1,'#C8C7C7')">Plans</button>
                <button class="btn" onclick="showTab(2,'#C8C7C7')">Classes</button>
            </div>
            <div class="tabs">
                <div class="tab" id="tab1">
                    <?php
                    while ($res = mysqli_fetch_array($exe)){
//                        print_r($res);
                    ?>
                    <div class="data">
                        <h2>Membership Details</h2>
                        <p><b> Duration :</b> <?php echo $res[2] ?></p>
                        <p><b> Price : </b>&#8377; <?php echo $res[4] ?></p>
                        <p><b> Classes :</b> <?php echo $classCount?></p>
                        <p><b> Discount Percentage : </b><?php echo $res[5] ?>%</p>
                        <p><b> Offer Name : </b><?php echo $res[6] ?></p>
                        <p><b> Status : </b><?php echo $res[7] ?></p>
                    </div>
                    <?php } ?>
                    <span class="edit-delete">
                        <button><i class="fa-solid fa-marker"></i> Edit</button>
                        <button><i class="fa-solid fa-trash-can"></i> Delete</button>
                    </span>
                </div>
                <div class="tab" id="tab2">
                    <?php
                    while ($res1 = mysqli_fetch_array($exe1)){
//                        print_r($res1);
                    ?>
                    <div class="data">
                        <p><b> Name :</b> <?php echo $res1[20] ?></p>
                        <span id="d"><b> Description : </b><?php echo $res1[21] ?></span>
                        <p><b> Total Workouts : </b><?php echo $res1[22] ?></p>
                        <span id="wd"><b> Workouts Description : </b><?php echo $res1[23] ?></span>
                        <p><b> Average Duration : </b><?php echo $res1[24]." ".$res1[25]?></p>
                        <p><b> Total Weeks :</b> <?php echo $res1[26] ?></p>
                        <div class="img">
                            <img src="<?php echo $res1[27] ?>">
                        </div>
                        <p><b> Level :</b> <?php echo $res1[28] ?></p>
                        <p><b> Status :</b> <?php echo $res1[29] ?></p>
                    </div>
                    <?php } ?>
                    <span class="edit-delete">
                        <button><i class="fa-solid fa-marker"></i> Edit</button>
                        <button><i class="fa-solid fa-trash-can"></i> Delete</button>
                    </span>
                </div>
                <div class="tab">
                    <div class="data" id="over">
                    <?php
                    $count=0;
                    while ($res2 = mysqli_fetch_array($exe2)) {
//                        print_r($res2);
                        $count++;
                    ?>
                    <div>
                        <div class="img1">
                            <img class="set-image" src="<?php echo $res2[28]?>" >
                        </div>
                        <p><b> Class :</b> <?php echo $count ?></p>
                        <p><b> Name :</b> <?php echo $res2[20] ?></p>
                        <p><b> Price :</b> &#8377; <?php echo $res2[19] ?></p>
                        <p id="sd"><b> Short Description :</b> <?php echo $res2[21] ?></p>
                        <p><b> Date :</b> <?php echo $res2[22] ?></p>
                        <p><b> Duration:</b> <?php echo $res2[23] ?></p>
                        <p><b> Member Limit :</b> <?php echo $res2[24] ?></p>
                        <p><b> Level :</b> <?php echo $res2[25] ?></p>
                        <p><b> Benefits :</b> <?php echo $res2[27] ?></p>
                        <p><b> Trainer :</b> <?php echo $res2[29] ?></p>
                        <p><b> Status :</b> <?php echo $res2[30] ?></p>

                    </div>
                    <?php } ?>
                    </div>
                    <span class="edit-delete">
                        <button><i class="fa-solid fa-marker"></i> Edit</button>
                        <button><i class="fa-solid fa-trash-can"></i> Delete</button>
                    </span>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="index.js"></script>
</body>
</html>

