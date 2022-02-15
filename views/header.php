
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">123 เครื่องเขียนซิ้ง</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="../views/home.php">หน้าแรก</a>
                </li>
                <?php if($_SESSION["role"]=="admin"){ ?>
                    <li class="nav-item">
                    <a class="nav-link" href="../views/cate.php">เพิ่มหมวดสินค้า</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../views/add_item.php">เพิ่มสินค้า</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                <a class="nav-link" href="../views/collection.php">ตะกร้าสินค้า</a>
                </li>
               
                
            </ul>
               
                <div>
                    <a class="btn btn-danger shadow-sm" href="../../work7/process/logout.php" type="submit">ออกจากระบบ</a>
                </div>                    
                
            </div>
        </div>
    </nav>
</div>
