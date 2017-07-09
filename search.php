<?php
include 'common.php';
// 判断是否登录
if ($_SESSION['admin']) {
    echo "欢迎" . $_SESSION['admin']->admin_name . "登录,";
    echo "<a href='getall.php?action=logout'>注销</a>,";
    echo "<a href='getall.php'>返回首页</a>";
    echo "<hr>";
} else {
    // 未登录跳转到登录界面
    header("location:login.php");
}
    // 数据总条数
    $rowCount = $pdo->query("select * from member where username like '%" . $_POST['keyword'] . "%'")->rowCount();
    //echo "select * from member where username like '%" . $_POST['keyword'] . "%'";
    // 如果地址栏有值，$page就等于这个值
    $pagesize = 5;
    $pageTotal = ceil($rowCount / $pagesize);
    if ($_GET['page']) {
        $page = $_GET['page'];
        // 判断页数如果超过总页数的话
        if ($page > $pageTotal) {
            // 当前页就等于总页数;
            $page = $pageTotal;
        }
    } else {
        // 地址栏没有值，$page=1;
        $page = 1;
    }
    // $sql="select*from member order by id desc limit ".($page-1)*$pagesize.",".$pagesize;
    $sql = "select * from member where username like '%" . $_POST['keyword'] . "%' order by id desc limit " . ($page - 1) * $pagesize . "," . $pagesize;
    //echo $sql;
    $result = $pdo->query($sql);
    $data = $result->fetchAll(PDO::FETCH_OBJ);
    // echo "<pre>";
    // var_dump($data[0]);
    // echo "</pre>";
    if ($data[0] == null) {
        echo "搜索结果为空";
    } else {
        echo "<ul>";
        foreach ($data as $key => $value) {
            echo "<li>" . $value->username . "&nbsp;," . $value->email . "&nbsp;," . $value->regTime . "</li>";
        }
        echo "</ul>";
        echo "<div class='page'><ul>";
        echo "<li><a href='?page=" . ($page - 1) . "'>上一页</a></li>";
        // echo $pageTotal;
        for ($i = 1; $i <= $pageTotal; $i ++) {
            if ($page == $i) {
                echo "<li><a href='?page=" . $i . "' class='present'>" . $i . "</a></li>";
            } else {
                echo "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
            }
        }
        echo "<li><a href='?page=" . ($page + 1) . "'>下一页</a></li>";
        echo "<li><span class='present'>" . $page . "</span>/" . $pageTotal . "</li>";
        echo "</ul></div>";
    }

/*
 * echo "<pre>";
 * var_dump($_POST);
 * echo "</pre>";
 */
?>
<style>
.page {
	border: 1px solid red;
}

.page ul {
	margin: 0;
	padding: 5px;
	list-style: none;
	text-align: center;
}

.page ul li {
	display: inline-block;
	margin-left: 15px;
}

.present {
	color: red;
}
</style>