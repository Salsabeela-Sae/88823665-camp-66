<!DOCTYPE html>
<html>
    <head>
        <title>Even and Odd Numbers</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container my-5">
            <h1 class="text-center">แสดงข้อมูลเลขคู่-เลขคี่ ตัวเลข 1-100</h1>
            <div class="row">
                <?php
                $columns = 4; // จำนวนคอลัมน์
                $total_numbers = 100; // จำนวนตัวเลขทั้งหมด
                $rows_per_column = ceil($total_numbers / $columns); // จำนวนแถวต่อคอลัมน์

                for ($col = 0; $col < $columns; $col++): ?>
                    <div class="col-lg-<?php echo 12 / $columns; ?> col-md-6 col-sm-12">
                        <?php for ($row = 1; $row <= $rows_per_column; $row++): 
                            $number = $col * $rows_per_column + $row;
                            if ($number > $total_numbers) break; ?>
                            <div class="border p-2 d-flex justify-content-between align-items-center">
                                <span><?php echo $number; ?></span>
                                <span>
                                    <?php 
                                    // เช็คเลขคู่เลขคี่
                                    if ($number % 2 == 0) {
                                        echo "เลขคู่";
                                    } else {
                                        echo "เลขคี่";
                                    }
                                    ?>
                                </span>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </body>
</html>
