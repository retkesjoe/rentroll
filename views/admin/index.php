<?php
    include("head.php");
?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
    <?php
        include("header.php");
        if (isset($task)) {
            include("template_".$page."_".$task.".php");
        } else {
            include("template_".$page.".php");
        }
    ?>
    </div>
</body>
